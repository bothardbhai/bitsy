<?php
/**
 * One-off importer: pulls every post from the live WordPress site's REST API
 * (https://www.bitsydisplays.com/wp-json/wp/v2/posts) and inserts it into the
 * local bitsy_cms database — title, slug, content, excerpt, category, and
 * featured image (downloaded locally, both body-level and inline in content).
 *
 * Run from the project root: php database/import_wordpress_posts.php
 * Safe to re-run: existing slugs are skipped, not duplicated.
 */
require_once __DIR__ . '/../includes/cms.php';

const WP_BASE = 'https://www.bitsydisplays.com';
const IMG_DIR = __DIR__ . '/../assets/img/uploads';
const IMG_REL = 'assets/img/uploads/';

$db = bitsy_db();
if (!$db) {
    echo "Error: could not connect to database.\n";
    exit(1);
}

if (!is_dir(IMG_DIR)) {
    mkdir(IMG_DIR, 0755, true);
}

function wp_fetch_json($url) {
    $ctx = stream_context_create(array(
        'http' => array('timeout' => 30, 'header' => "User-Agent: BitsyImporter/1.0\r\n"),
        'ssl' => array('verify_peer' => true, 'verify_peer_name' => true),
    ));
    $body = @file_get_contents($url, false, $ctx);
    if ($body === false) { return null; }
    return json_decode($body, true);
}

function wp_slugify($text) {
    $text = preg_replace('/[^A-Za-z0-9]+/', '-', strtolower(trim($text)));
    return trim($text, '-');
}

/** Download a remote image into assets/img/uploads/, returning the relative
 *  path to use in DB content, or null if the download failed. Skips the
 *  download if a file of the same name already exists locally. */
function wp_download_image($url) {
    if ($url === '' || $url === null) { return null; }
    $path = parse_url($url, PHP_URL_PATH);
    if (!$path) { return null; }
    $name = basename($path);
    $name = preg_replace('/[^A-Za-z0-9._-]/', '-', $name);
    if ($name === '') { return null; }
    $dest = IMG_DIR . '/' . $name;
    if (!file_exists($dest)) {
        $ctx = stream_context_create(array('http' => array('timeout' => 30, 'header' => "User-Agent: BitsyImporter/1.0\r\n")));
        $data = @file_get_contents($url, false, $ctx);
        if ($data === false || strlen($data) === 0) { return null; }
        file_put_contents($dest, $data);
    }
    return IMG_REL . $name;
}

/** Rewrite every bitsydisplays.com wp-content image URL found inside post
 *  HTML content to a locally-downloaded copy. */
function wp_localize_content_images($html) {
    return preg_replace_callback(
        '#https?://(?:www\.)?bitsydisplays\.com/wp-content/uploads/[^\s"\'\)]+#i',
        function ($m) {
            $local = wp_download_image($m[0]);
            return $local !== null ? '/' . $local : $m[0];
        },
        $html
    );
}

function wp_category_id_for($db, $wpCategoryName, &$cache) {
    if ($wpCategoryName === '' || $wpCategoryName === null) { return null; }
    if (isset($cache[$wpCategoryName])) { return $cache[$wpCategoryName]; }
    $slug = wp_slugify($wpCategoryName);
    if ($slug === '') { return null; }
    $find = $db->prepare("SELECT id FROM categories WHERE slug = :slug LIMIT 1");
    $find->execute(array(':slug' => $slug));
    $id = $find->fetchColumn();
    if (!$id) {
        bitsy_cms_save_category(null, $wpCategoryName, $slug);
        $find->execute(array(':slug' => $slug));
        $id = $find->fetchColumn();
    }
    $cache[$wpCategoryName] = $id ?: null;
    return $cache[$wpCategoryName];
}

$categoryCache = array();
$page = 1;
$perPage = 20;
$imported = 0;
$skipped = 0;
$failed = 0;

$checkSlug = $db->prepare("SELECT id FROM posts WHERE slug = :slug LIMIT 1");

while (true) {
    $url = WP_BASE . "/wp-json/wp/v2/posts?per_page={$perPage}&page={$page}&_embed=1&status=publish";
    $posts = wp_fetch_json($url);
    if (!is_array($posts) || count($posts) === 0) { break; }

    foreach ($posts as $post) {
        $slug = isset($post['slug']) ? $post['slug'] : '';
        if ($slug === '') { $failed++; continue; }

        $checkSlug->execute(array(':slug' => $slug));
        if ($checkSlug->fetchColumn()) {
            $skipped++;
            continue;
        }

        $title = html_entity_decode(isset($post['title']['rendered']) ? $post['title']['rendered'] : '', ENT_QUOTES, 'UTF-8');
        $title = trim(strip_tags($title));

        $contentHtml = isset($post['content']['rendered']) ? $post['content']['rendered'] : '';
        $contentHtml = wp_localize_content_images($contentHtml);

        $excerptHtml = isset($post['excerpt']['rendered']) ? $post['excerpt']['rendered'] : '';
        $excerpt = trim(preg_replace('/\s+/', ' ', strip_tags($excerptHtml)));
        $metaDescription = mb_substr($excerpt, 0, 300);

        $categoryName = '';
        if (!empty($post['_embedded']['wp:term'][0])) {
            foreach ($post['_embedded']['wp:term'][0] as $term) {
                if (isset($term['taxonomy']) && $term['taxonomy'] === 'category') {
                    $categoryName = $term['name'];
                    break;
                }
            }
        }
        $categoryId = wp_category_id_for($db, $categoryName, $categoryCache);

        $featuredImage = '';
        if (!empty($post['_embedded']['wp:featuredmedia'][0]['source_url'])) {
            $local = wp_download_image($post['_embedded']['wp:featuredmedia'][0]['source_url']);
            if ($local !== null) { $featuredImage = $local; }
        }

        $publishedAt = !empty($post['date']) ? date('Y-m-d H:i:s', strtotime($post['date'])) : null;

        $ok = bitsy_cms_save_post(null, array(
            'slug' => $slug,
            'status' => 'published',
            'title' => $title,
            'category_id' => $categoryId,
            'excerpt' => $excerpt,
            'content' => $contentHtml,
            'meta_description' => $metaDescription,
            'featured_image' => $featuredImage,
            'published_at' => $publishedAt,
        ));

        if ($ok) {
            $imported++;
            echo "Imported: {$slug}\n";
        } else {
            $failed++;
            echo "Failed: {$slug}\n";
        }
    }

    $page++;
}

echo "\nDone. Imported {$imported}, skipped {$skipped} (already present), failed {$failed}.\n";
