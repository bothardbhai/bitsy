<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Command and Control Centres | Free Design and Pricing in 24 Hours | Bitsy AV';
$pageDescription = 'Command and control centre design and integration: video walls, processors, consoles and operator ergonomics.';
$activeNav = 'solutions';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/Command-center.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / <a href="our-services.php">Solutions</a> / Command &amp; Control Centre</p>
      <div class="taglist"><span class="tag tag-accent-2">Free AVIXA standard design</span><span class="tag tag-outline">Reply in 24 working hours</span></div>
      <h1>Control rooms built for people on twelve hour shifts</h1>
      <p class="lede">Video wall, processor, consoles, sightlines and acoustics designed as one system.</p>
      <p class="lede" style="font-size:15px;margin-top:14px">Surveillance · Traffic control · Disaster management · NOC · SOC</p>
      <div class="acts">
        <a class="btn btn-primary" href="#quote" style="font-weight:800">Get pricing for Command &amp; Control Centre</a>
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
      <input type="hidden" name="source" value="command_control_centre_page">
      <input type="hidden" name="page" value="command">
      <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px">
      <?php if (!empty($_GET['err'])): ?><p class="errbox"><?php echo htmlspecialchars($_GET['err'], ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
      <div class="field"><label for="h-name">Name <span class="req">*</span></label><input class="input" id="h-name" name="name" type="text" autocomplete="name" placeholder="Your full name" required></div>
      <div class="field"><label for="h-phone">Mobile <span class="req">*</span></label><input class="input" id="h-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="10 digit mobile number" required></div>
      <div class="field"><label for="h-email">Work email <span class="req">*</span></label><input class="input" id="h-email" name="email" type="email" inputmode="email" autocomplete="email" placeholder="you@company.com" required></div>
      <div class="field"><label for="h-offering">What do you need? <span class="req">*</span></label>
        <select class="input" id="h-offering" name="offering" required><option value="">Select a solution</option><option value="Audio-Video Solutions">Audio-Video Solutions</option><option value="Conference Room AV">Conference Room AV</option><option value="Auditorium AV">Auditorium AV</option><option value="Digital Signage">Digital Signage</option><option value="Bitsy E-Ink Display">Bitsy E-Ink Display</option><option value="Interactive Touch Kiosk">Interactive Touch Kiosk</option><option value="LED / LCD Video Wall">LED / LCD Video Wall</option><option value="Command & Control Centre" selected>Command &amp; Control Centre</option><option value="Studio Setup">Studio Setup</option><option value="Wayfinding Kiosk">Wayfinding Kiosk</option><option value="Transparent Display">Transparent Display</option><option value="Video Processor">Video Processor</option><option value="AR / VR Solutions">AR / VR Solutions</option><option value="Display Solutions">Display Solutions</option><option value="Digital Menu Boards">Digital Menu Boards</option><option value="Outdoor LED Display">Outdoor LED Display</option><option value="Projections">Projections</option><option value="IT Infrastructure">IT Infrastructure</option><option value="Not sure yet, please advise">Not sure yet, please advise</option></select>
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
    <p>A control room is judged on how fast an operator notices something and acts. That makes source count, window layout, sightlines, glare and seating ergonomics engineering decisions, not furniture decisions.</p><p>We deliver the wall, the processing, the consoles and the commissioning, with redundancy wherever downtime is not an option.</p>
    <h3>Decide these before you buy</h3>
    <ul><li>Required resolution across the wall</li><li>Number of inputs and outputs</li><li>Windows needed per output</li><li>Indoor or outdoor viewing conditions</li><li>Operator positioning and ergonomics</li></ul>
    <h3>Where it is used</h3>
    <ul><li>City surveillance and traffic control</li><li>Utility and disaster management</li><li>Network and security operations centres</li><li>Manufacturing process monitoring</li><li>Logistics control towers</li></ul>
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
    <h2 class="h2" style="margin-bottom:18px">What are Command and Control Centres?</h2>
    <p>A command and control centre puts every relevant feed in front of operators who must notice something and act within seconds. The video wall is the visible part. Source count, window layout, sightlines, acoustics, consoles and redundancy are what make the room work.</p>
    <h3>How control room integration works</h3>
    <table class="deftable"><tbody><tr><th>Source and resolution audit</th><td>We count and classify every feed the room must display, now and next year.</td></tr><tr><th>Wall and window design</th><td>Resolution across the wall and windows per output are derived from operator tasks.</td></tr><tr><th>Processing and redundancy</th><td>Controllers, matrix and backup paths specified so the room does not go dark.</td></tr><tr><th>Console and ergonomics</th><td>Sightlines, screen heights, reach zones and seating for twelve hour shifts.</td></tr><tr><th>Environment</th><td>Lighting, glare control, acoustics and cooling designed around the operators.</td></tr><tr><th>Commissioning and training</th><td>Presets, escalation layouts, documentation and operator training.</td></tr></tbody></table>
    <h3>Key features that define an effective system</h3>
    <table class="deftable"><tbody><tr><th>Task driven layouts</th><td>Presets that match escalation procedures, not decorative dashboards.</td></tr><tr><th>High source count</th><td>Processing sized for surveillance, SCADA, IT and broadcast feeds together.</td></tr><tr><th>Redundant design</th><td>Dual paths and hot spares where uptime is contractual.</td></tr><tr><th>Operator ergonomics</th><td>Consoles, chairs and sightlines specified for shift work.</td></tr><tr><th>Controlled environment</th><td>Glare, acoustics and cooling designed for concentration.</td></tr><tr><th>Documented handover</th><td>As-built drawings, presets and procedures your team can maintain.</td></tr></tbody></table>
  </div>
  <div class="card elev-sm" style="padding:26px 28px;align-self:start">
    <p class="mini">At a glance</p>
    <ul class="dots" style="margin-bottom:22px"><li>Required wall resolution calculated</li><li>Inputs and outputs mapped</li><li>Windows per output defined</li><li>Indoor or outdoor viewing conditions</li><li>Operator positioning and ergonomics</li><li>Redundancy and hot spares</li></ul>
    <a class="btn btn-primary btn-block" href="#quote" style="font-weight:800">Get my free design</a>
    <div class="altact" style="margin-top:14px"><a class="btn btn-secondary" href="tel:+919930373731">Call now</a><a class="btn btn-secondary" href="https://wa.me/919821157155">WhatsApp</a></div>
  </div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Business case</p>
  <h2 class="h2" style="margin-bottom:34px">Top benefits for your organisation</h2>
  <div class="grid3"><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Faster response</h3><p class="apps" style="margin:0">Information laid out for the decision, not for the screenshot.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Fewer errors</h3><p class="apps" style="margin:0">Consistent presets remove hunting for a feed during an incident.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Sustainable shifts</h3><p class="apps" style="margin:0">Ergonomics and lighting that operators can work in all night.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">High availability</h3><p class="apps" style="margin:0">Redundant processing and power keep the room live.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Scalable</h3><p class="apps" style="margin:0">Provision for new feeds without rebuilding the wall.</p></div></div>
</div></section>

<section class="sec"><div class="wrap"><div class="split">
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">Types of command and control centres we deliver</h2>
    <table class="deftable"><tbody><tr><th>City surveillance and traffic</th><td>Camera walls, ANPR and incident management.</td></tr><tr><th>Utility and disaster management</th><td>SCADA, telemetry and multi agency coordination.</td></tr><tr><th>Network and security operations</th><td>NOC and SOC dashboards with escalation layouts.</td></tr><tr><th>Manufacturing process monitoring</th><td>Line, quality and energy dashboards on the plant floor.</td></tr><tr><th>Logistics control towers</th><td>Fleet, yard and warehouse visibility in one room.</td></tr></tbody></table>
  </div>
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">Why Bitsy is the preferred partner in India</h2>
    <p>Control rooms are judged on the worst night, not the average one. We design for that night: redundancy, presets, ergonomics and documented procedures.</p><p>Our Certified Technology Specialists have delivered surveillance, utility, NOC and process monitoring rooms across India, with the wall, the processing, the consoles and the commissioning under one contract.</p>
    <p><a href="contact-us.php">Reach out to our team</a> to plan your installation, or send the four field form on this page and a Certified Technology Specialist will come back within 24 working hours.</p>
  </div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">How industries use it</p>
  <h2 class="h2" style="margin-bottom:18px">What separates a control room from a room with screens</h2>
  <p class="lede" style="max-width:52em">Government, utilities, transport, manufacturing and enterprise IT all run control rooms, and the successful ones share three traits: layouts built from operator tasks, redundancy proportional to the cost of downtime, and an environment people can concentrate in for a full shift.</p>
</div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <h2 class="h2" style="margin-bottom:16px">FAQs about command and control centres</h2>
    <p class="lede" style="margin-bottom:20px">Answers to what buyers ask us most. Anything else, ask a specialist directly.</p>
    <a class="btn btn-secondary" href="tel:+919930373731" style="font-weight:700">Call +91 99303 73731</a>
  </div>
  <div class="faqs"><details><summary>How do you decide the wall resolution?</summary><p>From the number of feeds, the windows needed per output and the reading distance. That gives resolution and pixel pitch together.</p></details><details><summary>Do you supply the consoles as well?</summary><p>Yes, including sightline calculation, screen mounting, cable management and shift-rated seating.</p></details><details><summary>Can you integrate our existing VMS or SCADA?</summary><p>Yes. We integrate with the systems you already run rather than requiring a change of platform.</p></details><details><summary>What redundancy is typical?</summary><p>Dual processing paths, redundant power and hot spare modules for rooms where downtime carries a cost. We scope it to your risk.</p></details><details><summary>How long does a control room project take?</summary><p>Typically eight to sixteen weeks depending on civil readiness, wall size and integration scope. The schedule comes with the design.</p></details><details><summary>Do you train operators?</summary><p>Yes, on presets and escalation layouts, with documentation handed over for future inductions.</p></details><details><summary>What is integrated command and control centre?</summary><p>An Integrated Command and Control Centre (ICCC) is a state-of-the-art facility designed to streamline and centralize the management and monitoring of various systems and services. The system intelligently integrates data and information from multiple sources within the organization. Bitsy Displays focuses on administering powerful solutions that leverage cutting-edge technology to create a unified control hub</p></details><details><summary>What are the various applications of command control centers?</summary><p>At Bitsy Displays, our command and control center has a wide spectrum of applications that give control room professionals real-time information that provides insightful answers. Our robust solutions are ideal for corporate infrastructure that provides centralized management for digital signage, meeting room scheduling, facility monitoring, monitoring traffic flow, and managing public transportation. Additionally, control room solutions are critical in emergency services, energy and utilities, defense and military, industrial environment, and even education.</p></details><details><summary>What are the requirements for a command and control center?</summary><p>Generally Speaking an effective CCC, you will need high-quality displays for clear visuals, a versatile content management system, seamless data integration, and user-friendly interfaces. We at Bitsy Displays believe that understanding the needs and goals of your business is crucial for an effective integrated CCC.</p></details><details><summary>Do Companies need multiple integrated command control centers?</summary><p>Not every company may require multiple ICCC installations. The decision of multiple ICCC depends on the need that arises as a result of events like disaster recovery, scalability, and so on. Many companies may have operations in different locations or regions wherein multiple ICCC installations help to ensure localized monitoring and rapid response to specific issues. Moreover, the need for multiple Integrated command control and center also depends on the nature of the business.</p></details><details><summary>Why Choose Bitsy Display for control room solutions?</summary><p>With Our cutting-edge technology, user-friendly interfaces, and customization options in control room solutions Bitsy Display is your trusted partner, you can stay rest assured tailored specifically for your business. Besides, you also gain access to high-quality displays, seamless content management, and reliable support that ensure your control room operates at its best.</p></details><details><summary>What industries benefit from control room solutions?</summary><p>Control room solutions are used in utilities, transportation, security operations (SOC), network operations (NOC), manufacturing, emergency services, and public safety centres where continuous monitoring is essential.</p></details><details><summary>Can businesses customise a command and control centre design?</summary><p>Control room solutions are used in utilities, transportation, security operations (SOC), network operations (NOC), manufacturing, emergency services, and public safety centres where continuous monitoring is essential.</p></details><details><summary>Are command control center systems scalable for growing operations?</summary><p>Yes — modern command center systems are modular and can scale by adding more screens, sensors, or integration points to support expansion without major redesign.</p></details><details><summary>What should we consider when planning a control room solution?</summary><p>Consider screen size, viewing angles, ergonomic workstations, real-time data feeds, redundancy, integration with existing systems, and future scalability.</p></details><details><summary>Can an integrated command and control centre connect with our existing security or IT systems?</summary><p>Yes — most control centre solutions are designed to integrate with security, network, and operations management systems to centralise monitoring and control from a single dashboard.</p></details><details><summary>What are control room solutions and why are they important?</summary><p>Control room solutions help organizations monitor, manage, and control operations from a centralized environment, improving efficiency, response time, and decision-making in critical situations.</p></details><details><summary>What is included in a NOC room design?</summary><p>A well-planned NOC room design includes video walls, monitoring systems, ergonomic layouts, and network management tools to ensure smooth IT and infrastructure operations.</p></details><details><summary>How is SOC room design different from NOC room design?</summary><p>While NOC room design focuses on network performance and uptime, SOC room design is dedicated to security monitoring, threat detection, and incident response to protect organizational data and systems.</p></details><details><summary>How do control room solutions improve operational efficiency?</summary><p>Modern control room solutions integrate real-time data, video walls, and communication tools, enabling teams to respond faster, reduce downtime, and make informed decisions.</p></details></div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Gallery</p>
  <h2 class="h2" style="margin-bottom:28px">Installations from our project archive</h2>
  <div class="grid3"><div class="washed"><img src="assets/img/1c473111-5ddc-4342-b0f8-588c0e2fec81-1.jpg" alt="control room integration installation 1" loading="lazy"></div><div class="washed"><img src="assets/img/148bb996-a61b-4e29-b7b7-7cb89af02d51.jpg" alt="control room integration installation 2" loading="lazy"></div><div class="washed"><img src="assets/img/2997b072-8760-498a-a02c-b77e07af4dc9.jpg" alt="control room integration installation 3" loading="lazy"></div><div class="washed"><img src="assets/img/80460de1-ba39-4c40-b582-c5c826f95d6d.jpg" alt="control room integration installation 4" loading="lazy"></div><div class="washed"><img src="assets/img/949786d1-480b-49a2-a994-78183ee8e620.jpg" alt="control room integration installation 5" loading="lazy"></div><div class="washed"><img src="assets/img/1696003b-7ea3-4cc5-9b71-ec183a3c4de4.jpg" alt="control room integration installation 6" loading="lazy"></div></div>
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
