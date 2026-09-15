<?php
/**
 * Dynamic sitemap listing every category that has at least one published post.
 * Served at /category-sitemap.xml via the .htaccess rewrite rule.
 */
require_once __DIR__ . '/includes/cms.php';

$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'www.bitsyav.com';
$baseUrl = 'https://www.' . preg_replace('/^www\./', '', $host);

$categories = bitsy_cms_published_categories();

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($categories as $cat): ?>
  <url>
    <loc><?php echo htmlspecialchars($baseUrl . '/category/' . $cat['slug'] . '/', ENT_QUOTES, 'UTF-8'); ?></loc>
    <lastmod><?php echo date('c'); ?></lastmod>
  </url>
<?php endforeach; ?>
</urlset>
