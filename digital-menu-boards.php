<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Digital Menu Boards | Free Design and Pricing in 24 Hours | Bitsy AV';
$pageDescription = 'Digital menu boards for restaurants, QSR, cafés and cloud kitchens: hardware, CMS, installation and support.';
$activeNav = 'solutions';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/Digital-signage-2.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / <a href="our-services.php">Solutions</a> / Digital Menu Boards</p>
      <div class="taglist"><span class="tag tag-accent-2">Free AVIXA standard design</span><span class="tag tag-outline">Reply in 24 working hours</span></div>
      <h1>Menu boards that move the high margin items</h1>
      <p class="lede">Day parting, per outlet pricing and a layout legible from the back of the queue.</p>
      <p class="lede" style="font-size:15px;margin-top:14px">QSR · Cafés · Food courts · Cloud kitchens · Hotels</p>
      <div class="acts">
        <a class="btn btn-primary" href="#quote" style="font-weight:800">Get pricing for Digital Menu Boards</a>
        <a class="btn btn-secondary" href="tel:+919930373731" style="font-weight:700">Call +91 99303 73731</a>
      </div>
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
      <div><h2>Get pricing in 24 hours<span>4 fields, a specialist replies personally</span></h2></div>
    </div>
    <form action="submit.php" method="post" novalidate>
      <input type="hidden" name="source" value="digital_menu_boards_page">
      <input type="hidden" name="page" value="digital">
      <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px">
      <?php if (!empty($_GET['err'])): ?><p class="errbox"><?php echo htmlspecialchars($_GET['err'], ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
      <div class="field"><label for="h-name">Name <span class="req">*</span></label><input class="input" id="h-name" name="name" type="text" autocomplete="name" placeholder="Your full name" required></div>
      <div class="field"><label for="h-phone">Mobile <span class="req">*</span></label><input class="input" id="h-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="10 digit mobile number" required></div>
      <div class="field"><label for="h-email">Work email <span class="req">*</span></label><input class="input" id="h-email" name="email" type="email" inputmode="email" autocomplete="email" placeholder="you@company.com" required></div>
      <div class="field"><label for="h-offering">What do you need? <span class="req">*</span></label>
        <select class="input" id="h-offering" name="offering" required><option value="">Select a solution</option><option value="Audio-Video Solutions">Audio-Video Solutions</option><option value="Conference Room AV">Conference Room AV</option><option value="Auditorium AV">Auditorium AV</option><option value="Digital Signage">Digital Signage</option><option value="Bitsy E-Ink Display">Bitsy E-Ink Display</option><option value="Interactive Touch Kiosk">Interactive Touch Kiosk</option><option value="LED / LCD Video Wall">LED / LCD Video Wall</option><option value="Command & Control Centre">Command &amp; Control Centre</option><option value="Studio Setup">Studio Setup</option><option value="Wayfinding Kiosk">Wayfinding Kiosk</option><option value="Transparent Display">Transparent Display</option><option value="Video Processor">Video Processor</option><option value="AR / VR Solutions">AR / VR Solutions</option><option value="Display Solutions">Display Solutions</option><option value="Digital Menu Boards" selected>Digital Menu Boards</option><option value="Outdoor LED Display">Outdoor LED Display</option><option value="Projections">Projections</option><option value="IT Infrastructure">IT Infrastructure</option><option value="Not sure yet, please advise">Not sure yet, please advise</option></select>
      </div>
      <button class="btn btn-primary btn-block cta-big" type="submit">Get my free AV design and pricing</button>
      <p class="privacy"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Your details stay with us. No spam, ever.</p>
      <div class="altact"><a class="btn btn-secondary" href="tel:+919930373731">Call now</a><a class="btn btn-secondary" href="https://wa.me/919821157155">WhatsApp</a></div>
    </form>
  </div>
  <div class="badges"><img src="assets/img/gem.jpg" alt="Certification"><img src="assets/img/ISO.jpg" alt="Certification"><img src="assets/img/make-in-india.jpg" alt="Certification"></div></div>
    </div>
</section>




<section class="sec"><div class="wrap"><div class="split narrow-right">
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">What we get right that others skip</h2>
    <p>A menu board is a merchandising tool. Layout, type size and item order do more for average order value than the panel does, so we design the board and not just the mount.</p><p>A central CMS with per outlet pricing and scheduled day parting lets one team run breakfast, lunch and late night menus across every location.</p>
    <h3>Decide these before you buy</h3>
    <ul><li>Legibility from the back of the queue</li><li>Number of screens and fascia layout</li><li>Day parting and scheduling needs</li><li>Per outlet pricing and central control</li><li>Heat, grease and mounting constraints</li></ul>
    <h3>Where it is used</h3>
    <ul><li>QSR and food court counters</li><li>Café and bakery displays</li><li>Hotel and banquet menus</li><li>Cloud kitchen order screens</li><li>Multi outlet chains on one CMS</li></ul>
    <h3>What you get from Bitsy</h3>
    <ul>
      <li>Free needs analysis and design by a Certified Technology Specialist</li>
      <li>Spec sheet, layout drawing and an honest indicative budget</li>
      <li>Supply, installation, software and commissioning by one team</li>
      <li>Dedicated support desk with contracted response times</li>
    </ul>
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


<section style="margin-top:64px"><div class="wrap"><div class="ctaband">
  <div><h2>Send us the room. We will send the design.</h2><p>Dimensions, viewing distance and what you want people to do in the space is enough for us to design and price it, free.</p></div>
  <div class="acts"><a class="btn btn-ink" href="#quote">Get my free AV design</a><a class="btn btn-cream" href="tel:+919930373731">+91 99303 73731</a></div>
</div></div></section>


<section class="sec"><div class="wrap"><div class="split narrow-right">
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">What are Digital Menu Boards?</h2>
    <p>A digital menu board is a merchandising tool that happens to be a screen. Layout, type size and item order move average order value more than the panel does, so the board is designed, not just installed.</p>
    <h3>How menu board deployment works</h3>
    <table class="deftable"><tbody><tr><th>Menu design</th><td>Item hierarchy, pricing position and type size are set for the queue distance.</td></tr><tr><th>Fascia layout</th><td>Screen count and arrangement planned for the counter width and sightlines.</td></tr><tr><th>Day parting</th><td>Breakfast, lunch and late night menus scheduled centrally.</td></tr><tr><th>Per outlet pricing</th><td>One template, local price variations, no duplicate creative.</td></tr><tr><th>Installation</th><td>Heat, grease, ventilation and mounting handled for kitchen environments.</td></tr><tr><th>Operations</th><td>Staff training, POS integration where required, and support.</td></tr></tbody></table>
    <h3>Key features that define an effective system</h3>
    <table class="deftable"><tbody><tr><th>Queue legible layout</th><td>Type sizes set from the back of the line.</td></tr><tr><th>Central CMS</th><td>All outlets on one dashboard with role based access.</td></tr><tr><th>Day parting</th><td>Automatic menu changes by time of day.</td></tr><tr><th>Local pricing</th><td>Per outlet or per city price overrides.</td></tr><tr><th>Sold out control</th><td>Items greyed out from the counter in seconds.</td></tr><tr><th>Kitchen rated install</th><td>Ventilated, grease resistant mounting.</td></tr></tbody></table>
  </div>
  <div class="card elev-sm" style="padding:26px 28px;align-self:start">
    <p class="mini">At a glance</p>
    <ul class="dots" style="margin-bottom:22px"><li>Legibility from the back of the queue</li><li>Screens and fascia layout</li><li>Day parting and scheduling</li><li>Per outlet pricing and central control</li><li>Heat, grease and mounting constraints</li><li>POS integration where required</li></ul>
    <a class="btn btn-primary btn-block" href="#quote" style="font-weight:800">Get my free design</a>
    <div class="altact" style="margin-top:14px"><a class="btn btn-secondary" href="tel:+919930373731">Call now</a><a class="btn btn-secondary" href="https://wa.me/919821157155">WhatsApp</a></div>
  </div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Business case</p>
  <h2 class="h2" style="margin-bottom:34px">Top benefits for your organisation</h2>
  <div class="grid3"><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Higher average order value</h3><p class="apps" style="margin:0">High margin items placed where the eye lands first.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">No reprint cost</h3><p class="apps" style="margin:0">Price and offer changes cost nothing to publish.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Faster launches</h3><p class="apps" style="margin:0">A new item is live across every outlet the same morning.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Less counter friction</h3><p class="apps" style="margin:0">Sold out items disappear before the customer asks.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Consistent brand</h3><p class="apps" style="margin:0">Templates keep every outlet on the same visual standard.</p></div></div>
</div></section>

<section class="sec"><div class="wrap"><div class="split">
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">Types of digital menu boards we deliver</h2>
    <table class="deftable"><tbody><tr><th>QSR counter boards</th><td>Multi screen fascias with day parting.</td></tr><tr><th>Café and bakery displays</th><td>Compact boards with product imagery.</td></tr><tr><th>Hotel and banquet menus</th><td>Event and outlet menus on shared screens.</td></tr><tr><th>Cloud kitchen order screens</th><td>Aggregator and in-house order status.</td></tr><tr><th>Drive through boards</th><td>High brightness, weather sealed units.</td></tr></tbody></table>
  </div>
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">Why Bitsy is the preferred partner in India</h2>
    <p>We design the board, not just the mount, which is why our menu boards change what customers order rather than only what they read.</p><p>From single outlets to national chains, we handle hardware, CMS, installation, training and support with rollout capability across India.</p>
    <p><a href="contact-us.php">Reach out to our team</a> to plan your installation, or send the four field form on this page and a Certified Technology Specialist will come back within 24 working hours.</p>
  </div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">How industries use it</p>
  <h2 class="h2" style="margin-bottom:18px">Why QSR chains move to digital menu boards</h2>
  <p class="lede" style="max-width:52em">Food service runs on speed and margin. Digital boards let a chain change price, promote a combo or hide a sold out item instantly across every outlet, and let each store show the right menu for the hour without printing anything.</p>
</div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <h2 class="h2" style="margin-bottom:16px">FAQs about digital menu boards</h2>
    <p class="lede" style="margin-bottom:20px">Answers to what buyers ask us most. Anything else, ask a specialist directly.</p>
    <a class="btn btn-secondary" href="tel:+919930373731" style="font-weight:700">Call +91 99303 73731</a>
  </div>
  <div class="faqs"><details><summary>How many screens do we need per counter?</summary><p>It depends on fascia width and menu length. Three or four landscape screens is common for a standard QSR counter.</p></details><details><summary>Can prices differ by outlet?</summary><p>Yes. One template with per outlet or per city price overrides.</p></details><details><summary>Does it integrate with our POS?</summary><p>Where the POS supports it, yes, for sold out flags and price sync. Otherwise the CMS handles it.</p></details><details><summary>Are the screens safe above a hot counter?</summary><p>With correct ventilation, mounting and commercial panels rated for the environment, yes. We survey each site.</p></details><details><summary>Who updates the menus?</summary><p>Your marketing or operations team through the CMS, with role based access per outlet.</p></details><details><summary>Can we start with one outlet?</summary><p>Yes, and we recommend a pilot to validate layout and workflow before the rollout.</p></details><details><summary>How do digital menus work in restaurants?</summary><p>Brands update the entire network of digital menu for restaurants, which is why we integrate menu and pricing items in minutes. We also complement changing layouts and branding for bespoke events, regardless of it being inside a self-service kiosk and outdoor billboard. We create an impactful digital menu for restaurants, add images and item descriptions, edit prices, videos, text, and slideshows. Create playlists for the morning, lunch, happy hours, dinner, and special events menus in terms of music.</p></details><details><summary>How can digital menus help improve customer experience?</summary><p>Include digital solutions such as meals information, promotional material, trivia, marketing strategies, and other special features for the targeted audience. This reduces wait time, seems highly configurable, and encourages the customers to return.</p></details><details><summary>How can you integrate digital menu boards?</summary><p>We integrate data and sensors to update restaurant menus based on the wait times, link menus or crowd to guests and events, along with other relevant offers.</p></details><details><summary>Can you customize digital menus for restaurants?</summary><p>Yes, we customize digital restaurant menus.</p></details><details><summary>What are advantages of digital menu boards?</summary><p>There are several advantages that are important to you. Here is a list of the valuable advantages:You can make fast and easy changes to your menu all by yourself. Who knows your business and menu better than you do? No one that’s who. You can manage your menu and advertising whenever and wherever you feel like, all in real time. Build and grow your unique brand like only you know how!Save money! This is always important to a business owner. No more printing new menu’s every time you want to highlight a promotion, sale or menu item. Make the changes you need whenever and wherever you want without added purchases. Be environmentally friendly. Yes, save some trees by not printing all the time. Incorporate the newest technology. Keep up with the times, grow your own unique brand and don’t become outdated. Digital menu boards use stunning graphics, movie clips and even sound to impress and bring in your customers.</p></details><details><summary>How quickly will my digital menu changes take effect?</summary><p>Immediately! That is a huge bonus of digital signage, you can change your digital menu or message at any time from anywhere. Digital signage allows you to make “real-time” changes to your digital menu or message as you see fit. At Menu Board Depot we will provide you with professional services such as training, consulting, contracting and installation. If you want a professional digital menu board and want to understand all the details about it, then please contact us and we will help you.</p></details><details><summary>Where can I use digital signage?</summary><p>Today, digital signage is being used in a variety of applications and settings. Such as:Advertising either related to the location the signage is in or just using the audience reach of the screens for general advertising. Brand building, in-store digital signage helps you build and promote your brand identity. Enhancing the environment, Using digital signage with interactive screens allows your company to keep your customer more engaged. Public information, news, weather and local information, such as fire exits and traveler information. Internal information, use digital signage for corporate messages, health &amp; safety and news just to name a few examples. Influencing customer behavior, you can use digital signage to direct customers to different areas, increasing the dwell time on the store premises. Digital signage can also be used to influence customer purchasing to move that specific item you need to move.</p></details></div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Gallery</p>
  <h2 class="h2" style="margin-bottom:28px">Installations from our project archive</h2>
  <div class="grid3"><div class="washed"><img src="assets/img/1c473111-5ddc-4342-b0f8-588c0e2fec81-1.jpg" alt="menu board deployment installation 1" loading="lazy"></div><div class="washed"><img src="assets/img/148bb996-a61b-4e29-b7b7-7cb89af02d51.jpg" alt="menu board deployment installation 2" loading="lazy"></div><div class="washed"><img src="assets/img/2997b072-8760-498a-a02c-b77e07af4dc9.jpg" alt="menu board deployment installation 3" loading="lazy"></div><div class="washed"><img src="assets/img/80460de1-ba39-4c40-b582-c5c826f95d6d.jpg" alt="menu board deployment installation 4" loading="lazy"></div><div class="washed"><img src="assets/img/949786d1-480b-49a2-a994-78183ee8e620.jpg" alt="menu board deployment installation 5" loading="lazy"></div><div class="washed"><img src="assets/img/1696003b-7ea3-4cc5-9b71-ec183a3c4de4.jpg" alt="menu board deployment installation 6" loading="lazy"></div></div>
</div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Related offerings</p>
  <h2 class="h2" style="margin-bottom:34px">Often specified together</h2>
  <div class="cards">
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Audio-Video Solutions"></div>
    <div class="cardbody">
      <h3>Audio-Video Solutions</h3>
      <p class="apps">Conference rooms · Auditoriums · Lounges · Places of worship · Events · Experience centres</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Room layout and dimensions</li><li>Acoustics and treatment</li><li>Seating layout and sightlines</li><li>The experience you want to create</li><li>Budget and phasing</li></ul>
      <a class="btn btn-secondary" href="audio-video-solutions.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Conference Room AV"></div>
    <div class="cardbody">
      <h3>Conference Room AV</h3>
      <p class="apps">Boardrooms · Huddle rooms · Training rooms · Hybrid meeting spaces</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Room count and room types</li><li>Platform standard: Teams, Zoom, Google Meet or BYOD</li><li>Table shape and microphone coverage</li><li>Camera framing and auto-tracking needs</li><li>Control interface and IT management</li></ul>
      <a class="btn btn-secondary" href="conference-room-av.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/LED-LCD-video-wall.webp" alt="Auditorium AV"></div>
    <div class="cardbody">
      <h3>Auditorium AV</h3>
      <p class="apps">Auditoriums · Town halls · Convention centres · Campus halls · Places of worship</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Seat count, volume and reverberation time</li><li>Speech and music balance</li><li>Sightlines from the last row and the balcony</li><li>Stage, rigging and power coordination</li><li>Operator position and control workflow</li></ul>
      <a class="btn btn-secondary" href="auditorium-av.php">See details and get pricing</a>
    </div>
  </article></div>
</div></section>


<section class="sec"><div class="wrap">
  <h2 class="h2" style="margin-bottom:34px">What procurement teams say</h2>
  <div class="quotes"><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“As part of our total solution for combined audio-visual technology, we opted for Bitsy because of the commitment shown in terms of solution, pricing, technology and meeting deadlines. We feel most comfortable and confident with the total offerings of Bitsy.”</p><footer><b>Sandeep A. Kadam</b><span>Manager, Procurement Department, Reliance Industries Limited</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“We are delighted with the prompt installation and support offered by Bitsy for both boardroom solutions and branch displays. The quality of the products is good and we have not received any complaints from the end users.”</p><footer><b>Asif Hameed</b><span>Manager (C &amp; C), IT Department, SBI</span></footer></blockquote></div>
</div></section>



<section class="sec"><div class="wrap"><div class="finalcta"><div class="finalcta-shot"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div></div><div class="finalcta-body">
  <h2>Visuals speak louder than words</h2>
  <p>Get a free audio-video design, a spec sheet and an honest budget from a Certified Technology Specialist. Twenty four hours, no obligation.</p>
  <div class="acts"><a class="btn btn-primary" href="#quote">Get my free AV design</a><a class="btn btn-sage" href="https://wa.me/919821157155">WhatsApp us</a></div></div>
</div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
