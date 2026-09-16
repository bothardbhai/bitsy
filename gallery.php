<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Gallery | Audio-Video and Display Installations | Bitsy AV';
$pageDescription = 'Conference rooms, auditoriums, control rooms, kiosks and LED video walls installed by Bitsy across India.';
$activeNav = 'gallery';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/Audio-video-solution.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / Gallery</p>
      <h1>Rooms we have delivered</h1>
      <p class="lede">Conference rooms, auditoriums, control rooms, kiosks and video walls installed across India.</p>
      <div class="acts"><a class="btn btn-primary" href="#quote" style="font-weight:800">Get a design for your space</a></div>
          <div class="herostats">
        <div><b>1994</b><span>Designing audio-video systems since</span></div>
        <div><b>1000+</b><span>Loyal clients across India</span></div>
        <div><b>400+</b><span>Locations served pan-India</span></div>
        <div><b>5.0★</b><span>Google rating from our customers</span></div>
      </div>
    </div>
    
  <div class="formwrap">
  <div class="formcard" id="quote">
    <div class="formcard-hd">
      <img src="assets/img/AV-specialist-logo-150x150.png" alt="Certified Technology Specialist">
      <div><h2>Free AV design and pricing<span>4 fields, reply in 24 working hours</span></h2></div>
    </div>
    <form action="submit.php" method="post" novalidate>
      <input type="hidden" name="source" value="gallery_page">
      <input type="hidden" name="page" value="gallery">
      <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px">
      <?php if (!empty($_GET['err'])): ?><p class="errbox"><?php echo htmlspecialchars($_GET['err'], ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
      <div class="field"><label for="h-name">Name <span class="req">*</span></label><input class="input" id="h-name" name="name" type="text" autocomplete="name" placeholder="Your full name" required></div>
      <div class="field"><label for="h-phone">Mobile <span class="req">*</span></label><input class="input" id="h-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="10 digit mobile number" required></div>
      <div class="field"><label for="h-email">Work email <span class="req">*</span></label><input class="input" id="h-email" name="email" type="email" inputmode="email" autocomplete="email" placeholder="you@company.com" required></div>
      <div class="field"><label for="h-offering">What do you need? <span class="req">*</span></label>
        <select class="input" id="h-offering" name="offering" required><option value="">Select a solution</option><option value="Audio-Video Solutions">Audio-Video Solutions</option><option value="Conference Room AV">Conference Room AV</option><option value="Auditorium AV">Auditorium AV</option><option value="Digital Signage">Digital Signage</option><option value="Bitsy E-Ink Display">Bitsy E-Ink Display</option><option value="Interactive Touch Kiosk">Interactive Touch Kiosk</option><option value="LED / LCD Video Wall">LED / LCD Video Wall</option><option value="Command & Control Centre">Command &amp; Control Centre</option><option value="Studio Setup">Studio Setup</option><option value="Wayfinding Kiosk">Wayfinding Kiosk</option><option value="Transparent Display">Transparent Display</option><option value="Video Processor">Video Processor</option><option value="AR / VR Solutions">AR / VR Solutions</option><option value="Display Solutions">Display Solutions</option><option value="Digital Menu Boards">Digital Menu Boards</option><option value="Outdoor LED Display">Outdoor LED Display</option><option value="Projections">Projections</option><option value="IT Infrastructure">IT Infrastructure</option><option value="Not sure yet, please advise">Not sure yet, please advise</option></select>
      </div>
      <button class="btn btn-primary btn-block cta-big" type="submit">Get my free AV design and pricing</button>
      <p class="privacy"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Your details stay with us. No spam, ever.</p>
      <div class="altact"><a class="btn btn-secondary" href="tel:+919930373731">Call now</a><a class="btn btn-secondary" href="https://wa.me/919821157155">WhatsApp</a></div>
    </form>
  </div>
  <div class="badges"><img src="assets/img/gem.jpg" alt="Certification"><img src="assets/img/ISO.jpg" alt="Certification"><img src="assets/img/make-in-india.jpg" alt="Certification"></div></div>
    </div>
</section>

<section class="sec"><div class="wrap">
  <div class="grid3"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Conference room audio-video"></div><div class="washed"><img src="assets/img/LED-LCD-video-wall.webp" alt="LED video wall"></div><div class="washed"><img src="assets/img/Command-center.webp" alt="Command and control centre"></div><div class="washed"><img src="assets/img/Kiosk-Infrastructure.webp" alt="Interactive touch kiosk"></div><div class="washed"><img src="assets/img/Digital-signage-2.webp" alt="Digital signage"></div><div class="washed"><img src="assets/img/Bitsy-E-ink-Display_result.webp" alt="Bitsy e-ink display"></div><div class="washed"><img src="assets/img/Digital-Display-Solutions-home-page.webp" alt="Display solutions"></div><div class="washed"><img src="assets/img/Digital-Display-Boards_result.webp" alt="Digital display boards"></div><div class="washed"><img src="assets/img/Digital-Sign-Boards-home-page.webp" alt="Digital sign boards"></div><div class="washed"><img src="assets/img/digital-displays-home-page.webp" alt="Digital displays"></div><div class="washed"><img src="assets/img/digital-screen-board-home-page.webp" alt="Digital screen board"></div><div class="washed"><img src="assets/img/Digital-Display-Boards_result.webp" alt="Studio setup"></div></div>
</div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <p class="kicker">Your space next</p>
    <h2 class="h2" style="margin-bottom:16px">Want to see yours here?</h2>
    <p class="lede">Send the room details and a Certified Technology Specialist will design it, free, within 24 working hours.</p>
  </div>
  <div class="whycard card elev-sm">
        <p class="mini">Why buyers pick Bitsy</p>
        <ul class="dots">
          <li>Free needs analysis against AVIXA standards</li>
          <li>Layout, spec sheet and honest budget in 24 hours</li>
          <li>Certified Technology Specialists, not a call centre</li>
          <li>Turnkey delivery and in-house support desk</li>
          <li>1000+ clients, 400+ locations pan-India, since 1994</li>
        </ul>
        <a class="btn btn-primary btn-block" href="#quote" style="font-weight:800">Get my free AV design</a>
        <div class="altact"><a class="btn btn-secondary" href="tel:+919930373731">Call now</a><a class="btn btn-secondary" href="https://wa.me/919821157155">WhatsApp</a></div>
      </div>
</div></div></section>


<section class="sec"><div class="wrap"><div class="panel">
  <h2 class="h2" style="font-size:36px;margin-bottom:8px">Trusted by</h2>
  <p class="lede" style="margin-bottom:30px">Our favourite brands are our friends. We help them hit their goals, they keep us sharp.</p>
  <div class="logos"><img src="assets/img/reliance-1.jpg" alt="Reliance" loading="lazy"><img src="assets/img/tata.jpg" alt="Tata" loading="lazy"><img src="assets/img/sbi-1.jpg" alt="SBI" loading="lazy"><img src="assets/img/Mahindra.png" alt="Mahindra" loading="lazy"><img src="assets/img/adani.jpg" alt="Adani" loading="lazy"><img src="assets/img/lt-1.jpg" alt="Larsen &amp; Toubro" loading="lazy"><img src="assets/img/wipro.jpg" alt="Wipro" loading="lazy"><img src="assets/img/godrej.jpg" alt="Godrej" loading="lazy"><img src="assets/img/audi.jpg" alt="Audi" loading="lazy"><img src="assets/img/mercedes.jpg" alt="Mercedes-Benz" loading="lazy"><img src="assets/img/JW_Marriott_logo.png" alt="JW Marriott" loading="lazy"><img src="assets/img/mc-donald-1.jpg" alt="McDonalds" loading="lazy"><img src="assets/img/pizza-hut-1.jpg" alt="Pizza Hut" loading="lazy"><img src="assets/img/pvr-1.jpg" alt="PVR" loading="lazy"><img src="assets/img/inox.jpg" alt="INOX" loading="lazy"><img src="assets/img/airtel-1.jpg" alt="Airtel" loading="lazy"><img src="assets/img/huawei.jpg" alt="Huawei" loading="lazy"><img src="assets/img/axis-1.jpg" alt="Axis Bank" loading="lazy"><img src="assets/img/bajaj.jpg" alt="Bajaj" loading="lazy"><img src="assets/img/mumbai-metro-1.jpg" alt="Mumbai Metro" loading="lazy"><img src="assets/img/nmims-1.jpg" alt="NMIMS" loading="lazy"><img src="assets/img/zee-tv.jpg" alt="Zee TV" loading="lazy"><img src="assets/img/star-1.jpg" alt="Star" loading="lazy"><img src="assets/img/gvk.jpg" alt="GVK" loading="lazy"></div>
</div></div></section>

<section class="sec"><div class="wrap"><div class="finalcta"><div class="finalcta-shot"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div></div><div class="finalcta-body">
  <h2>Visuals speak louder than words</h2>
  <p>Get a free audio-video design, a spec sheet and an honest budget from a Certified Technology Specialist. Twenty four hours, no obligation.</p>
  <div class="acts"><a class="btn btn-primary" href="#quote">Get my free AV design</a><a class="btn btn-sage" href="https://wa.me/919821157155">WhatsApp us</a></div></div>
</div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
