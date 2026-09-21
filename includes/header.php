<?php
/**
 * Shared <head> + header + navigation, included by every frontend page after
 * site-bootstrap.php. Callers set the variables below (all optional) before
 * requiring this file. bitsy_cms_apply_page() still rewrites <title>/meta/
 * og/<h1>/.lede on the final rendered HTML exactly as before — this file
 * only removes the duplication of the surrounding markup.
 */
$pageTitle = isset($pageTitle) ? $pageTitle : 'Bitsy AV';
$pageDescription = isset($pageDescription) ? $pageDescription : '';
$pageOgTitle = isset($pageOgTitle) ? $pageOgTitle : $pageTitle;
$pageOgDescription = isset($pageOgDescription) ? $pageOgDescription : $pageDescription;
$pageOgType = isset($pageOgType) ? $pageOgType : 'website';
$baseHref = isset($baseHref) ? $baseHref : '';
$pageExtraHead = isset($pageExtraHead) ? $pageExtraHead : '';
$activeNav = isset($activeNav) ? $activeNav : '';
$quoteHref = isset($quoteHref) ? $quoteHref : '#quote';

function bitsy_nav_current($nav, $activeNav)
{
  return $nav === $activeNav ? ' aria-current="page"' : '';
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <?php if ($baseHref !== ''): ?>
    <base href="<?php echo htmlspecialchars($baseHref, ENT_QUOTES, 'UTF-8'); ?>">
  <?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
  <?php
  $canonicalPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $canonicalPath = preg_replace('/\.php$/i', '', $canonicalPath);

  $canonicalUrl = 'https://' . $_SERVER['HTTP_HOST'] . $canonicalPath;
  ?>
  <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($pageOgTitle, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($pageOgDescription, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:type" content="<?php echo htmlspecialchars($pageOgType, ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="assets/styles.css">
  <link rel="stylesheet" href="assets/site.css">
  <?php echo $pageExtraHead; ?>
  <script type="application/ld+json">
{"@context":"https://schema.org","@type":"LocalBusiness","name":"Bitsy AV","legalName":"Bitsy Infotech Pvt Ltd","url":"https://www.bitsyav.com/","telephone":"+91 99303 73731","email":"info@bitsydisplays.com","foundingDate":"1994","address":{"@type":"PostalAddress","streetAddress":"Dharmakshetra 1 CHS, Factory Lane Road, Shimpoli, Borivali West","addressLocality":"Mumbai","postalCode":"400092","addressRegion":"Maharashtra","addressCountry":"IN"},"aggregateRating":{"@type":"AggregateRating","ratingValue":"5","bestRating":"5","ratingCount":"1000"}}
</script>
</head>

<body>
  <div class="strip">Free AVIXA standard audio-video design and an honest budget in 24 hours. <b>8 consultation slots
      left this month</b></div>

  <header class="hdr">
    <div class="hdr-in">
      <a class="hdr-logo" href="index.php"><img src="assets/img/bitsy-logo.png" alt="Bitsy AV"></a>
      <nav class="mainnav" id="mainnav">
        <a href="index.php" <?php echo bitsy_nav_current('home', $activeNav); ?>>Home</a>
        <span class="hasmega">
          <a href="our-services.php" <?php echo bitsy_nav_current('solutions', $activeNav); ?>>Solutions <svg width="14"
              height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75"
              stroke-linecap="round">
              <polyline points="6 9 12 15 18 9" />
            </svg></a>
          <div class="mega">
            <div class="megatop"><a href="our-services.php">All solutions <svg width="15" height="15"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round">
                  <path d="M5 12h14M13 6l6 6-6 6" />
                </svg></a><span>Eighteen offerings, one accountable team. Free AVIXA standard design in 24 hours.</span>
            </div>
            <div class="megagrid">
              <div class="megacol">
                <p class="megah">Core audio-video</p>
                <ul>
                  <li><a href="audio-video-solutions.php"><b>Audio-Video Solutions</b><span>Turnkey AV for any
                        space</span></a></li>
                  <li><a href="conference-room-av.php"><b>Conference Room AV</b><span>Rooms that start on
                        time</span></a></li>
                  <li><a href="auditorium-av.php"><b>Auditorium AV</b><span>Heard in the last row</span></a></li>
                  <li><a href="studio.php"><b>Studio Setup</b><span>Publish video in house</span></a></li>
                  <li><a href="projections.php"><b>Projections</b><span>Laser, blending and mapping</span></a></li>
                  <li><a href="it-infrastructure.php"><b>IT Infrastructure</b><span>Cabling, network and
                        racks</span></a></li>
                </ul>
              </div>
              <div class="megacol">
                <p class="megah">Displays and control</p>
                <ul>
                  <li><a href="led-lcd-video-wall.php"><b>LED / LCD Video Wall</b><span>Pitch matched to the
                        room</span></a></li>
                  <li><a href="command-control-centre.php"><b>Command Centres</b><span>Built for 12 hour
                        shifts</span></a></li>
                  <li><a href="video-processor.php"><b>Video Processor</b><span>Sources, windows, redundancy</span></a>
                  </li>
                  <li><a href="digital-signage.php"><b>Digital Signage</b><span>Commercial panels plus CMS</span></a>
                  </li>
                  <li><a href="digital-menu-boards.php"><b>Digital Menu Boards</b><span>Move the high margin
                        items</span></a></li>
                  <li><a href="outdoor-led-display.php"><b>Outdoor LED Display</b><span>Sun, dust and monsoon
                        proof</span></a></li>
                </ul>
              </div>
              <div class="megacol">
                <p class="megah">Interaction and content</p>
                <ul>
                  <li><a href="interactive-touch-kiosk.php"><b>Interactive Kiosks</b><span>Self service that cuts
                        queues</span></a></li>
                  <li><a href="wayfinding-kiosk.php"><b>Wayfinding Kiosk</b><span>Answered in one tap</span></a></li>
                  <li><a href="bitsy-e-ink-display.php"><b>Bitsy E-Ink Display</b><span>Battery run, wireless
                        updates</span></a></li>
                  <li><a href="transparent-display.php"><b>Transparent Display</b><span>Content over the
                        product</span></a></li>
                  <li><a href="ar-vr-solutions.php"><b>AR / VR Solutions</b><span>Immersive with a real job</span></a>
                  </li>
                  <li><a href="display-solutions.php"><b>Display Solutions</b><span>The right panel,
                        specified</span></a></li>
                </ul>
              </div>
              <div class="megafeat">
                <div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation"
                    loading="lazy"></div>
                <p class="megah">Not sure what fits?</p>
                <p>Send the room dimensions and the goal. A Certified Technology Specialist replies within 24 working
                  hours with a layout and an honest budget.</p>
                <a class="btn btn-primary btn-block" href="contact-us.php">Get a free AV design</a>
              </div>
            </div>
          </div>
        </span>
        <a href="about-us.php" <?php echo bitsy_nav_current('about', $activeNav); ?>>About Us</a>
        <a href="clients.php" <?php echo bitsy_nav_current('clients', $activeNav); ?>>Clients</a>
        <a href="gallery.php" <?php echo bitsy_nav_current('gallery', $activeNav); ?>>Gallery</a>
        <a href="blog.php" <?php echo bitsy_nav_current('blog', $activeNav); ?>>Blogs</a>
        <a href="contact-us.php" <?php echo bitsy_nav_current('contact', $activeNav); ?>>Contact Us</a>
      </nav>
      <div class="hdr-act">
        <a class="tel" href="tel:+919930373731">
          <i><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z" />
            </svg></i>
          +91 99303 73731
        </a>
        <a class="btn btn-primary" href="<?php echo htmlspecialchars($quoteHref, ENT_QUOTES, 'UTF-8'); ?>"
          style="font-weight:800">Get Free AV Design</a>
        <button class="navtoggle" type="button" aria-label="Menu" aria-expanded="false"
          onclick="var n=document.getElementById('mainnav');var o=n.classList.toggle('open');this.setAttribute('aria-expanded',o)">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round">
            <path d="M3 6h18M3 12h18M3 18h18" />
          </svg>
        </button>
      </div>
    </div>
  </header>