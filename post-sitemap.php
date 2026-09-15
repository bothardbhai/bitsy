<?php
/**
 * Dynamic sitemap listing every published blog post.
 * Served at /post-sitemap.xml via the .htaccess rewrite rule.
 */
require_once __DIR__ . '/includes/cms.php';

$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'www.bitsyav.com';
$baseUrl = 'https://www.' . preg_replace('/^www\./', '', $host);

$posts = bitsy_cms_posts('published');

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($posts as $post): ?>
  <url>
    <loc><?php echo htmlspecialchars($baseUrl . '/post.php?slug=' . $post['slug'], ENT_QUOTES, 'UTF-8'); ?></loc>
    <lastmod><?php echo date('c', strtotime($post['updated_at'] ?: $post['created_at'])); ?></lastmod>
  </url>
<?php endforeach; ?>
</urlset>
