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
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?> | Bitsy AV</title>
<meta name="description" content="<?php echo htmlspecialchars($post['meta_description'] ?: $post['excerpt'], ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($post['meta_description'] ?: $post['excerpt'], ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:type" content="article">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/styles.css">
<link rel="stylesheet" href="assets/site.css">
<link rel="stylesheet" href="assets/post.css">
</head>
<body>
<div class="strip">Free AVIXA standard audio-video design and an honest budget in 24 hours. <b>8 consultation slots left this month</b></div>
<header class="hdr">
  <div class="hdr-in">
    <a class="hdr-logo" href="index.php"><img src="assets/img/bitsy-logo.png" alt="Bitsy AV"></a>
    <nav class="mainnav" id="mainnav">
      <a href="index.php">Home</a>
      <span class="hasmega">
        <a href="our-services.php">Solutions <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg></a>
        <div class="mega">
      <div class="megatop"><a href="our-services.php">All solutions <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a><span>Eighteen offerings, one accountable team. Free AVIXA standard design in 24 hours.</span></div>
      <div class="megagrid">
      <div class="megacol">
        <p class="megah">Core audio-video</p>
        <ul><li><a href="audio-video-solutions.php"><b>Audio-Video Solutions</b><span>Turnkey AV for any space</span></a></li><li><a href="conference-room-av.php"><b>Conference Room AV</b><span>Rooms that start on time</span></a></li><li><a href="auditorium-av.php"><b>Auditorium AV</b><span>Heard in the last row</span></a></li><li><a href="studio.php"><b>Studio Setup</b><span>Publish video in house</span></a></li><li><a href="projections.php"><b>Projections</b><span>Laser, blending and mapping</span></a></li><li><a href="it-infrastructure.php"><b>IT Infrastructure</b><span>Cabling, network and racks</span></a></li></ul>
      </div><div class="megacol">
        <p class="megah">Displays and control</p>
        <ul><li><a href="led-lcd-video-wall.php"><b>LED / LCD Video Wall</b><span>Pitch matched to the room</span></a></li><li><a href="command-control-centre.php"><b>Command Centres</b><span>Built for 12 hour shifts</span></a></li><li><a href="video-processor.php"><b>Video Processor</b><span>Sources, windows, redundancy</span></a></li><li><a href="digital-signage.php"><b>Digital Signage</b><span>Commercial panels plus CMS</span></a></li><li><a href="digital-menu-boards.php"><b>Digital Menu Boards</b><span>Move the high margin items</span></a></li><li><a href="outdoor-led-display.php"><b>Outdoor LED Display</b><span>Sun, dust and monsoon proof</span></a></li></ul>
      </div><div class="megacol">
        <p class="megah">Interaction and content</p>
        <ul><li><a href="interactive-touch-kiosk.php"><b>Interactive Kiosks</b><span>Self service that cuts queues</span></a></li><li><a href="wayfinding-kiosk.php"><b>Wayfinding Kiosk</b><span>Answered in one tap</span></a></li><li><a href="bitsy-e-ink-display.php"><b>Bitsy E-Ink Display</b><span>Battery run, wireless updates</span></a></li><li><a href="transparent-display.php"><b>Transparent Display</b><span>Content over the product</span></a></li><li><a href="ar-vr-solutions.php"><b>AR / VR Solutions</b><span>Immersive with a real job</span></a></li><li><a href="display-solutions.php"><b>Display Solutions</b><span>The right panel, specified</span></a></li></ul>
      </div>
      <div class="megafeat">
        <div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div>
        <p class="megah">Not sure what fits?</p>
        <p>Send the room dimensions and the goal. A Certified Technology Specialist replies within 24 working hours with a layout and an honest budget.</p>
        <a class="btn btn-primary btn-block" href="contact-us.php">Get a free AV design</a>
      </div>
      </div>
    </div>
      </span>
      <a href="about-us.php">About Us</a>
      <a href="clients.php">Clients</a>
      <a href="gallery.php">Gallery</a>
      <a href="blog.php" aria-current="page">Blogs</a>
      <a href="contact-us.php">Contact Us</a>
    </nav>
    <div class="hdr-act">
      <a class="tel" href="tel:+919930373731">
        <i><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg></i>
        +91 99303 73731
      </a>
      <a class="btn btn-primary" href="contact-us.php" style="font-weight:800">Get Free AV Design</a>
      <button class="navtoggle" type="button" aria-label="Menu" aria-expanded="false" onclick="var n=document.getElementById('mainnav');var o=n.classList.toggle('open');this.setAttribute('aria-expanded',o)"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
    </div>
  </div>
</header>

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

<footer class="ftr">
  <div class="wrap ftr-g">
    <div>
      <a class="ftr-logo" href="index.php"><img src="assets/img/bitsy-logo.png" alt="Bitsy AV, innovations with audio-video" width="1254" height="452"></a>
      <p>Bitsy Infotech Pvt Ltd, Office No 201 &amp; 202, 2nd Floor, Dharmakshetra 1 CHS, Near Amba Mata Mandir, Above Union Bank, Factory Lane Road, Shimpoli, Borivali West, Mumbai 400092, India</p>
      <p class="accent"><a href="mailto:info@bitsydisplays.com">info@bitsydisplays.com</a><br><a href="tel:+919930373731">+91 99303 73731</a></p>
      <div class="certs"><img src="assets/img/gem.jpg" alt="Certification"><img src="assets/img/ISO.jpg" alt="Certification"><img src="assets/img/make-in-india.jpg" alt="Certification"></div>
    </div>
    <div>
      <p class="lbl">Our Solutions</p>
      <ul><li><a href="audio-video-solutions.php">Audio-Video Solutions</a></li><li><a href="conference-room-av.php">Conference Room AV</a></li><li><a href="auditorium-av.php">Auditorium AV</a></li><li><a href="digital-signage.php">Digital Signage</a></li><li><a href="bitsy-e-ink-display.php">Bitsy E-Ink Display</a></li><li><a href="interactive-touch-kiosk.php">Interactive Kiosks</a></li><li><a href="led-lcd-video-wall.php">LED / LCD Video Wall</a></li><li><a href="command-control-centre.php">Command &amp; Control Centre</a></li><li><a href="studio.php">Studio Setup</a></li><li><a href="wayfinding-kiosk.php">Wayfinding Kiosk</a></li></ul>
    </div>
    <div>
      <p class="lbl">More Solutions</p>
      <ul><li><a href="transparent-display.php">Transparent Display</a></li><li><a href="video-processor.php">Video Processor</a></li><li><a href="ar-vr-solutions.php">AR / VR Solutions</a></li><li><a href="display-solutions.php">Display Solutions</a></li><li><a href="digital-menu-boards.php">Digital Menu Boards</a></li><li><a href="outdoor-led-display.php">Outdoor LED Display</a></li><li><a href="projections.php">Projections</a></li><li><a href="it-infrastructure.php">IT Infrastructure</a></li></ul>
    </div>
    <div>
      <p class="lbl">Quick Links</p>
      <ul>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="blog.php">Blogs</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
</footer>
</body></html>
