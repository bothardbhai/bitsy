<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Interactive Touch Kiosks | Free Design and Pricing in 24 Hours | Bitsy AV';
$pageDescription = 'Interactive touch screen kiosk manufacturers in India: design, supply, installation and support for self service and wayfinding kiosks.';
$activeNav = 'solutions';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/Kiosk-Infrastructure.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / <a href="our-services.php">Solutions</a> / Interactive Kiosks</p>
      <div class="taglist"><span class="tag tag-accent-2">Free AVIXA standard design</span><span class="tag tag-outline">Reply in 24 working hours</span></div>
      <h1>Touch kiosks that reduce queues instead of adding to them</h1>
      <p class="lede">Self service, wayfinding and feedback kiosks built around one clear job per screen.</p>
      <p class="lede" style="font-size:15px;margin-top:14px">Retail · BFSI · Industrial · Healthcare · Education</p>
      <div class="acts">
        <a class="btn btn-primary" href="#quote" style="font-weight:800">Get pricing for Interactive Kiosks</a>
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
      <input type="hidden" name="source" value="interactive_touch_kiosk_page">
      <input type="hidden" name="page" value="interactive">
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




<section class="sec"><div class="wrap"><div class="split narrow-right">
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">What we get right that others skip</h2>
    <p>A kiosk earns its place only if it removes a step for a visitor or a staff member. We start from that job, whether it is paying a bill, finding a doctor, checking a price or registering a visitor.</p><p>Orientation, mounting, connectivity and enclosure are then specified for the footfall and the environment, indoor or outdoor.</p>
    <h3>Decide these before you buy</h3>
    <ul><li>Informative or fully interactive</li><li>Portrait or landscape orientation</li><li>LED or LCD panel</li><li>Connectivity: Wi-Fi, LAN, USB or SIM</li><li>Portable or fixed, with or without media player</li></ul>
    <h3>Where it is used</h3>
    <ul><li>Bank and insurance self service</li><li>Mall and hospital wayfinding</li><li>Visitor registration at reception</li><li>Retail catalogue and price check</li><li>Campus admission and fee counters</li></ul>
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
    <h2 class="h2" style="margin-bottom:18px">What are Interactive Touch Kiosks?</h2>
    <p>An interactive kiosk is a self service point that removes a step for a visitor or a staff member: paying a bill, finding a department, registering as a visitor, checking a price or completing a form. The hardware follows from that single job.</p>
    <h3>How kiosk deployment works</h3>
    <table class="deftable"><tbody><tr><th>Job definition</th><td>We start from the one task the kiosk must complete faster than a counter.</td></tr><tr><th>Hardware specification</th><td>Panel size, orientation, touch technology and enclosure chosen for footfall and environment.</td></tr><tr><th>Peripherals</th><td>Printers, scanners, card readers, cameras and payment devices where the journey needs them.</td></tr><tr><th>Application</th><td>Your application or ours, in kiosk mode with session timeouts and accessibility considered.</td></tr><tr><th>Installation</th><td>Floor, wall or through-glass mounting with cable management and power provisioning.</td></tr><tr><th>Support</th><td>Remote monitoring, consumable planning and on-site response for public facing units.</td></tr></tbody></table>
    <h3>Key features that define an effective system</h3>
    <table class="deftable"><tbody><tr><th>Purpose built enclosures</th><td>Manufactured in India, finished to your brand.</td></tr><tr><th>Robust touch</th><td>Projected capacitive or infrared touch rated for public use.</td></tr><tr><th>Peripheral ready</th><td>Printers, scanners, readers and payment integration built in.</td></tr><tr><th>Remote monitoring</th><td>Health, paper, uptime and application status visible centrally.</td></tr><tr><th>Accessibility</th><td>Reach ranges, contrast and audio options considered at design stage.</td></tr><tr><th>Indoor and outdoor</th><td>IP rated, ventilated and sunlight readable variants.</td></tr></tbody></table>
  </div>
  <div class="card elev-sm" style="padding:26px 28px;align-self:start">
    <p class="mini">At a glance</p>
    <ul class="dots" style="margin-bottom:22px"><li>Informative or fully interactive</li><li>Portrait or landscape</li><li>LED or LCD panel</li><li>Wi-Fi, LAN, USB or SIM connectivity</li><li>Portable or fixed installation</li><li>With or without media player</li></ul>
    <a class="btn btn-primary btn-block" href="#quote" style="font-weight:800">Get my free design</a>
    <div class="altact" style="margin-top:14px"><a class="btn btn-secondary" href="tel:+919930373731">Call now</a><a class="btn btn-secondary" href="https://wa.me/919821157155">WhatsApp</a></div>
  </div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Business case</p>
  <h2 class="h2" style="margin-bottom:34px">Top benefits for your organisation</h2>
  <div class="grid3"><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Shorter queues</h3><p class="apps" style="margin:0">Routine transactions move off the counter and onto self service.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Lower cost per transaction</h3><p class="apps" style="margin:0">Staff time is redirected to exceptions and to selling.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Consistent experience</h3><p class="apps" style="margin:0">Every visitor gets the same information, in their chosen language.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Data capture</h3><p class="apps" style="margin:0">Journeys and drop-offs are measurable, so the flow can be improved.</p></div><div class="card elev-sm" style="padding:26px 28px"><h3 class="h3" style="margin-bottom:8px">Always available</h3><p class="apps" style="margin:0">Service continues outside counter hours.</p></div></div>
</div></section>

<section class="sec"><div class="wrap"><div class="split">
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">Types of interactive touch kiosks we deliver</h2>
    <table class="deftable"><tbody><tr><th>Self service and bill payment</th><td>Banking, insurance, utilities and telecom counters.</td></tr><tr><th>Wayfinding kiosks</th><td>Malls, hospitals and campuses with searchable maps.</td></tr><tr><th>Visitor management</th><td>Reception registration, badge printing and host notification.</td></tr><tr><th>Retail catalogue and price check</th><td>Endless aisle, stock lookup and product comparison.</td></tr><tr><th>Feedback and survey kiosks</th><td>Instant experience capture at the point of service.</td></tr></tbody></table>
  </div>
  <div class="prose">
    <h2 class="h2" style="margin-bottom:18px">Why Bitsy is the preferred partner in India</h2>
    <p>We manufacture and integrate kiosks in India, which means enclosure changes, brand finishes and peripheral choices are practical rather than a special order with a long lead time.</p><p>Certified Technology Specialists design the journey and the hardware together, we install nationally, and our support desk keeps public facing units running with monitoring and defined response times.</p>
    <p><a href="contact-us.php">Reach out to our team</a> to plan your installation, or send the four field form on this page and a Certified Technology Specialist will come back within 24 working hours.</p>
  </div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">How industries use it</p>
  <h2 class="h2" style="margin-bottom:18px">Where kiosks reduce real cost</h2>
  <p class="lede" style="max-width:52em">Banks, hospitals, malls, campuses and government offices deploy kiosks where a queue forms for a repeatable transaction. Success comes from limiting each unit to one clear job and putting it where the queue actually starts.</p>
</div></section>

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <h2 class="h2" style="margin-bottom:16px">FAQs about interactive touch kiosks</h2>
    <p class="lede" style="margin-bottom:20px">Answers to what buyers ask us most. Anything else, ask a specialist directly.</p>
    <a class="btn btn-secondary" href="tel:+919930373731" style="font-weight:700">Call +91 99303 73731</a>
  </div>
  <div class="faqs"><details><summary>Can you build the enclosure to our brand?</summary><p>Yes. We manufacture in India, so colour, finish, branding and layout are part of the standard process.</p></details><details><summary>Do you develop the kiosk application?</summary><p>We integrate your application, or build a straightforward one for wayfinding, feedback or registration journeys.</p></details><details><summary>Which peripherals can be added?</summary><p>Thermal printers, barcode and QR scanners, card and Aadhaar readers, cameras, payment terminals and audio.</p></details><details><summary>Are outdoor kiosks possible?</summary><p>Yes, with IP rated enclosures, sunlight readable panels and thermal management.</p></details><details><summary>How is uptime managed?</summary><p>Remote monitoring for application and hardware health, consumable alerts and on-site response under your contract.</p></details><details><summary>What about accessibility?</summary><p>Reach ranges, screen height, contrast and audio prompts are considered at design stage, and dual height layouts are available.</p></details><details><summary>What is a touch screen kiosk?</summary><p>A touch screen kiosk is a small physical structure (often including a computer and a display screen) that displays information for people walking by.</p></details><details><summary>What are the various types of kiosks:?</summary><p>A) Touch Screen Kiosk: These has the touch screen interface which looks similar to the computer screen. Mostly the touch screen kiosks are used by the retail sectors or the places that have lot of traffic. Shopping malls, stations, music stores are examples where this kiosk is used. Special programming is used in it which helps to easily navigate through many pages. They are available in different languages so that people from even different background don’t have any problem while accessing it. B) Retail Kiosk: They are special types of kiosk that help the company to showcase all the products and services on one screen. Retail kiosk has gained lot of popularity in last few years. C) Security Kiosk: These help the school, universities, and companies etc to keep the check on the visitors. It helps to keep track on the visitors for the security purposes. D) Photo Kiosk: With the help of these, users can print the phots from the digital images of their camera. They can instantly take out the photos and pay them. There are two types of photo kiosks. 1) Instant print stations and 2) Digital print stations. E) Way-finding Kiosks: kiosks providing a service to help people establish where they are exactly within a location, and what is nearby and how to get there. For example: Airport way finding Kiosk where passengers can find duty free shops, flight gates, business lounges, toilets, distance to them and the time it takes to get there. F) Self-service Kiosks: This Kiosk is mainly used for providing a service such as taking payment from customer, print certified documents, issue licenses/ID cards or perform a booking or reservation. G) Information Kiosks: It is used to give information to the user of the system. An Information must be clear and concise, detailed wherever required. H) Internet Kiosks: This type of kiosks are mainly found in public waiting areas such as airports, train stations, libraries and museums.</p></details><details><summary>What are the benefits of using interactive kiosks?</summary><p>1) Free Up Employees: Employees that would ordinarily be answering questions are free to perform other, less mundane, and more fulfilling tasks during their working day as a result employees have a higher job satisfaction, and reduced staff turnover.2) Reduce Costs: Another of the benefits of using interactive kiosks is related to cost cutting. It may not be necessary to employ such a large customer services team, and because your employees will be able to concentrate on mission critical tasks, it means that you can save money. A reduction in salaries means a reduction in overall costs, and when you consider that a kiosk doesn’t need hourly breaks, won’t have to stop for lunch, and can work for 24 hours a day if needs be, without calling on a union representative, it means that you can enjoy greatly reduced costs. Reducing overheads is an ongoing struggle for a lot of organisations, and it is one of the key factors in ensuring that you run an optimal business venture.3) Offer Instant Customer Service: Customer service is vital to the performance of a successful business. Whether it is directing customers to the right area of a retail store, or offering help and advice on using your company’s services, a kiosk offers instant access to that information, and it can help to reduce waiting times at customer service desks. A happy customer is not only more likely to make a purchase, but will be more inclined to share their positive experience with others.4) Interactive Means Active Interaction: Interactive kiosks can offer experiential marketing to potential customers, and because they are interactive, it means that your customers have already invested time and effort into your products or services. The more time they invest, the more they will feel invested, and the more likely they will be to want to make a purchase. By providing helpful information, you are also building trust, and trust really does go a long way in forging a positive B2C relationship. The kiosks can even offer upselling and cross-selling, when used in a retail setting, which is something that is generally considered obtrusive when a human employee tries it. They can increase your revenue, as well as reduce your overhead costs – further examples of the benefits of using interactive kiosks.</p></details><details><summary>Are touch screen kiosks easy to transport?</summary><p>The models comes with the weight of Approx 64kgs but we can provide with wheels which makes the transportation easy from one place to another.</p></details><details><summary>How secure your kiosks are?</summary><p>All of our kiosks secure your tablet in a non-breakable thermoplastic head with a keyed lock. There’s also a lock for the back panel to keep visitors from being able to disassemble the kiosk or access any inner components you may be using.</p></details><details><summary>Can your kiosks be bolted down?</summary><p>Absolutely. Our kiosks have hidden holes in the base plate for bolting to a floor, countertop or wall. As the type of bolt used will vary depending on the surface you are mounting the kiosk on, these bolts are not included.</p></details><details><summary>Are your kiosks weather proof?</summary><p>Yes, we stock all our standard kiosk enclosures in our warehouse. Stocking our mostly frequently ordered models allows us to cut down our lead time and get kiosks to our customers faster.</p></details><details><summary>What are your kiosks made of?</summary><p>Our simple and sleek kiosk designs are built to last with precision cut, 14 and 16-gauge steel and then powder coated to withstand even the harshest public environment. Sometimes steel is not the best material for certain custom kiosks, therefore we use various gauges of architectural aluminum for its durability in indoor and outdoor environments. We also Galvanised steel for making kiosks.</p></details><details><summary>What color options are available?</summary><p>Yes colour options are available. we also have access to over 100 different varieties of high-gloss, semi-gloss and texture finishes. Of course, if you’re in need of a specific, custom color, we can provide that too.</p></details><details><summary>How easy is IT to install touch screen kiosks across multiple branches?</summary><p>Plug-and-play with wireless setup; connect to your Wi-Fi and load apps remotely. Installation can be managed easily across multiple cities in India without requiring specialized technical teams.</p></details><details><summary>Are touch screen kiosks suitable for high-traffic environments?</summary><p>Yes — touch screen kiosks are designed with durable commercial-grade components to withstand heavy usage in malls, transportation hubs, and busy business locations.</p></details><details><summary>Can I deploy touch screen kiosks outdoors or in public spaces?</summary><p>Yes — many kiosks are available with weather-resistant enclosures and high-brightness screens, ensuring visibility and durability in outdoor or semi-outdoor areas.</p></details><details><summary>Do touch screen kiosk manufacturers in india provide software and content management?</summary><p>Yes — reputable manufacturers provide both hardware and touch screen kiosk software solutions to manage content, updates, and analytics from a central dashboard.</p></details><details><summary>What factors affect the touch screen kiosk price in India?</summary><p>The touch screen kiosk price depends on screen size, features, software integration, customization, and installation requirements. Advanced configurations and larger displays usually increase the cost.</p></details><details><summary>Where are touch screen kiosks commonly used?</summary><p>Touch screen kiosks are widely used in retail stores, malls, restaurants, airports, hospitals, and corporate offices to provide information, enable transactions, and improve customer engagement.</p></details><details><summary>What is the average touch screen kiosk price in India?</summary><p>The touch screen kiosk price in India can vary widely depending on size, features, and customisation, typically ranging from basic models to more advanced, high-end solutions.</p></details><details><summary>Are touch screen kiosks customizable for different businesses?</summary><p>Yes, touch screen kiosk solutions can be customized to meet industry needs, including design, interface, features, and integration with existing systems.</p></details><details><summary>Is investing in touch screen kiosks cost-effective for businesses?</summary><p>Yes, touch screen kiosks help reduce manpower costs, improve efficiency, and enhance customer interaction, making them a cost-effective long-term investment for businesses.</p></details></div>
</div></div></section>

<section class="sec"><div class="wrap">
  <p class="kicker">Gallery</p>
  <h2 class="h2" style="margin-bottom:28px">Installations from our project archive</h2>
  <div class="grid3"><div class="washed"><img src="assets/img/1c473111-5ddc-4342-b0f8-588c0e2fec81-1.jpg" alt="kiosk deployment installation 1" loading="lazy"></div><div class="washed"><img src="assets/img/148bb996-a61b-4e29-b7b7-7cb89af02d51.jpg" alt="kiosk deployment installation 2" loading="lazy"></div><div class="washed"><img src="assets/img/2997b072-8760-498a-a02c-b77e07af4dc9.jpg" alt="kiosk deployment installation 3" loading="lazy"></div><div class="washed"><img src="assets/img/80460de1-ba39-4c40-b582-c5c826f95d6d.jpg" alt="kiosk deployment installation 4" loading="lazy"></div><div class="washed"><img src="assets/img/949786d1-480b-49a2-a994-78183ee8e620.jpg" alt="kiosk deployment installation 5" loading="lazy"></div><div class="washed"><img src="assets/img/1696003b-7ea3-4cc5-9b71-ec183a3c4de4.jpg" alt="kiosk deployment installation 6" loading="lazy"></div></div>
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
