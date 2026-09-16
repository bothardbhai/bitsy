<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Audio-Video Solutions in India | Bitsy AV';
$pageDescription = 'Get your audio-video system designed free by a Certified Technology Specialist, with honest pricing in 24 hours. Conference rooms, auditoriums, LED video walls, command centres and turnkey AV since 1994.';
$activeNav = 'home';
require __DIR__ . '/includes/header.php';
?>
<section class="hero banner-light" style="--banner:url('assets/img/Digital-Display-Solutions-home-page.webp')">
  <span class="blob1"></span><span class="blob2"></span>
  <div class="wrap hero-grid">
    <div>
      <div class="taglist">
        <span class="tag tag-accent-2">AVIXA certified specialists</span>
        <span class="tag tag-neutral">Since 1994</span>
        <span class="tag tag-outline">400+ locations pan-India</span>
      </div>
      <h1 class="h1">Get your audio-video system designed <em>free</em> by a Certified Technology Specialist</h1>
      <p class="lede" style="font-size:19px;max-width:31em">Conference rooms, auditoriums, LED video walls, command centres, digital signage and turnkey AV plus IT. Tell us the space and the goal, and we send back a layout, a spec sheet and an honest budget in 24 hours. No obligation.</p>
      <ul class="ticks">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Free needs analysis against AVIXA standards, not a catalogue push</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Layout, spec sheet and indicative budget inside 24 working hours</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Turnkey delivery: design, supply, installation, software, support</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Serving 400+ locations pan-India from Mumbai since 1994</li>
      </ul>
      <div class="herostats">
        <div><b>1994</b><span>Designing audio-video systems since</span></div>
        <div><b>1000+</b><span>Loyal clients across India</span></div>
        <div><b>400+</b><span>Locations served pan-India</span></div>
        <div><b>5.0★</b><span>Google rating from our customers</span></div>
      </div>
      <div class="logostrip">
        <p>1000+ clients · 5★ on Google</p>
        <div class="logos"><img src="assets/img/reliance-1.jpg" alt="Reliance" loading="lazy"><img src="assets/img/tata.jpg" alt="Tata" loading="lazy"><img src="assets/img/sbi-1.jpg" alt="SBI" loading="lazy"><img src="assets/img/Mahindra.png" alt="Mahindra" loading="lazy"><img src="assets/img/adani.jpg" alt="Adani" loading="lazy"><img src="assets/img/lt-1.jpg" alt="Larsen &amp; Toubro" loading="lazy"><img src="assets/img/wipro.jpg" alt="Wipro" loading="lazy"><img src="assets/img/godrej.jpg" alt="Godrej" loading="lazy"><img src="assets/img/audi.jpg" alt="Audi" loading="lazy"><img src="assets/img/mercedes.jpg" alt="Mercedes-Benz" loading="lazy"></div>
      </div>
    </div>
    <div class="formwrap">
  <div class="formcard" id="quote">
    <div class="formcard-hd">
      <img src="assets/img/AV-specialist-logo-150x150.png" alt="Certified Technology Specialist">
      <div><h2>Free AV design and pricing<span>4 fields, reply in 24 working hours</span></h2></div>
    </div>
    <form action="submit.php" method="post" novalidate>
      <input type="hidden" name="source" value="hero_form">
      <input type="hidden" name="page" value="hero">
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




<section class="sec" style="padding-bottom:12px"><div class="wrap">
  <p class="kicker">What we undertake</p>
  <h2 class="h2" style="font-size:42px;margin-bottom:14px">All eighteen offerings. One accountable team.</h2>
  <p class="lede" style="max-width:40em;margin-bottom:40px">Every project starts with a needs analysis against AVIXA standards, so you buy the system your room actually needs rather than the one that fits a catalogue.</p>
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
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/LED-LCD-video-wall.webp" alt="LED and LCD Video Walls"></div>
    <div class="cardbody">
      <h3>LED &amp; LCD Video Walls</h3>
      <p class="apps">Command centres · Conference rooms · Auditoriums · Lounges · Events · Experience centres</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Content that will be displayed</li><li>Number of inputs and outputs</li><li>Where the audience will stand or sit</li><li>Overall display size and aspect ratio</li><li>Structure, power and service access</li></ul>
      <a class="btn btn-secondary" href="led-lcd-video-wall.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Command-center.webp" alt="Command and Control Centres"></div>
    <div class="cardbody">
      <h3>Command &amp; Control Centres</h3>
      <p class="apps">Surveillance · Traffic control · Disaster management · NOC · SOC</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Required resolution across the wall</li><li>Number of inputs and outputs</li><li>Windows needed per output</li><li>Indoor or outdoor viewing conditions</li><li>Operator positioning and ergonomics</li></ul>
      <a class="btn btn-secondary" href="command-control-centre.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Command-center.webp" alt="Video Processors"></div>
    <div class="cardbody">
      <h3>Video Processors</h3>
      <p class="apps">Command centres · Auditoriums · Broadcast · Experience centres</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Number and type of inputs and outputs</li><li>Windows, layouts and presets</li><li>Latency and frame sync requirements</li><li>Redundancy and hot swap needs</li><li>Control and automation integration</li></ul>
      <a class="btn btn-secondary" href="video-processor.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Digital-signage-2.webp" alt="Digital Signage"></div>
    <div class="cardbody">
      <h3>Digital Signage</h3>
      <p class="apps">Food menu · Retail · BFSI · Industrial · Healthcare · Education</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Brightness needed for the space</li><li>Distance of the nearest and farthest viewer</li><li>Daily working hours and duty cycle</li><li>Signage software and who updates it</li><li>Commercial grade panels over consumer televisions</li></ul>
      <a class="btn btn-secondary" href="digital-signage.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Digital-signage-2.webp" alt="Digital Menu Boards"></div>
    <div class="cardbody">
      <h3>Digital Menu Boards</h3>
      <p class="apps">QSR · Cafés · Food courts · Cloud kitchens · Hotels</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Legibility from the back of the queue</li><li>Number of screens and fascia layout</li><li>Day parting and scheduling needs</li><li>Per outlet pricing and central control</li><li>Heat, grease and mounting constraints</li></ul>
      <a class="btn btn-secondary" href="digital-menu-boards.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/LED-LCD-video-wall.webp" alt="Outdoor LED Displays"></div>
    <div class="cardbody">
      <h3>Outdoor LED Displays</h3>
      <p class="apps">Hoardings · Facades · Stadiums · Transport hubs · Campuses</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Nits required for direct sunlight</li><li>IP rating and thermal management</li><li>Viewing distance and pixel pitch</li><li>Structure, power and lightning protection</li><li>Service access and maintenance plan</li></ul>
      <a class="btn btn-secondary" href="outdoor-led-display.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Kiosk-Infrastructure.webp" alt="Interactive Touch Kiosks"></div>
    <div class="cardbody">
      <h3>Interactive Touch Kiosks</h3>
      <p class="apps">Retail · BFSI · Industrial · Healthcare · Education</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Informative or fully interactive</li><li>Portrait or landscape orientation</li><li>LED or LCD panel</li><li>Connectivity: Wi-Fi, LAN, USB or SIM</li><li>Portable or fixed, with or without media player</li></ul>
      <a class="btn btn-secondary" href="interactive-touch-kiosk.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Kiosk-Infrastructure.webp" alt="Interactive Wayfinding Kiosks"></div>
    <div class="cardbody">
      <h3>Interactive Wayfinding Kiosks</h3>
      <p class="apps">Malls · Hospitals · Campuses · Transport hubs · Large offices</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Site map accuracy and levels</li><li>Search, categories and languages</li><li>Enclosure durability and vandal resistance</li><li>Placement at decision points</li><li>Who maintains the directory</li></ul>
      <a class="btn btn-secondary" href="wayfinding-kiosk.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Bitsy-E-ink-Display_result.webp" alt="Bitsy E-Ink Display"></div>
    <div class="cardbody">
      <h3>Bitsy E-Ink Display</h3>
      <p class="apps">Corporates · Healthcare · Warehouse · Retail</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Functionality and refresh frequency</li><li>Display quality and size</li><li>Battery life and power management</li><li>Wireless connectivity and dashboard</li><li>Durability in the working environment</li></ul>
      <a class="btn btn-secondary" href="bitsy-e-ink-display.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/digital-displays-home-page.webp" alt="Transparent Displays"></div>
    <div class="cardbody">
      <h3>Transparent Displays</h3>
      <p class="apps">Retail windows · Museums · Showrooms · Exhibitions · Hospitality</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Ambient light and background contrast</li><li>Content style and legibility</li><li>Mounting, glass and framing</li><li>Viewing angle and audience distance</li><li>Content update workflow</li></ul>
      <a class="btn btn-secondary" href="transparent-display.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Digital-Display-Boards_result.webp" alt="Studio Setup"></div>
    <div class="cardbody">
      <h3>Studio Setup</h3>
      <p class="apps">Corporate communications · Training · Marketing · Education · Broadcast</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Content type and publishing frequency</li><li>Room acoustics and treatment</li><li>Lighting plan and colour temperature</li><li>Cameras, switching and streaming workflow</li><li>LED backdrop or chroma key</li></ul>
      <a class="btn btn-secondary" href="studio.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/digital-screen-board-home-page.webp" alt="AR and VR Solutions"></div>
    <div class="cardbody">
      <h3>AR &amp; VR Solutions</h3>
      <p class="apps">Experience centres · Training · Real estate · Manufacturing · Education</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Outcome you want to measure</li><li>Content pipeline and asset availability</li><li>Headset, projection or LED delivery</li><li>Footfall and session length</li><li>Hygiene, safety and staffing</li></ul>
      <a class="btn btn-secondary" href="ar-vr-solutions.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/digital-screen-board-home-page.webp" alt="Projection Solutions"></div>
    <div class="cardbody">
      <h3>Projection Solutions</h3>
      <p class="apps">Auditoriums · Classrooms · Simulation · Events · Projection mapping</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Ambient light control in the room</li><li>Image size, throw distance and lens</li><li>Lumens required for the seating plan</li><li>Screen type, gain and aspect ratio</li><li>Blending, mapping or single image</li></ul>
      <a class="btn btn-secondary" href="projections.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Digital-Display-Solutions-home-page.webp" alt="Display Solutions"></div>
    <div class="cardbody">
      <h3>Display Solutions</h3>
      <p class="apps">Corporate · Retail · Education · Healthcare · Hospitality</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Ambient light and required brightness</li><li>Orientation and installation constraints</li><li>Daily running hours and warranty terms</li><li>Connectivity and remote management</li><li>Spares and service coverage</li></ul>
      <a class="btn btn-secondary" href="display-solutions.php">See details and get pricing</a>
    </div>
  </article>
  <article class="card elev-sm">
    <div class="washed"><img src="assets/img/Digital-Display-Boards_result.webp" alt="IT Infrastructure"></div>
    <div class="cardbody">
      <h3>IT Infrastructure</h3>
      <p class="apps">Corporate offices · Campuses · Plants · Retail chains · Smart buildings</p>
      <p class="mini">Before you buy</p>
      <ul class="dots"><li>Bandwidth, PoE and VLAN requirements</li><li>Cabling standard and cable routes</li><li>Rack layout, cooling and power backup</li><li>Wi-Fi coverage and density</li><li>Documentation and handover to IT</li></ul>
      <a class="btn btn-secondary" href="it-infrastructure.php">See details and get pricing</a>
    </div>
  </article></div>
  <div class="row" style="margin-top:28px;gap:12px"><a class="btn btn-primary" href="#quote" style="font-weight:800">Get my free AV design</a><a class="btn btn-ghost" href="our-services.php" style="font-weight:700">Compare offerings side by side</a></div>
</div></section>


<section style="margin-top:64px"><div class="wrap"><div class="ctaband">
  <div><h2>Not sure what your room needs?</h2><p>Send us the room dimensions and what you want people to do in it. We come back with a layout and a number, free.</p></div>
  <div class="acts"><a class="btn btn-ink" href="#quote">Get my free AV design</a><a class="btn btn-cream" href="tel:+919930373731">+91 99303 73731</a></div>
</div></div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <p class="kicker">Want an exact number?</p>
    <h2 class="h2" style="margin-bottom:16px">Give us the full brief</h2>
    <p class="lede" style="font-size:17.5px;margin-bottom:24px">The more you tell us, the tighter the estimate. This takes about ninety seconds and goes straight to a Certified Technology Specialist, not a call centre.</p>
    <ul class="steps">
      <li><b>1</b>A Certified Technology Specialist reads your brief personally</li>
      <li><b>2</b>You get a layout and spec sheet, not a generic price list</li>
      <li><b>3</b>One follow up call at a time you choose, that is it</li>
    </ul>
    <blockquote class="card elev-sm minquote">
      <div class="stars"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
      <p>“We feel most comfortable and confident with the total offerings of Bitsy: solution, pricing, technology and meeting deadlines.”</p>
      <footer><b>Sandeep A. Kadam</b><span>Manager, Procurement Department, Reliance Industries Limited</span></footer>
    </blockquote>
    <div class="briefnote">
      <p class="mini" style="margin:0 0 8px">What happens to your data</p>
      <p>Your brief goes to a Certified Technology Specialist, not a call centre or a lead pool. We do not share your details, and one follow up call is all you will get unless you ask for more.</p>
    </div>
  </div>
  
  <div class="formcard plain" id="brief" style="padding:30px 32px 32px">
    <form action="submit.php" method="post" novalidate style="padding:0">
      <input type="hidden" name="source" value="home_detailed_brief">
      <input type="hidden" name="page" value="home">
      <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px">
      <div class="g2">
        <div class="field"><label for="d-name">Name <span class="req">*</span></label><input class="input" id="d-name" name="name" type="text" autocomplete="name" placeholder="Full name" required></div>
        <div class="field"><label for="d-company">Company <span class="req">*</span></label><input class="input" id="d-company" name="company" type="text" autocomplete="organization" placeholder="Company name" required></div>
        <div class="field"><label for="d-phone">Mobile <span class="req">*</span></label><input class="input" id="d-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="10 digit mobile" required></div>
        <div class="field"><label for="d-email">Work email <span class="req">*</span></label><input class="input" id="d-email" name="email" type="email" inputmode="email" autocomplete="email" placeholder="you@company.com" required></div>
        <div class="field"><label for="d-role">Your role</label><input class="input" id="d-role" name="role" type="text" placeholder="e.g. Head of IT"></div>
        <div class="field"><label for="d-city">City or site location</label><input class="input" id="d-city" name="city" type="text" placeholder="e.g. Mumbai"></div>
      </div>
      <div class="g2">
        <div class="field"><label for="d-offering">Solution interest <span class="req">*</span></label><select class="input" id="d-offering" name="offering" required><option value="">Select a solution</option><option value="Audio-Video Solutions">Audio-Video Solutions</option><option value="Conference Room AV">Conference Room AV</option><option value="Auditorium AV">Auditorium AV</option><option value="Digital Signage">Digital Signage</option><option value="Bitsy E-Ink Display">Bitsy E-Ink Display</option><option value="Interactive Touch Kiosk">Interactive Touch Kiosk</option><option value="LED / LCD Video Wall">LED / LCD Video Wall</option><option value="Command & Control Centre">Command &amp; Control Centre</option><option value="Studio Setup">Studio Setup</option><option value="Wayfinding Kiosk">Wayfinding Kiosk</option><option value="Transparent Display">Transparent Display</option><option value="Video Processor">Video Processor</option><option value="AR / VR Solutions">AR / VR Solutions</option><option value="Display Solutions">Display Solutions</option><option value="Digital Menu Boards">Digital Menu Boards</option><option value="Outdoor LED Display">Outdoor LED Display</option><option value="Projections">Projections</option><option value="IT Infrastructure">IT Infrastructure</option><option value="Not sure yet, please advise">Not sure yet, please advise</option></select></div>
        <div class="field"><label for="d-industry">Industry</label><select class="input" id="d-industry" name="industry"><option value="">Select</option><option value="Corporate / Enterprise">Corporate / Enterprise</option><option value="Retail & Malls">Retail &amp; Malls</option><option value="BFSI">BFSI</option><option value="Healthcare">Healthcare</option><option value="Education">Education</option><option value="Hospitality & QSR">Hospitality &amp; QSR</option><option value="Government / PSU">Government / PSU</option><option value="Transport & Infrastructure">Transport &amp; Infrastructure</option><option value="Manufacturing & Warehouse">Manufacturing &amp; Warehouse</option><option value="Places of worship">Places of worship</option><option value="Other">Other</option></select></div>
        <div class="field"><label for="d-screens">Screens, rooms or size</label><input class="input" id="d-screens" name="screens" type="text" placeholder="e.g. 6 rooms, or 10ft x 6ft wall"></div>
        <div class="field"><label for="d-timeline">Timeline</label><select class="input" id="d-timeline" name="timeline"><option value="">Select</option><option value="Immediate, this month">Immediate, this month</option><option value="1 to 3 months">1 to 3 months</option><option value="3 to 6 months">3 to 6 months</option><option value="Budgeting for next year">Budgeting for next year</option><option value="Just researching">Just researching</option></select></div>
      </div>
      <div class="field"><label>Indicative budget</label>
        <div class="row" style="gap:8px;margin-top:6px"><label class="tag tag-outline" style="cursor:pointer;display:inline-flex;align-items:center;gap:7px;font-weight:700"><input type="radio" name="budget" value="Under ₹2 lakh" style="accent-color:var(--color-accent);margin:0"> Under ₹2 lakh</label><label class="tag tag-outline" style="cursor:pointer;display:inline-flex;align-items:center;gap:7px;font-weight:700"><input type="radio" name="budget" value="₹2 to 10 lakh" style="accent-color:var(--color-accent);margin:0"> ₹2 to 10 lakh</label><label class="tag tag-outline" style="cursor:pointer;display:inline-flex;align-items:center;gap:7px;font-weight:700"><input type="radio" name="budget" value="₹10 to 50 lakh" style="accent-color:var(--color-accent);margin:0"> ₹10 to 50 lakh</label><label class="tag tag-outline" style="cursor:pointer;display:inline-flex;align-items:center;gap:7px;font-weight:700"><input type="radio" name="budget" value="₹50 lakh plus" style="accent-color:var(--color-accent);margin:0"> ₹50 lakh plus</label><label class="tag tag-outline" style="cursor:pointer;display:inline-flex;align-items:center;gap:7px;font-weight:700"><input type="radio" name="budget" value="Need guidance" style="accent-color:var(--color-accent);margin:0"> Need guidance</label></div>
      </div>
      <div class="field"><label for="d-message">Anything else we should know?</label><textarea class="input" id="d-message" name="message" rows="3" placeholder="Room type, existing hardware, content plans, tender requirements"></textarea></div>
      <button class="btn btn-primary btn-block" type="submit" style="font-size:17px;font-weight:800;padding-top:15px;padding-bottom:15px">Send my brief and get pricing</button>
      <p class="privacy">You will hear from us within 24 working hours.</p>
    </form>
  </div>
</div></div></section>

<section class="sec" id="about"><div class="wrap">
  <p class="kicker">About us</p>
  <h2 class="h2" style="font-size:42px;margin-bottom:14px">Founded in 1994, an audio-video and technical interiors specialist</h2>
  <div class="split" style="margin-top:30px;align-items:start">
    <div class="prose">
      <p>With our team of Certified Technology Specialists and Certified Audio-Video Technologists, we build high end audio-video systems for customer experience zones, command operations centres, studios, auditoriums, lobbies, meeting boardrooms, tech labs, smart buildings, digital display walls and turnkey IT infrastructure.</p>
      <h3>Is Bitsy the right fit for you?</h3>
      <p>We are passionate about pushing creative boundaries and building rooms that stand out. Our goal is an experience you will be proud to show visitors.</p>
      <p>If you are looking for the cheapest, we might not be the perfect match. Going cheap usually ends up more expensive over the life of a system. We focus on genuine value instead, and on helping you make an informed buying decision by running a needs analysis against AVIXA standards and recommending the exact solution your requirement calls for.</p>
      <p>That is how we came to celebrate more than <strong>1000 loyal clients</strong>. Sounds like a fit? Send us a message or book a free advice session.</p>
      <div class="row" style="gap:12px">
        <a class="btn btn-primary" href="#quote" style="font-weight:800">Book a free advice session</a>
        <a class="btn btn-ghost" href="about-us.php" style="font-weight:700">Learn more about us</a>
      </div>
      <div class="factgrid">
        <div><b>1994</b><span>Working since</span></div>
        <div><b>1000+</b><span>Loyal clients</span></div>
        <div><b>400+</b><span>Locations pan-India</span></div>
        <div><b>5.0★</b><span>Google rating</span></div>
      </div>
      <div class="credrow">
        <p class="mini" style="margin:0 0 10px">Certified and empanelled</p>
        <div class="credlogos"><img src="assets/img/gem.jpg" alt="Certification" loading="lazy"><img src="assets/img/ISO.jpg" alt="Certification" loading="lazy"><img src="assets/img/make-in-india.jpg" alt="Certification" loading="lazy"></div>
      </div>
    </div>
    <div>
      <div class="washed" style="border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-md)"><img class="shot" src="assets/img/Digital-Display-Solutions-home-page.webp" alt="Bitsy audio-video installation"></div>
      <div class="card elev-sm" style="margin-top:20px;padding:26px 28px">
        <p class="mini">Why us</p>
        <ul class="dots" style="margin-bottom:0">
          <li>Since 1994</li>
          <li>Team of Certified Technology Specialists</li>
          <li>Award winning trusted partner for AV and ICT</li>
          <li>We serve more than 400 locations pan-India</li>
          <li>We do turnkey projects</li>
          <li>5 star Google ratings</li>
        </ul>
      </div>
    </div>
  </div>
</div></section>

<section class="sec"><div class="wrap"><div class="split">
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">Audio-video that changes how a room works</h2>
    <p>We have supplied conference room AV, auditorium sound, LED video walls, digital menu boards, outdoor LED, wayfinders and touch kiosks to customers in Mumbai and across India since 1994. Every system is specified to hold up to daily use, not just to look good in a demo.</p>
    <p>Audio-video has become the most powerful communication tool an organisation owns. It carries your brand in the lobby, your decisions in the control room and your training on the campus. Our tagline, innovations with video panels, is about making that carry properly.</p>
    <p><a href="contact-us.php">Contact us</a> for details and pricing on any of it.</p>
  </div>
  <div class="washed" style="border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-md)"><img class="shot" src="assets/img/Digital-Display-Boards_result.webp" alt="Audio video and display boards"></div>
</div></div></section>

<section class="sec"><div class="wrap"><div class="split">
  <div class="washed" style="border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-md)"><img class="shot" src="assets/img/Digital-Sign-Boards-home-page.webp" alt="Digital sign boards"></div>
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">What you get from a Bitsy system</h2>
    <table class="deftable"><tbody><tr><th>High quality visuals</th><td>High resolution panels with accurate colour, sized and mounted for real viewing distances.</td></tr><tr><th>Remote content management</th><td>Cloud based control so one team updates every screen and every room from one place.</td></tr><tr><th>Interactive elements</th><td>Touch, gesture and app control where it removes a step for the visitor or the operator.</td></tr><tr><th>Targeted content</th><td>Scheduling and audience segmentation so the right message plays at the right hour.</td></tr><tr><th>Real time updates</th><td>Promotions, emergency notices, event schedules and dashboards pushed the moment they change.</td></tr></tbody></table>
  </div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Industries we serve</p>
  <h2 class="h2" style="margin-bottom:34px">Where our systems run every day</h2>
  <div class="grid3">
    <div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Corporate</h3><p class="apps" style="margin:0">Boardrooms, town hall spaces, lobbies and internal communication screens.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Retail and malls</h3><p class="apps" style="margin:0">Storefront LED, in-store signage, wayfinders and interactive catalogues.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">BFSI</h3><p class="apps" style="margin:0">Branch displays, boardroom AV, queue systems and secure control rooms.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Healthcare</h3><p class="apps" style="margin:0">Department signage, queue displays, e-ink bed cards and OT integration.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Education</h3><p class="apps" style="margin:0">Classroom AV, auditoriums, lecture capture, campus signage and labs.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Hospitality and QSR</h3><p class="apps" style="margin:0">Menu boards, banquet AV, lobby walls and event spaces.</p></div>
  </div>
</div></section>


<section class="sec"><div class="wrap">
  <h2 class="h2" style="margin-bottom:34px">What procurement teams say</h2>
  <div class="quotes"><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“As part of our total solution for combined audio-visual technology, we opted for Bitsy because of the commitment shown in terms of solution, pricing, technology and meeting deadlines. We feel most comfortable and confident with the total offerings of Bitsy.”</p><footer><b>Sandeep A. Kadam</b><span>Manager, Procurement Department, Reliance Industries Limited</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“We are delighted with the prompt installation and support offered by Bitsy for both boardroom solutions and branch displays. The quality of the products is good and we have not received any complaints from the end users.”</p><footer><b>Asif Hameed</b><span>Manager (C &amp; C), IT Department, SBI</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“Bitsy has the best products in the category. We are pleased with our choice of Bitsy.”</p><footer><b>Mr. Jitendra Panchal</b><span>Associate Vice President, IT, NMIMS University</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“Bitsy was considered as it showed a strong interest in working on the project. They matched the requirements and worked closely with us.”</p><footer><b>Rajkumar Nair</b><span>Assistant General Manager (IT), Kanakia Spaces Pvt. Ltd.</span></footer></blockquote></div>
</div></section>

<section class="sec"><div class="wrap"><div class="panel">
  <h2 class="h2" style="font-size:36px;margin-bottom:8px">We worked with</h2>
  <p class="lede" style="margin-bottom:30px">Our favourite brands are our friends. We help them hit their goals, they keep us sharp.</p>
  <div class="logos"><img src="assets/img/reliance-1.jpg" alt="Reliance" loading="lazy"><img src="assets/img/tata.jpg" alt="Tata" loading="lazy"><img src="assets/img/sbi-1.jpg" alt="SBI" loading="lazy"><img src="assets/img/Mahindra.png" alt="Mahindra" loading="lazy"><img src="assets/img/adani.jpg" alt="Adani" loading="lazy"><img src="assets/img/lt-1.jpg" alt="Larsen &amp; Toubro" loading="lazy"><img src="assets/img/wipro.jpg" alt="Wipro" loading="lazy"><img src="assets/img/godrej.jpg" alt="Godrej" loading="lazy"><img src="assets/img/audi.jpg" alt="Audi" loading="lazy"><img src="assets/img/mercedes.jpg" alt="Mercedes-Benz" loading="lazy"><img src="assets/img/JW_Marriott_logo.png" alt="JW Marriott" loading="lazy"><img src="assets/img/mc-donald-1.jpg" alt="McDonalds" loading="lazy"><img src="assets/img/pizza-hut-1.jpg" alt="Pizza Hut" loading="lazy"><img src="assets/img/pvr-1.jpg" alt="PVR" loading="lazy"><img src="assets/img/inox.jpg" alt="INOX" loading="lazy"><img src="assets/img/airtel-1.jpg" alt="Airtel" loading="lazy"><img src="assets/img/huawei.jpg" alt="Huawei" loading="lazy"><img src="assets/img/axis-1.jpg" alt="Axis Bank" loading="lazy"><img src="assets/img/bajaj.jpg" alt="Bajaj" loading="lazy"><img src="assets/img/mumbai-metro-1.jpg" alt="Mumbai Metro" loading="lazy"><img src="assets/img/nmims-1.jpg" alt="NMIMS" loading="lazy"><img src="assets/img/zee-tv.jpg" alt="Zee TV" loading="lazy"><img src="assets/img/star-1.jpg" alt="Star" loading="lazy"><img src="assets/img/gvk.jpg" alt="GVK" loading="lazy"></div>
</div></div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <h2 class="h2" style="margin-bottom:16px">Questions buyers ask us</h2>
    <p class="lede" style="margin-bottom:20px">Still unclear? Ask a specialist directly, no form required.</p>
    <a class="btn btn-secondary" href="tel:+919930373731" style="font-weight:700">Call +91 99303 73731</a>
  </div>
  <div class="faqs"><details><summary>How quickly will I actually hear back?</summary><p>Within 24 working hours. A Certified Technology Specialist reviews your brief and comes back with a layout, a spec sheet and an indicative budget, not an automated email.</p></details><details><summary>Is the audio-video design really free?</summary><p>Yes. The needs analysis and the design are free and carry no obligation. We would rather you buy the right system, even if that means a smaller order.</p></details><details><summary>How do you decide what a room needs?</summary><p>We run a needs analysis against AVIXA standards: room dimensions, acoustics, seating layout, viewing distances, running hours and the experience you want to create. The equipment list follows from that, never the other way round.</p></details><details><summary>Why choose LED video walls over projection?</summary><p>Brightness, clarity and durability. LED holds up in ambient light where projection washes out, needs far less maintenance and lasts longer, which usually makes it cheaper across its life.</p></details><details><summary>Do you install outside Mumbai?</summary><p>Yes. We serve more than 400 locations pan-India and run turnkey projects end to end: design, supply, installation, content software, commissioning and support.</p></details><details><summary>How do you handle repairs and warranty?</summary><p>Through a dedicated support desk. Issues are logged, tracked and closed by our own service team, with defined response commitments written into the contract.</p></details><details><summary>Can you help if I do not know what I need?</summary><p>That is most of our work. Tell us the room and what you want people to do in it, then pick "Not sure yet, please advise" in the form.</p></details></div>
</div></div></section>



<section class="sec"><div class="wrap"><div class="videoband">
  <div>
    <p class="kicker">Watch</p>
    <h2 class="h2" style="margin-bottom:14px">Ninety seconds inside a Bitsy project</h2>
    <p class="lede" style="margin-bottom:24px">How a needs analysis becomes a design, a spec sheet and a room that works. Then tell us about your space and get the same treatment, free.</p>
    <div class="row" style="gap:12px">
      <a class="btn btn-primary" href="#quote" style="font-weight:800">Get my free AV design</a>
      <a class="btn btn-ghost" href="audio-video-solutions.php" style="font-weight:700">More videos</a>
    </div>
  </div>
  <div class="washed videoframe">
    <video controls="controls" preload="none" playsinline="playsinline" poster="assets/img/Digital-Display-Solutions-home-page.webp" width="960" height="540">
      <source src="https://www.bitsydisplays.com/wp-content/uploads/2025/06/final-video-Bitsy.webm" type="video/webm">
      Your browser does not support HTML video.
    </video>
  </div>
</div></div></section>
<section class="sec"><div class="wrap"><div class="magnet">
  <div class="magnet-cover"><img src="assets/img/unnamed-52.png" alt="How to skyrocket your revenues booklet" loading="lazy"></div>
  <div class="magnet-body">
    <p class="mini" style="color:var(--color-accent-300)">Free booklet</p>
    <h2>Your award winning trusted partner for <em>AV and ICT solutions</em></h2>
    <p class="magnet-lede">See how multinational companies use audio-video and digital display systems to lift revenue, and the specification decisions that make the difference. Fifteen pages, no fluff.</p>
    <form class="magnet-form" action="submit.php" method="post" novalidate>
      <input type="hidden" name="source" value="ebook_download">
      <input type="hidden" name="page" value="index">
      <input type="hidden" name="offering" value="Booklet download">
      <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px">
      <input class="input" name="name" type="text" placeholder="Your name" autocomplete="name" required="required" aria-label="Your name">
      <input class="input" name="email" type="email" placeholder="Work email" autocomplete="email" required="required" aria-label="Work email">
      <input class="input" name="phone" type="tel" placeholder="Mobile" autocomplete="tel" required="required" aria-label="Mobile number">
      <button class="btn btn-primary" type="submit" style="font-weight:800;white-space:nowrap">Free download</button>
    </form>
    <p class="magnet-note">We send the booklet by email. No spam, and your details stay with us.</p>
  </div>
</div></div></section>
<section class="sec"><div class="wrap"><div class="finalcta"><div class="finalcta-shot"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div></div><div class="finalcta-body">
  <h2>Visuals speak louder than words</h2>
  <p>Get a free audio-video design, a spec sheet and an honest budget from a Certified Technology Specialist. Twenty four hours, no obligation.</p>
  <div class="acts"><a class="btn btn-primary" href="#quote">Get my free AV design</a><a class="btn btn-sage" href="https://wa.me/919821157155">WhatsApp us</a></div></div>
</div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
