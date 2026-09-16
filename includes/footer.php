<?php
/**
 * Shared footer + FAB chat widget + quick-contact rails + sticky mobile bar
 * + common trailing scripts, included by every frontend page in place of the
 * markup that used to be duplicated at the bottom of each file.
 *
 * $quoteHref (set by the caller before including header.php) controls every
 * "#quote" link in this file too, so pages with no on-page quote form (e.g.
 * thank-you.php, post.php, category.php) can point it at
 * 'contact-us.php#quote' instead of a dead in-page anchor.
 */
$quoteHref = isset($quoteHref) ? $quoteHref : '#quote';
$quoteHrefAttr = htmlspecialchars($quoteHref, ENT_QUOTES, 'UTF-8');
?>
  <footer class="ftr">
    <div class="wrap ftr-g">
      <div>
        <a class="ftr-logo" href="index.php"><img src="assets/img/bitsy-logo.png"
            alt="Bitsy AV, innovations with audio-video" width="1254" height="452"></a>
        <p>Bitsy Infotech Pvt Ltd, Office No 201 &amp; 202, 2nd Floor, Dharmakshetra 1 CHS, Near Amba Mata Mandir, Above
          Union Bank, Factory Lane Road, Shimpoli, Borivali West, Mumbai 400092, India.</p>
        <p class="accent"><a href="mailto:info@bitsydisplays.com">info@bitsydisplays.com</a><br><a
            href="tel:+919930373731">+91 99303 73731</a></p>
        <div class="certs"><img src="assets/img/gem.jpg" alt="Certification"><img src="assets/img/ISO.jpg"
            alt="Certification"><img src="assets/img/make-in-india.jpg" alt="Certification"></div>
      </div>
      <div>
        <p class="lbl">Our Solutions</p>
        <ul>
          <li><a href="audio-video-solutions.php">Audio-Video Solutions</a></li>
          <li><a href="conference-room-av.php">Conference Room AV</a></li>
          <li><a href="auditorium-av.php">Auditorium AV</a></li>
          <li><a href="digital-signage.php">Digital Signage</a></li>
          <li><a href="bitsy-e-ink-display.php">Bitsy E-Ink Display</a></li>
          <li><a href="interactive-touch-kiosk.php">Interactive Kiosks</a></li>
          <li><a href="led-lcd-video-wall.php">LED / LCD Video Wall</a></li>
          <li><a href="command-control-centre.php">Command &amp; Control Centre</a></li>
          <li><a href="studio.php">Studio Setup</a></li>
          <li><a href="wayfinding-kiosk.php">Wayfinding Kiosk</a></li>
        </ul>
      </div>
      <div>
        <p class="lbl">More Solutions</p>
        <ul>
          <li><a href="transparent-display.php">Transparent Display</a></li>
          <li><a href="video-processor.php">Video Processor</a></li>
          <li><a href="ar-vr-solutions.php">AR / VR Solutions</a></li>
          <li><a href="display-solutions.php">Display Solutions</a></li>
          <li><a href="digital-menu-boards.php">Digital Menu Boards</a></li>
          <li><a href="outdoor-led-display.php">Outdoor LED Display</a></li>
          <li><a href="projections.php">Projections</a></li>
          <li><a href="it-infrastructure.php">IT Infrastructure</a></li>
        </ul>
      </div>
      <div>
        <p class="lbl">Quick Links</p>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="our-services.php">All solutions</a></li>
          <li><a href="about-us.php">About Us</a></li>
          <li><a href="clients.php">Clients</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="blog.php">Blogs</a></li>
          <li><a href="contact-us.php">Contact us</a></li>
        </ul>
      </div>
    </div>
    <div class="ftr-btm">
      <div class="wrap ftr-btm-in"><span>© <?php echo date('Y'); ?> BitsyAV. All rights reserved. Bitsy Infotech Pvt
          Ltd.</span><a class="credit" href="https://www.savit.in/" target="_blank" rel="noopener">Designed and
          developed by <img src="assets/img/savit-logo.png" alt="Savit Interactive" loading="lazy"><sup
            class="regmark">®</sup></a></div>
    </div>
  </footer>

  <div class="fab" id="fab">
    <div class="fabpanel" id="fabpanel" hidden="hidden">
      <div class="fabpanel-hd">
        <p>Talk to a specialist</p>
        <span>Mon to Sat, 9:30am to 6:30pm IST</span>
        <button type="button" class="fabclose" aria-label="Close" onclick="bitsyFab(false)">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75"
            stroke-linecap="round">
            <path d="M6 6l12 12M18 6L6 18" />
          </svg>
        </button>
      </div>
      <div class="fabpanel-bd">
        <p class="fabq">How can we help?</p>
        <a class="faboption" href="<?php echo $quoteHrefAttr; ?>" onclick="bitsyFab(false)"><b>Get a free AV design</b><span>Four fields, reply
            in 24 working hours</span></a>
        <a class="faboption"
          href="https://wa.me/919821157155?text=Hi%20Bitsy%2C%20I%20need%20an%20AV%20solution"><b>Chat on
            WhatsApp</b><span>Fastest way to reach a specialist</span></a>
        <a class="faboption" href="tel:+919930373731"><b>Call +91 99303 73731</b><span>Speak to us directly</span></a>
        <a class="faboption" href="mailto:info@bitsydisplays.com"><b>Email us</b><span>info@bitsydisplays.com</span></a>
      </div>
    </div>
    <a class="fabbtn fabbtn-wa" href="https://wa.me/919821157155?text=Hi%20Bitsy%2C%20I%20need%20an%20AV%20solution"
      aria-label="WhatsApp Bitsy AV">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2Zm5.8 14.1c-.24.68-1.4 1.3-1.93 1.35-.53.05-1.03.24-3.5-.73-2.98-1.17-4.85-4.28-5-4.48-.15-.2-1.18-1.6-1.18-3.06 0-1.45.76-2.16 1.03-2.46.27-.29.58-.37.78-.37.2 0 .39.01.56.01.18 0 .42-.07.65.5.24.58.8 1.98.87 2.12.07.15.12.32.02.51-.1.2-.15.32-.29.5-.15.17-.31.39-.44.52-.15.15-.3.31-.13.6.17.29.76 1.25 1.63 2.03 1.12 1 2.06 1.31 2.35 1.46.29.15.46.12.63-.07.17-.2.73-.85.92-1.14.2-.29.39-.24.66-.15.27.1 1.69.8 1.98.94.29.15.49.22.56.34.07.13.07.73-.17 1.41Z" />
      </svg>
    </a>
    <button type="button" class="fabbtn fabbtn-chat" id="fabtoggle" aria-label="Open chat options" aria-expanded="false"
      onclick="bitsyFab()">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
        stroke-linecap="round" stroke-linejoin="round">
        <path
          d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
      </svg>
      <i class="fabdot"></i>
    </button>
  </div>
  <script>
    function bitsyFab(force) {
      var p = document.getElementById('fabpanel'), t = document.getElementById('fabtoggle');
      var open = typeof force === 'boolean' ? force : p.hasAttribute('hidden');
      if (open) { p.removeAttribute('hidden'); } else { p.setAttribute('hidden', 'hidden'); }
      t.setAttribute('aria-expanded', open);
      document.getElementById('fab').classList.toggle('open', open);
    }
  </script>

  <aside class="rail rail-left" aria-label="Quick contact">
    <a class="railbtn railbtn-call" href="tel:+919930373731" aria-label="Call Bitsy AV">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75"
        stroke-linecap="round" stroke-linejoin="round">
        <path
          d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z" />
      </svg>
      <span>Call now</span>
    </a>
    <a class="railbtn railbtn-mail" href="mailto:info@bitsydisplays.com?subject=AV%20requirement"
      aria-label="Email Bitsy AV">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75"
        stroke-linecap="round" stroke-linejoin="round">
        <rect x="2" y="4" width="20" height="16" rx="2" />
        <path d="m2 7 10 6 10-6" />
      </svg>
      <span>Email us</span>
    </a>
    <a class="railbtn railbtn-brief" href="contact-us.php#brief" aria-label="Send a project brief">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
        <path d="M14 2v6h6M9 15h6M9 11h3" />
      </svg>
      <span>Send a brief</span>
    </a>
  </aside>
  <aside class="rail rail-right" aria-label="Get a free design">
    <a class="railbtn railbtn-cta" href="<?php echo $quoteHrefAttr; ?>">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 4h16v12H5.17L4 17.17V4z" />
        <path d="M8 9h8M8 12h5" />
      </svg>
      <span>Free AV design in 24 hrs</span>
    </a>
  </aside>

  <div class="mobbar">
    <a class="btn btn-secondary" href="tel:+919930373731">Call</a>
    <a class="btn btn-secondary" href="https://wa.me/919821157155">WhatsApp</a>
    <a class="btn btn-primary" href="<?php echo $quoteHrefAttr; ?>">Free design</a>
  </div>
  <div class="mobspacer"></div>

  <script>
    (function () {
      function onScroll() {
        var h = document.querySelector('.hdr');
        if (!h) return;
        if (window.scrollY > 90) h.classList.add('scrolled'); else h.classList.remove('scrolled');
      }
      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll();
    })();
  </script>

  <script>
    (function () {
      var root = document.documentElement;
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
      root.classList.add('anim');
      var sel = '.sec .kicker,.sec > .wrap > h2,.sec > .wrap > .lede,.card,.quotes blockquote,.grid3 > *,.grid4 > *,.logogrid .clientcard,.panel,.ctaband,.finalcta,.magnet,.statband .g > div,.factgrid > div,.steps li,.deftable,.faqs details,.washed,.formcard.plain';
      var io = new IntersectionObserver(function (es) {
        es.forEach(function (e) {
          if (!e.isIntersecting) return;
          var el = e.target;
          el.style.setProperty('--d', (el.__i || 0) * 55 + 'ms');
          el.classList.add('in');
          io.unobserve(el);
        });
      }, { rootMargin: '0px 0px -8% 0px', threshold: .06 });
      requestAnimationFrame(function () {
        document.querySelectorAll(sel).forEach(function (el) {
          if (el.closest('.hero') || el.closest('.hdr') || el.closest('.pagehero')) return;
          el.classList.add('rise');
          var p = el.parentElement, i = 0, k = p ? p.children : [];
          for (var j = 0; j < k.length; j++) { if (k[j] === el) { i = Math.min(j, 5); break; } }
          el.__i = i;
          io.observe(el);
        });
        var nums = document.querySelectorAll('.statband b,.factgrid b,.herostats b');
        var no = new IntersectionObserver(function (es) {
          es.forEach(function (e) {
            if (!e.isIntersecting) return;
            var el = e.target, txt = el.textContent, m = txt.match(/^(\D*)(\d[\d,.]*)(.*)$/);
            no.unobserve(el);
            if (!m) return;
            var target = parseFloat(m[2].replace(/,/g, '')), dec = (m[2].split('.')[1] || '').length, t0 = null;
            function step(ts) {
              if (!t0) t0 = ts;
              var p = Math.min((ts - t0) / 900, 1), v = target * (1 - Math.pow(1 - p, 3));
              var s = dec ? v.toFixed(dec) : String(Math.round(v)); if (!dec && m[2].indexOf(',') > -1) s = Math.round(v).toLocaleString('en-IN'); el.textContent = m[1] + s + m[3];
              if (p < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
          });
        }, { threshold: .4 });
        nums.forEach(function (n) { no.observe(n) });
      });
    })();
  </script>

  <script>
    (function () {
      function load(el) {
        var id = el.getAttribute('data-yt');
        var f = document.createElement('iframe');
        f.src = 'https://www.youtube-nocookie.com/embed/' + id + '?autoplay=1&rel=0';
        f.title = el.getAttribute('aria-label') || 'Video';
        f.allow = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
        f.allowFullscreen = true; f.loading = 'lazy';
        el.replaceChildren(f); el.classList.add('playing');
      }
      document.querySelectorAll('.ytlite').forEach(function (el) {
        el.addEventListener('click', function () { load(el) });
        el.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); load(el) } });
      });
    })();
  </script>

  <script>
    (function () {
      var wrap = document.querySelector('.hasmega');
      if (!wrap) return;
      var panel = wrap.parentElement.querySelector('.mega') || document.querySelector('.mega');
      var t = null;
      function open() { clearTimeout(t); wrap.classList.add('open'); }
      function close() { clearTimeout(t); t = setTimeout(function () { wrap.classList.remove('open'); }, 320); }
      [wrap, panel].forEach(function (el) {
        if (!el) return;
        el.addEventListener('mouseenter', open);
        el.addEventListener('mouseleave', close);
        el.addEventListener('focusin', open);
      });
      document.addEventListener('keydown', function (e) { if (e.key === 'Escape') wrap.classList.remove('open'); });
    })();
  </script>
</body>

</html>
