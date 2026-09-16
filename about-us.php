<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Who We Are | Audio-Video Specialists Since 1994 | Bitsy AV';
$pageDescription = 'Bitsy Infotech has designed audio-video systems since 1994: 1000+ clients, 400+ locations pan-India, AVIXA certified specialists, turnkey delivery and in-house support.';
$activeNav = 'about';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/Digital-Display-Solutions-home-page.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / Who we are</p>
      <h1>Thirty years of getting the room right the first time</h1>
      <p class="lede">Founded in 1994, Bitsy is an audio-video innovator and technical interiors specialist, staffed by Certified Technology Specialists and Certified Audio-Video Technologists.</p>
      <div class="acts"><a class="btn btn-primary" href="#quote" style="font-weight:800">Book a free advice session</a><a class="btn btn-secondary" href="clients.php" style="font-weight:700">See our clients</a></div>
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
      <div><h2>Talk to a specialist<span>4 fields, reply in 24 working hours</span></h2></div>
    </div>
    <form action="submit.php" method="post" novalidate>
      <input type="hidden" name="source" value="about_page">
      <input type="hidden" name="page" value="about">
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
    <h2 class="h2" style="margin-bottom:18px">Is Bitsy the right fit for you?</h2>
    <p>We develop high end audio-video solutions that deliver effective digital experiences: customer experience zones, command operations centres, studios, auditoriums, lobbies, meeting boardrooms, tech labs, smart building environments, digital display walls and turnkey IT infrastructure.</p>
    <p>If you are looking for the cheapest, we are probably not your match. Going cheap tends to cost more in the long run, in downtime, in replacements and in the meeting that could not start. We would rather run the needs analysis, tell you what the room really requires, and stand behind it for years.</p>
    <p>We do not simply sell audio-video and IT products. We help customers make informed buying decisions by doing a needs analysis against AVIXA standards and giving an exact solution that meets the requirement. That is how we came to celebrate more than <strong>1000 loyal clients</strong>.</p>
    <h3>How we work</h3>
    <table class="deftable"><tbody><tr><th>Needs analysis first</th><td>Room, audience, content, running hours and budget, measured against AVIXA standards.</td></tr><tr><th>Design and honest budget</th><td>A layout and a spec sheet you can take to procurement, free and without obligation.</td></tr><tr><th>Turnkey delivery</th><td>Supply, cabling, installation, software, commissioning and user training by one team.</td></tr><tr><th>Support that answers</th><td>A dedicated desk, logged tickets and contracted response times.</td></tr></tbody></table>
    <h3>Why us</h3>
    <ul>
      <li>Working since 1994</li>
      <li>Team of Certified Technology Specialists</li>
      <li>Award winning trusted partner for AV and ICT solutions</li>
      <li>More than 400 locations served pan-India</li>
      <li>Turnkey projects delivered end to end</li>
      <li>5 star Google ratings</li>
      <li>ISO certified, GeM registered, Make in India partner</li>
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
  <div><h2>Thirty years of rooms. Yours is next.</h2><p>Tell us the space and the goal. A Certified Technology Specialist comes back with a layout, a spec sheet and an honest budget, free.</p></div>
  <div class="acts"><a class="btn btn-ink" href="#quote">Get my free AV design</a><a class="btn btn-cream" href="tel:+919930373731">+91 99303 73731</a></div>
</div></div></section>


<section class="sec"><div class="wrap">
  <h2 class="h2" style="margin-bottom:34px">What procurement teams say</h2>
  <div class="quotes"><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“As part of our total solution for combined audio-visual technology, we opted for Bitsy because of the commitment shown in terms of solution, pricing, technology and meeting deadlines. We feel most comfortable and confident with the total offerings of Bitsy.”</p><footer><b>Sandeep A. Kadam</b><span>Manager, Procurement Department, Reliance Industries Limited</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“We are delighted with the prompt installation and support offered by Bitsy for both boardroom solutions and branch displays. The quality of the products is good and we have not received any complaints from the end users.”</p><footer><b>Asif Hameed</b><span>Manager (C &amp; C), IT Department, SBI</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“Bitsy has the best products in the category. We are pleased with our choice of Bitsy.”</p><footer><b>Mr. Jitendra Panchal</b><span>Associate Vice President, IT, NMIMS University</span></footer></blockquote><blockquote class="card elev-sm"><div class="stars"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><p>“Bitsy was considered as it showed a strong interest in working on the project. They matched the requirements and worked closely with us.”</p><footer><b>Rajkumar Nair</b><span>Assistant General Manager (IT), Kanakia Spaces Pvt. Ltd.</span></footer></blockquote></div>
</div></section>

<section class="sec"><div class="wrap">
  <h2 class="h2" style="margin-bottom:8px">Aspirations, social contribution &amp; responsibility</h2>
  <p class="lede" style="margin-bottom:34px">We don't sell import or refurbished material and follow fair business practices. Meet the people behind that promise.</p>
  <div class="team">
    <div class="teamcard"><img src="assets/img/team/satish-villait.jpg" alt="Mr. Satish Villait" loading="lazy"><h3>Mr. Satish Villait</h3><p class="role">Chief Belief Officer</p><p>Dynamic, enterprising, the driving force of Bitsy Infotech &amp; a multi-phased personality. He is also one of the most recognized entrepreneurial trainers.</p><a class="mail" href="mailto:satish@bitsy.biz" aria-label="Email Satish Villait"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
    <div class="teamcard"><img src="assets/img/team/ranjeet-rai.jpg" alt="Mr. Ranjeet Rai" loading="lazy"><h3>Mr. Ranjeet Rai</h3><p class="role">Auditor</p><p>Committed as well as dedicated, and the person responsible for the financial health of Bitsy.</p><a class="mail" href="mailto:info@bitsydisplays.com" aria-label="Email Ranjeet Rai"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
    <div class="teamcard"><img src="assets/img/team/pranay-jadhav.png" alt="Mr. Pranay Jadhav" loading="lazy"><h3>Mr. Pranay Jadhav</h3><p class="role">Certified AV Technologist</p><p>Operates and maintains audio and video solutions.</p><a class="mail" href="mailto:info@bitsydisplays.com" aria-label="Email Pranay Jadhav"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
    <div class="teamcard"><img src="assets/img/team/ayesha-villait.jpg" alt="Mrs. Ayesha Villait" loading="lazy"><h3>Mrs. Ayesha Villait</h3><p class="role">Big Boss</p><p>Synchronizing as well as channelizing efficiency of the company &amp; its process.</p><a class="mail" href="mailto:ayesha@bitsy.biz" aria-label="Email Ayesha Villait"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
    <div class="teamcard"><img src="assets/img/team/ishaq-hathyari.jpg" alt="Mr. Ishaq Hathyari" loading="lazy"><h3>Mr. Ishaq Hathyari</h3><p class="role">Money Maestro</p><p>The person who believes in figures, day in and day out. Manages a team of five and handles accountants as well as the finances of Bitsy.</p><a class="mail" href="mailto:info@bitsydisplays.com" aria-label="Email Ishaq Hathyari"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
    <div class="teamcard"><img src="assets/img/team/milind-shinde.png" alt="Mr. Milind Shinde" loading="lazy"><h3>Mr. Milind Shinde</h3><p class="role">Business Evangelist</p><p>Responsible for supporting the company's sales and marketing initiatives through product information management, reporting and administrative duties.</p><a class="mail" href="mailto:info@bitsydisplays.com" aria-label="Email Milind Shinde"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
    <div class="teamcard"><img src="assets/img/team/dhaval-shah.png" alt="Mr. Dhaval Shah" loading="lazy"><h3>Mr. Dhaval Shah</h3><p class="role">AV Therapist</p><p>A digital signage solution provider: hardworking, a go-getter with exceptional critical thinking skills and the ability to work through unforeseen challenges.</p><a class="mail" href="mailto:info@bitsydisplays.com" aria-label="Email Dhaval Shah"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
    <div class="teamcard"><img src="assets/img/team/sneha-bhandari.png" alt="Mrs. Sneha Bhandari" loading="lazy"><h3>Mrs. Sneha Bhandari</h3><p class="role">Service Guru</p><p>Committed, dedicated and responsible for in-house repairs, AMC and service related matters. Leads and grooms the support team.</p><a class="mail" href="mailto:info@bitsydisplays.com" aria-label="Email Sneha Bhandari"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg></a></div>
  </div>
</div></section>

<section class="sec"><div class="wrap"><div class="panel">
  <h2 class="h2" style="font-size:36px;margin-bottom:8px">We worked with</h2>
  <p class="lede" style="margin-bottom:30px">Our favourite brands are our friends. We help them hit their goals, they keep us sharp.</p>
  <div class="logos"><img src="assets/img/reliance-1.jpg" alt="Reliance" loading="lazy"><img src="assets/img/tata.jpg" alt="Tata" loading="lazy"><img src="assets/img/sbi-1.jpg" alt="SBI" loading="lazy"><img src="assets/img/Mahindra.png" alt="Mahindra" loading="lazy"><img src="assets/img/adani.jpg" alt="Adani" loading="lazy"><img src="assets/img/lt-1.jpg" alt="Larsen &amp; Toubro" loading="lazy"><img src="assets/img/wipro.jpg" alt="Wipro" loading="lazy"><img src="assets/img/godrej.jpg" alt="Godrej" loading="lazy"><img src="assets/img/audi.jpg" alt="Audi" loading="lazy"><img src="assets/img/mercedes.jpg" alt="Mercedes-Benz" loading="lazy"><img src="assets/img/JW_Marriott_logo.png" alt="JW Marriott" loading="lazy"><img src="assets/img/mc-donald-1.jpg" alt="McDonalds" loading="lazy"><img src="assets/img/pizza-hut-1.jpg" alt="Pizza Hut" loading="lazy"><img src="assets/img/pvr-1.jpg" alt="PVR" loading="lazy"><img src="assets/img/inox.jpg" alt="INOX" loading="lazy"><img src="assets/img/airtel-1.jpg" alt="Airtel" loading="lazy"><img src="assets/img/huawei.jpg" alt="Huawei" loading="lazy"><img src="assets/img/axis-1.jpg" alt="Axis Bank" loading="lazy"><img src="assets/img/bajaj.jpg" alt="Bajaj" loading="lazy"><img src="assets/img/mumbai-metro-1.jpg" alt="Mumbai Metro" loading="lazy"><img src="assets/img/nmims-1.jpg" alt="NMIMS" loading="lazy"><img src="assets/img/zee-tv.jpg" alt="Zee TV" loading="lazy"><img src="assets/img/star-1.jpg" alt="Star" loading="lazy"><img src="assets/img/gvk.jpg" alt="GVK" loading="lazy"></div>
</div></div></section>

<section class="sec"><div class="wrap"><div class="finalcta"><div class="finalcta-shot"><div class="washed"><img src="assets/img/Audio-video-solution.webp" alt="Bitsy audio-video installation" loading="lazy"></div></div><div class="finalcta-body">
  <h2>Visuals speak louder than words</h2>
  <p>Get a free audio-video design, a spec sheet and an honest budget from a Certified Technology Specialist. Twenty four hours, no obligation.</p>
  <div class="acts"><a class="btn btn-primary" href="#quote">Get my free AV design</a><a class="btn btn-sage" href="https://wa.me/919821157155">WhatsApp us</a></div></div>
</div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
