<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Blogs and Buyer Guides | Bitsy AV';
$pageDescription = 'Practical guidance on specifying audio-video systems: video wall sizing, boardroom audio, commercial panels, control room ergonomics and outdoor LED.';
$activeNav = 'blog';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/digital-displays-home-page.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / Blogs</p>
      <h1>Buyer guides from our specialists</h1>
      <p class="lede">Short, practical notes on specifying audio-video systems, written by the people who install them.</p>
      <div class="acts"><a class="btn btn-primary" href="#quote" style="font-weight:800">Ask a specialist directly</a></div>
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
      <input type="hidden" name="source" value="blog_page">
      <input type="hidden" name="page" value="blog">
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

<?php
const BITSY_BLOG_PER_PAGE = 12;
$blogTotal = bitsy_cms_posts_count('published');
$blogUsesFallback = $blogTotal === 0;
if ($blogUsesFallback) { $blogTotal = bitsy_cms_posts_count(); }
$blogTotalPages = max(1, (int) ceil($blogTotal / BITSY_BLOG_PER_PAGE));
$blogPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($blogPage < 1) { $blogPage = 1; }
if ($blogPage > $blogTotalPages) { $blogPage = $blogTotalPages; }
$blogPosts = bitsy_cms_posts_page($blogUsesFallback ? null : 'published', $blogPage, BITSY_BLOG_PER_PAGE);
?>
<section class="sec"><div class="wrap">
<?php if (!empty($blogPosts)): ?>
  <div class="grid3"><?php foreach ($blogPosts as $blogPost): ?>
    <article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
    <?php if (!empty($blogPost['category'])): ?><p class="mini" style="margin:0"><a href="category/<?php echo htmlspecialchars($blogPost['category_slug'], ENT_QUOTES, 'UTF-8'); ?>/" style="color:inherit"><?php echo htmlspecialchars($blogPost['category'], ENT_QUOTES, 'UTF-8'); ?></a></p><?php endif; ?>
    <h3 class="h3" style="line-height:1.2"><?php echo htmlspecialchars($blogPost['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
    <p class="apps" style="margin:0"><?php echo htmlspecialchars($blogPost['excerpt'], ENT_QUOTES, 'UTF-8'); ?></p>
    <a class="btn btn-secondary" href="blog/<?php echo htmlspecialchars($blogPost['slug'], ENT_QUOTES, 'UTF-8'); ?>/" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
  </article><?php endforeach; ?></div>
  <?php if ($blogTotalPages > 1): ?>
  <nav class="pagination" aria-label="Blog pages" style="display:flex;align-items:center;justify-content:center;gap:8px;flex-wrap:wrap;margin-top:36px">
    <?php if ($blogPage > 1): ?><a class="btn btn-secondary" href="blog.php?page=<?php echo $blogPage - 1; ?>">&laquo; Previous</a><?php endif; ?>
    <?php for ($p = 1; $p <= $blogTotalPages; $p++): ?>
      <?php if ($p === $blogPage): ?>
        <span class="btn btn-primary" aria-current="page" style="cursor:default"><?php echo $p; ?></span>
      <?php elseif ($p === 1 || $p === $blogTotalPages || abs($p - $blogPage) <= 1): ?>
        <a class="btn btn-secondary" href="blog.php?page=<?php echo $p; ?>"><?php echo $p; ?></a>
      <?php elseif ($p === 2 || $p === $blogTotalPages - 1): ?>
        <span style="padding:0 4px;color:var(--color-neutral-500)">&hellip;</span>
      <?php endif; ?>
    <?php endfor; ?>
    <?php if ($blogPage < $blogTotalPages): ?><a class="btn btn-secondary" href="blog.php?page=<?php echo $blogPage + 1; ?>">Next &raquo;</a><?php endif; ?>
  </nav>
  <?php endif; ?>
<?php else: ?>
  <div class="grid3"><article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
    <p class="mini" style="margin:0">LED / LCD Video Wall</p>
    <h3 class="h3" style="line-height:1.2">How to size a video wall for your room</h3>
    <p class="apps" style="margin:0">Pixel pitch, viewing distance and content resolution, in the order they should be decided.</p>
    <a class="btn btn-secondary" href="led-lcd-video-wall.php" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
  </article><article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
    <p class="mini" style="margin:0">Conference Room AV</p>
    <h3 class="h3" style="line-height:1.2">Boardroom audio: why intelligibility beats speaker count</h3>
    <p class="apps" style="margin:0">What acoustics, microphone coverage and DSP actually do for a hybrid meeting.</p>
    <a class="btn btn-secondary" href="conference-room-av.php" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
  </article><article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
    <p class="mini" style="margin:0">Digital Signage</p>
    <h3 class="h3" style="line-height:1.2">Commercial panel or consumer television</h3>
    <p class="apps" style="margin:0">Duty cycle, brightness, warranty and remote management compared honestly.</p>
    <a class="btn btn-secondary" href="digital-signage.php" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
  </article><article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
    <p class="mini" style="margin:0">Command &amp; Control Centre</p>
    <h3 class="h3" style="line-height:1.2">Control room ergonomics for twelve hour shifts</h3>
    <p class="apps" style="margin:0">Sightlines, glare, console layout and how they change operator response time.</p>
    <a class="btn btn-secondary" href="command-control-centre.php" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
  </article><article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
    <p class="mini" style="margin:0">Bitsy E-Ink Display</p>
    <h3 class="h3" style="line-height:1.2">E-ink or LCD for room signage</h3>
    <p class="apps" style="margin:0">Where battery powered paper-like displays win, and where they do not.</p>
    <a class="btn btn-secondary" href="bitsy-e-ink-display.php" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
  </article><article class="card elev-sm" style="padding:28px 30px;display:flex;flex-direction:column;gap:12px">
    <p class="mini" style="margin:0">Outdoor LED Display</p>
    <h3 class="h3" style="line-height:1.2">Outdoor LED in Indian weather</h3>
    <p class="apps" style="margin:0">Nits, IP ratings, thermal design and a maintenance plan that holds up.</p>
    <a class="btn btn-secondary" href="outdoor-led-display.php" style="margin-top:auto;align-self:flex-start;font-weight:700;font-size:14.5px">Read the guidance</a>
  </article></div>
<?php endif; ?>
</div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <p class="kicker">Skip the reading</p>
    <h2 class="h2" style="margin-bottom:16px">Have a specialist answer it</h2>
    <p class="lede">Four fields, and a Certified Technology Specialist replies within 24 working hours with a layout and an honest budget.</p>
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


<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <h2 class="h2" style="margin-bottom:16px">Questions buyers ask us</h2>
    <p class="lede" style="margin-bottom:20px">Still unclear? Ask a specialist directly, no form required.</p>
    <a class="btn btn-secondary" href="tel:+919930373731" style="font-weight:700">Call +91 99303 73731</a>
  </div>
  <div class="faqs"><details><summary>How quickly will I actually hear back?</summary><p>Within 24 working hours. A Certified Technology Specialist reviews your brief and comes back with a layout, a spec sheet and an indicative budget, not an automated email.</p></details><details><summary>Is the audio-video design really free?</summary><p>Yes. The needs analysis and the design are free and carry no obligation. We would rather you buy the right system, even if that means a smaller order.</p></details><details><summary>How do you decide what a room needs?</summary><p>We run a needs analysis against AVIXA standards: room dimensions, acoustics, seating layout, viewing distances, running hours and the experience you want to create. The equipment list follows from that, never the other way round.</p></details><details><summary>Why choose LED video walls over projection?</summary><p>Brightness, clarity and durability. LED holds up in ambient light where projection washes out, needs far less maintenance and lasts longer, which usually makes it cheaper across its life.</p></details><details><summary>Do you install outside Mumbai?</summary><p>Yes. We serve more than 400 locations pan-India and run turnkey projects end to end: design, supply, installation, content software, commissioning and support.</p></details><details><summary>How do you handle repairs and warranty?</summary><p>Through a dedicated support desk. Issues are logged, tracked and closed by our own service team, with defined response commitments written into the contract.</p></details><details><summary>Can you help if I do not know what I need?</summary><p>That is most of our work. Tell us the room and what you want people to do in it, then pick "Not sure yet, please advise" in the form.</p></details></div>
</div></div></section>

<section class="sec"><div class="wrap"><div class="finalcta"><div class="finalcta-shot"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div></div><div class="finalcta-body">
  <h2>Visuals speak louder than words</h2>
  <p>Get a free audio-video design, a spec sheet and an honest budget from a Certified Technology Specialist. Twenty four hours, no obligation.</p>
  <div class="acts"><a class="btn btn-primary" href="#quote">Get my free AV design</a><a class="btn btn-sage" href="https://wa.me/919821157155">WhatsApp us</a></div></div>
</div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
