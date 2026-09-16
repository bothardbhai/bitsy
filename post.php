<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
require_once __DIR__ . '/includes/cms.php';
$slug = isset($_GET['slug']) ? preg_replace('/[^A-Za-z0-9-]/', '', $_GET['slug']) : '';
$post = $slug ? bitsy_cms_post($slug) : null;
if (!$post) {
  http_response_code(404);
  header('Location: blog.php');
  exit;
}
?><?php
$pageTitle = $post['title'] . ' | Bitsy AV';
$pageDescription = $post['meta_description'] ?: $post['excerpt'];
$pageOgTitle = $post['title'];
$pageOgType = 'article';
$pageExtraHead = '<link rel="stylesheet" href="assets/post.css">';
$activeNav = 'blog';
$quoteHref = 'contact-us.php#quote';
require __DIR__ . '/includes/header.php';
?>

<?php
/* ── Hero section ────────────────────────────────────────────────── */
$postFeatured = !empty($post['featured_image']) ? $post['featured_image'] : '';
?>
<section class="sec post-hero">
  <div class="wrap"><div class="post-hero-in">
    <p class="post-crumbs"><a href="index.php">Home</a> &raquo; <a href="blog.php">Blog</a> &raquo; <?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></p>
    <h1><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
    <div class="post-meta">
      <span class="post-meta-author"><span class="avatar-sm">B</span>Bitsy AV Specialists</span>
      <span class="post-meta-sep"></span>
      <span><?php echo $post['published_at'] ? htmlspecialchars(date('j F Y', strtotime($post['published_at'])), ENT_QUOTES, 'UTF-8') : ''; ?></span>
      <?php if (!empty($post['category'])): ?>
        <span class="post-meta-sep"></span>
        <span><a href="category/<?php echo htmlspecialchars($post['category_slug'], ENT_QUOTES, 'UTF-8'); ?>/" style="color:inherit"><?php echo htmlspecialchars($post['category'], ENT_QUOTES, 'UTF-8'); ?></a></span>
      <?php endif; ?>
    </div>
  </div></div>
</section>

<?php if ($postFeatured): ?>
<section class="sec" style="padding-top:0;padding-bottom:0">
  <div class="wrap"><div class="post-hero-in">
    <div class="post-feature-img">
      <img src="<?php echo htmlspecialchars($postFeatured, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="eager">
    </div>
  </div></div>
</section>
<?php endif; ?>

<?php
/* ── Article body ────────────────────────────────────────────────── */
$allPosts = bitsy_cms_posts('published');
$related = array();
foreach ($allPosts as $rp) {
  if ($rp['id'] != $post['id']) { $related[] = $rp; }
}
$related = array_slice($related, 0, 4);
?>
<section class="sec" style="padding-top:24px;padding-bottom:0">
  <div class="wrap">
    <article class="post-body">
      <?php echo $post['content']; ?>
    </article>

    <nav class="post-nav">
      <div class="post-nav-links">
        <a class="btn btn-secondary" href="blog.php" style="font-weight:700;font-size:14px">&larr; All guides</a>
        <a class="btn btn-primary" href="contact-us.php" style="font-weight:700;font-size:14px">Talk to a specialist</a>
      </div>
    </nav>

    <?php if (!empty($related)): ?>
    <div class="post-related">
      <h2>More buyer guides</h2>
      <div class="post-related-grid">
        <?php foreach ($related as $rr): ?>
        <a class="post-related-card" href="post.php?slug=<?php echo htmlspecialchars($rr['slug'], ENT_QUOTES, 'UTF-8'); ?>">
          <?php if (!empty($rr['category'])): ?><p class="mini"><?php echo htmlspecialchars($rr['category'], ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
          <h3><?php echo htmlspecialchars($rr['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><?php echo htmlspecialchars(mb_strimwidth($rr['excerpt'], 0, 100, '…'), ENT_QUOTES, 'UTF-8'); ?></p>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php
/* ── CTA banner ──────────────────────────────────────────────────── */
?>
<section class="sec"><div class="wrap"><div class="finalcta"><div class="finalcta-shot"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div></div><div class="finalcta-body">
  <h2>Have a specialist answer it</h2>
  <p>Four fields, and a Certified Technology Specialist replies within 24 working hours with a layout and an honest budget.</p>
  <div class="acts"><a class="btn btn-primary" href="contact-us.php">Get my free AV design</a><a class="btn btn-sage" href="https://wa.me/919821157155">WhatsApp us</a></div></div>
</div></div></section>

<?php require __DIR__ . '/includes/footer.php'; ?>
