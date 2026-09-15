<?php
/**
 * One-off sync: for every imported post, fetch its live page on
 * bitsydisplays.com and copy the real <title> and meta-description tags into
 * posts.title / posts.meta_description — replacing the importer's
 * auto-truncated-excerpt placeholder with the actual SEO copy used live.
 *
 * Safety check: WordPress REST gives us the canonical H1/title per post, but
 * a handful of live pages were found to render a <title> tag that doesn't
 * match their own <h1> (a pre-existing bug on the live site, confirmed via
 * canonical link + h1 inspection). For those, the live <title> is skipped
 * (kept as-is) and only the meta description is applied, to avoid importing
 * a wrong title from a site bug. Every skip is logged for manual review.
 *
 * Run from the project root: php database/sync_wordpress_seo.php
 */
require_once __DIR__ . '/../includes/cms.php';

const LIVE_BASE = 'https://www.bitsydisplays.com';

$db = bitsy_db();
if (!$db) { echo "Error: could not connect to database.\n"; exit(1); }

function fetch_html($url) {
    $ctx = stream_context_create(array(
        'http' => array('timeout' => 20, 'header' => "User-Agent: BitsySeoSync/1.0\r\n"),
    ));
    return @file_get_contents($url, false, $ctx);
}

function extract_tag($html, $pattern) {
    return preg_match($pattern, $html, $m) ? html_entity_decode(trim($m[1]), ENT_QUOTES, 'UTF-8') : null;
}

function normalize_for_compare($text) {
    return strtolower(preg_replace('/[^a-z0-9]+/i', ' ', trim($text)));
}

/** True if two titles are "the same post" (ignoring case/punctuation/colon
 *  styling), false if they look like entirely different posts. */
function titles_match($a, $b) {
    $a = normalize_for_compare($a);
    $b = normalize_for_compare($b);
    if ($a === $b) { return true; }
    similar_text($a, $b, $pct);
    return $pct >= 70;
}

$posts = $db->query("SELECT id, slug, title, meta_description FROM posts ORDER BY id")->fetchAll();

$updated = 0;
$titleSkipped = array();
$notFound = array();
$noChange = 0;

foreach ($posts as $post) {
    $url = LIVE_BASE . '/' . $post['slug'] . '/';
    $html = fetch_html($url);
    if ($html === false || $html === '') { $notFound[] = $post['slug']; continue; }

    $liveTitle = extract_tag($html, '#<title>(.*?)</title>#is');
    $liveDescription = extract_tag($html, '#<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']#is');
    $liveH1 = extract_tag($html, '#<h1\b[^>]*>(.*?)</h1>#is');
    $liveH1 = $liveH1 !== null ? trim(strip_tags($liveH1)) : null;

    if ($liveTitle === null && $liveDescription === null) { $notFound[] = $post['slug']; continue; }

    $newTitle = $post['title'];
    if ($liveTitle !== null) {
        $checkAgainst = $liveH1 !== null ? $liveH1 : $post['title'];
        if (titles_match($liveTitle, $checkAgainst)) {
            $newTitle = $liveTitle;
        } else {
            $titleSkipped[] = array('slug' => $post['slug'], 'live_title' => $liveTitle, 'kept_title' => $post['title'], 'h1' => $liveH1);
        }
    }

    $newDescription = $liveDescription !== null ? $liveDescription : $post['meta_description'];

    if ($newTitle !== $post['title'] || $newDescription !== $post['meta_description']) {
        $q = $db->prepare("UPDATE posts SET title = :title, meta_description = :meta WHERE id = :id");
        $q->execute(array(':title' => $newTitle, ':meta' => $newDescription, ':id' => $post['id']));
        $updated++;
        echo "Updated: {$post['slug']}\n";
    } else {
        $noChange++;
    }
}

echo "\nDone. Updated {$updated}, unchanged {$noChange}, not found live " . count($notFound) . ".\n";
if ($notFound) {
    echo "\nNo live page found for (kept existing data):\n";
    foreach ($notFound as $slug) { echo " - {$slug}\n"; }
}
if ($titleSkipped) {
    echo "\nTitle tag on the live page didn't match its own H1 (likely a live-site bug) — meta description was still synced, but the title tag was NOT copied:\n";
    foreach ($titleSkipped as $row) {
        echo " - {$row['slug']}\n   live <title>: {$row['live_title']}\n   live <h1>:    {$row['h1']}\n   kept title:   {$row['kept_title']}\n";
    }
}
