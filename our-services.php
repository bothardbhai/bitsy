<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Our Offerings | Audio-Video and Display Solutions | Bitsy AV';
$pageDescription = 'Eighteen audio-video and display offerings: conference room AV, auditoriums, video walls, command centres, signage, kiosks, studios and IT infrastructure.';
$activeNav = 'solutions';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/Digital-Display-Solutions-home-page.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / Solutions</p>
      <h1>Eighteen offerings. One accountable team.</h1>
      <p class="lede">Pick what you are shopping for, or tell us the room and let a Certified Technology Specialist recommend it. Either way the design and the budget are free.</p>
      <div class="acts"><a class="btn btn-primary" href="#quote" style="font-weight:800">Get my free AV design</a><a class="btn btn-secondary" href="https://wa.me/919821157155" style="font-weight:700">WhatsApp a specialist</a></div>
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
      <div><h2>Free AV design and pricing<span>Pick "advise me" if you are unsure</span></h2></div>
    </div>
    <form action="submit.php" method="post" novalidate>
      <input type="hidden" name="source" value="offerings_page">
      <input type="hidden" name="page" value="offerings">
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
  <p class="kicker">Audio-video first</p>
  <h2 class="h2" style="margin-bottom:34px">Core AV offerings</h2>
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
  <p class="kicker">Displays and control</p>
  <h2 class="h2" style="margin-bottom:34px">Screens, walls and control rooms</h2>
  <div class="cards">
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
  </article></div>
</div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Interaction, content and infrastructure</p>
  <h2 class="h2" style="margin-bottom:34px">The rest of the list</h2>
  <div class="cards">
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
</div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <p class="kicker">Not sure which one</p>
    <h2 class="h2" style="margin-bottom:16px">Describe the room, we will pick</h2>
    <p class="lede">Four fields is all we need to start. A Certified Technology Specialist will come back with the right solution, a layout and an honest budget within 24 working hours.</p>
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


<section class="sec"><div class="wrap">
  <h2 class="h2" style="margin-bottom:34px">What procurement teams say</h2>
  <div class="quotes"><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“As part of our total solution for combined audio-visual technology, we opted for Bitsy because of the commitment shown in terms of solution, pricing, technology and meeting deadlines. We feel most comfortable and confident with the total offerings of Bitsy.”</p><footer><b>Sandeep A. Kadam</b><span>Manager, Procurement Department, Reliance Industries Limited</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“We are delighted with the prompt installation and support offered by Bitsy for both boardroom solutions and branch displays. The quality of the products is good and we have not received any complaints from the end users.”</p><footer><b>Asif Hameed</b><span>Manager (C &amp; C), IT Department, SBI</span></footer></blockquote></div>
</div></section>

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
