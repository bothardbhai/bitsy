<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Contact Us | Free AV Design and Pricing in 24 Hours | Bitsy AV';
$pageDescription = 'Call +91 99303 73731, WhatsApp us or send your brief. A Certified Technology Specialist replies within 24 working hours with a layout and an honest budget.';
$activeNav = 'contact';
require __DIR__ . '/includes/header.php';
?>
<section class="pagehero banner" style="--banner:url('assets/img/Audio-video-solution.webp')">
  <span class="blob"></span>
  <div class="wrap pagehero-in">
    <div>
      <p class="crumbs"><a href="index.php">Home</a> / Contact Us</p>
      <h1>Send the brief. Get a design and a number.</h1>
      <p class="lede">Ninety seconds of detail is all a Certified Technology Specialist needs to come back with a layout, a spec sheet and an honest budget, free.</p>
      <ul class="ticks" style="margin-top:24px">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg><a href="tel:+919930373731">+91 99303 73731</a></li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg><a href="mailto:info@bitsydisplays.com">info@bitsydisplays.com</a></li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg><a href="https://wa.me/919821157155">WhatsApp us</a></li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Monday to Saturday, 9:30am to 6:30pm IST</li>
      </ul>
      <p class="lede" style="font-size:15px;margin-top:20px">Bitsy Infotech Pvt Ltd, Office No 201 &amp; 202, 2nd Floor, Dharmakshetra 1 CHS, Near Amba Mata Mandir, Above Union Bank, Factory Lane Road, Shimpoli, Borivali West, Mumbai 400092, India</p>
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
      <div><h2>Quick request<span>4 fields, the fastest way to a price</span></h2></div>
    </div>
    <form action="submit.php" method="post" novalidate>
      <input type="hidden" name="source" value="contact_quick">
      <input type="hidden" name="page" value="contact">
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

<section class="sec"><div class="wrap"><div class="split narrow-left">
  <div>
    <p class="kicker">Want an exact number?</p>
    <h2 class="h2" style="margin-bottom:16px">Full project brief</h2>
    <p class="lede" style="margin-bottom:24px">The more you tell us, the tighter the estimate. This goes straight to a Certified Technology Specialist, not a call centre.</p>
    <ul class="steps">
      <li><b>1</b>A specialist reads your brief personally</li>
      <li><b>2</b>You get a layout and spec sheet, not a price list</li>
      <li><b>3</b>One follow up call at a time you choose</li>
    </ul>
  </div>
  
  <div class="formcard plain" id="brief" style="padding:30px 32px 32px">
    <form action="submit.php" method="post" novalidate style="padding:0">
      <input type="hidden" name="source" value="contact_detailed_brief">
      <input type="hidden" name="page" value="contact">
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


<section class="sec"><div class="wrap"><div class="panel">
  <h2 class="h2" style="font-size:36px;margin-bottom:8px">Trusted by</h2>
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
<?php require __DIR__ . '/includes/footer.php'; ?>
