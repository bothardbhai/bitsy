<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
require_once __DIR__ . '/includes/cms.php';
$categorySlug = isset($_GET['slug']) ? preg_replace('/[^A-Za-z0-9-]/', '', $_GET['slug']) : '';
$category = $categorySlug ? bitsy_cms_category($categorySlug) : null;
if (!$category) {
  http_response_code(404);
  header('Location: blog.php');
  exit;
}
const BITSY_CATEGORY_PER_PAGE = 12;
$categoryTotal = bitsy_cms_posts_count_by_category($category['id']);
$categoryTotalPages = max(1, (int) ceil($categoryTotal / BITSY_CATEGORY_PER_PAGE));
$categoryPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($categoryPage < 1) { $categoryPage = 1; }
if ($categoryPage > $categoryTotalPages) { $categoryPage = $categoryTotalPages; }
$categoryPosts = bitsy_cms_posts_by_category_page($category['id'], 'published', $categoryPage, BITSY_CATEGORY_PER_PAGE);
$categoryTitle = htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8');
$categoryPath = 'category/' . htmlspecialchars($category['slug'], ENT_QUOTES, 'UTF-8') . '/';
?><?php
$pageTitle = $category['name'] . ' guides | Bitsy AV';
$pageDescription = 'Buyer guides and practical notes on ' . $category['name'] . ', written by the Bitsy AV specialists who install these systems.';
$baseHref = '/';
$pageExtraHead = '<link rel="stylesheet" href="assets/post.css">';
$activeNav = 'blog';
$quoteHref = 'contact-us.php#quote';
require __DIR__ . '/includes/header.php';
?>

<section class="sec post-hero">
  <div class="wrap">
    <p class="post-crumbs"><a href="index.php">Home</a> &raquo; <a href="blog.php">Blog</a> &raquo; <?php echo $categoryTitle; ?></p>
    <h1><?php echo $categoryTitle; ?> guides</h1>
    <p class="post-excerpt">Buyer guides and practical notes on <?php echo $categoryTitle; ?>, written by the people who install them.</p>
  </div>
</section>

<section class="sec" style="padding-top:0">
  <div class="wrap">
    <?php if (!empty($categoryPosts)): ?>
    <div class="grid3"><?php foreach ($categoryPosts as $catPost): ?>
      <article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
      <h3 class="h3" style="line-height:1.2"><?php echo htmlspecialchars($catPost['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
      <p class="apps" style="margin:0"><?php echo htmlspecialchars($catPost['excerpt'], ENT_QUOTES, 'UTF-8'); ?></p>
      <a class="btn btn-secondary" href="post.php?slug=<?php echo htmlspecialchars($catPost['slug'], ENT_QUOTES, 'UTF-8'); ?>" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
    </article><?php endforeach; ?></div>
    <?php if ($categoryTotalPages > 1): ?>
    <nav class="pagination" aria-label="Category pages" style="display:flex;align-items:center;justify-content:center;gap:8px;flex-wrap:wrap;margin-top:36px">
      <?php if ($categoryPage > 1): ?><a class="btn btn-secondary" href="<?php echo $categoryPath; ?>?page=<?php echo $categoryPage - 1; ?>">&laquo; Previous</a><?php endif; ?>
      <?php for ($p = 1; $p <= $categoryTotalPages; $p++): ?>
        <?php if ($p === $categoryPage): ?>
          <span class="btn btn-primary" aria-current="page" style="cursor:default"><?php echo $p; ?></span>
        <?php elseif ($p === 1 || $p === $categoryTotalPages || abs($p - $categoryPage) <= 1): ?>
          <a class="btn btn-secondary" href="<?php echo $categoryPath; ?>?page=<?php echo $p; ?>"><?php echo $p; ?></a>
        <?php elseif ($p === 2 || $p === $categoryTotalPages - 1): ?>
          <span style="padding:0 4px;color:var(--color-neutral-500)">&hellip;</span>
        <?php endif; ?>
      <?php endfor; ?>
      <?php if ($categoryPage < $categoryTotalPages): ?><a class="btn btn-secondary" href="<?php echo $categoryPath; ?>?page=<?php echo $categoryPage + 1; ?>">Next &raquo;</a><?php endif; ?>
    </nav>
    <?php endif; ?>
    <?php else: ?>
    <div class="empty-content" style="text-align:center;padding:48px 0">
      <h2>No guides published in this category yet</h2>
      <p class="muted"><a href="blog.php">Browse all buyer guides &rarr;</a></p>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="sec"><div class="wrap"><div class="finalcta"><div class="finalcta-shot"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div></div><div class="finalcta-body">
  <h2>Have a specialist answer it</h2>
  <p>Four fields, and a Certified Technology Specialist replies within 24 working hours with a layout and an honest budget.</p>
  <div class="acts"><a class="btn btn-primary" href="contact-us.php">Get my free AV design</a><a class="btn btn-sage" href="https://wa.me/919821157155">WhatsApp us</a></div></div>
</div></div></section>

<?php require __DIR__ . '/includes/footer.php'; ?>
