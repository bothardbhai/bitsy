<?php
/**
 * Seed the 6 existing blog cards into the posts table.
 * Run once: php database/seed_posts.php
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/cms.php';

$posts = array(
  array(
    'slug' => 'how-to-size-video-wall',
    'status' => 'published',
    'title' => 'How to size a video wall for your room',
    'excerpt' => 'Pixel pitch, viewing distance and content resolution, in the order they should be decided.',
    'content' => '<p>Pixel pitch, viewing distance and content resolution, in the order they should be decided.</p><p>A video wall is one of the most impactful investments in a commercial space, but getting the sizing right requires more than measuring the wall. Here is a practical framework:</p><h3>1. Start with the viewing distance</h3><p>The distance from the nearest viewer to the screen determines the pixel pitch you need. As a rule of thumb: for every 1 metre of viewing distance, you need roughly 1mm of pixel pitch. A 4-metre viewing distance calls for a P2.5 or tighter.</p><h3>2. Choose the content resolution</h3><p>Before choosing panel count, decide what you want to display. A 4K content feed needs at least 3840 pixels across. At P1.8, that is about 6.9 metres. At P2.5, you need 9.6 metres. Content resolution drives the physical size.</p><h3>3. Calculate panel count</h3><p>Once you know the total pixel width and height needed, divide by the resolution of one panel. Common panel sizes are 600x337.5mm (16:9) in various pitches.</p><h3>4. Account for bezels</h3><p>Even seamless LED panels have a mechanical gap of 0.1-0.3mm. For LCD video walls, bezels are 0.88-3.5mm. Factor this into pixel-level accuracy for text and data overlays.</p><p>Getting this right the first time avoids costly rework. Our Certified Technology Specialists run this analysis against AVIXA standards as part of the free design service.</p>',
    'meta_description' => 'Step-by-step guide to sizing an LED or LCD video wall: pixel pitch, viewing distance, content resolution and panel count.',
    'featured_image' => 'assets/img/Audio-video-solution.webp',
    'published_at' => '2024-06-15 10:00:00',
  ),
  array(
    'slug' => 'boardroom-audio-intelligibility',
    'status' => 'published',
    'title' => 'Boardroom audio: why intelligibility beats speaker count',
    'excerpt' => 'What acoustics, microphone coverage and DSP actually do for a hybrid meeting.',
    'content' => '<p>What acoustics, microphone coverage and DSP actually do for a hybrid meeting.</p><p>The most common mistake in boardroom audio is treating it like a home theatre. More speakers do not make voices clearer. Here is what actually matters:</p><h3>Room acoustics come first</h3><p>Hard surfaces (glass, marble, polished wood) create reflections that destroy speech intelligibility. Before choosing any equipment, address the room: acoustic panels, carpet, curtains or a combination. The target is an RT60 (reverberation time) below 0.6 seconds for speech.</p><h3>Microphone coverage over speaker power</h3><p>A single ceiling microphone covering a 6-metre table will pick up half the words. Distributed microphones or beamforming ceiling arrays ensure every seat is within 1.5 metres of a pickup point. This matters more than the speaker wattage.</p><h3>DSP is the real engine</h3><p>Digital Signal Processing handles echo cancellation, noise reduction and auto-mixing. In hybrid meetings, the remote side hears the DSP output, not the room. A good DSP makes the difference between a productive meeting and people saying "sorry, can you repeat that?"</p><p>The right boardroom starts with the right analysis. We run AVIXA-standard acoustic measurements as part of the free design.</p>',
    'meta_description' => 'Why speech intelligibility matters more than speaker count in boardroom audio, and how acoustics, microphones and DSP work together.',
    'featured_image' => 'assets/img/Audio-video-solution.webp',
    'published_at' => '2024-07-10 10:00:00',
  ),
  array(
    'slug' => 'commercial-panel-vs-consumer-tv',
    'status' => 'published',
    'title' => 'Commercial panel or consumer television',
    'excerpt' => 'Duty cycle, brightness, warranty and remote management compared honestly.',
    'content' => '<p>Duty cycle, brightness, warranty and remote management compared honestly.</p><p>It is tempting to buy consumer televisions for digital signage. They are cheaper, readily available and look the same on the shelf. Here is where they diverge in practice:</p><h3>Duty cycle</h3><p>Consumer TVs are designed for 8-10 hours per day. Commercial panels run 16-24 hours. Running a consumer panel in a lobby from 8am to 10pm will burn the backlight within 18 months.</p><h3>Brightness</h3><p>A consumer TV at 300 nits is fine for a living room. A commercial panel in a window-facing kiosk needs 700-2500 nits to remain visible in sunlight. The brightness difference is not incremental; it is the difference between readable and washed out.</p><h3>Remote management</h3><p>Commercial panels support RS-232, SNMP or proprietary CMS platforms. You can schedule content, monitor health, reboot remotely and push firmware updates. Consumer TVs require someone to walk up with a USB drive.</p><h3>Warranty</h3><p>Consumer warranties explicitly exclude commercial use. A commercial panel warranty covers 18-36 hours of daily operation and includes on-site swap.</p><p>For a sign that runs once a week for an hour, a consumer TV is fine. For anything more, commercial panels pay for themselves in avoided replacements.</p>',
    'meta_description' => 'Honest comparison of commercial display panels vs consumer televisions for digital signage: duty cycle, brightness, remote management and warranty.',
    'featured_image' => 'assets/img/Audio-video-solution.webp',
    'published_at' => '2024-08-05 10:00:00',
  ),
  array(
    'slug' => 'control-room-ergonomics',
    'status' => 'published',
    'title' => 'Control room ergonomics for twelve hour shifts',
    'excerpt' => 'Sightlines, glare, console layout and how they change operator response time.',
    'content' => '<p>Sightlines, glare, console layout and how they change operator response time.</p><p>Control rooms operate around the clock, and operator fatigue is not a comfort issue; it is a safety issue. Here are the elements that matter most:</p><h3>Sightlines and viewing angle</h3><p>The primary video wall should be at or slightly above eye level from the seated position. The ideal viewing angle is within 30 degrees of centre. Off-axis viewing causes colour shift and eye strain over 8-12 hour shifts.</p><h3>Glare control</h3><p>Ambient light reflecting off the video wall or individual monitors degrades contrast and forces the eye to work harder. Use matte finishes, position lights to avoid reflections, and consider ambient light sensors for automatic brightness adjustment.</p><h3>Console layout</h3><p>Primary monitors at arm\'s length (50-70cm), secondary displays within a 15-degree neck rotation. Keyboard and mouse at elbow height. Control room furniture is not optional; it is part of the AV specification.</p><h3>Colour temperature</h3><p>Maintain 6500K across all displays. Mixed colour temperatures (warm task lighting, cool video wall) cause the brain to constantly re-adapt, accelerating fatigue.</p><p>Our control room designs include ergonomic assessments as standard, not as an add-on.</p>',
    'meta_description' => 'Control room design essentials: sightlines, glare control, console layout and display calibration for 12-hour shift operations.',
    'featured_image' => 'assets/img/Audio-video-solution.webp',
    'published_at' => '2024-09-01 10:00:00',
  ),
  array(
    'slug' => 'eink-vs-lcd-room-signage',
    'status' => 'published',
    'title' => 'E-ink or LCD for room signage',
    'excerpt' => 'Where battery powered paper-like displays win, and where they do not.',
    'content' => '<p>Where battery powered paper-like displays win, and where they do not.</p><p>E-ink displays have become popular for room booking and wayfinding. Here is an honest assessment of when they work and when they do not:</p><h3>Where e-ink wins</h3><p><b>Battery operation.</b> No power cable means no electrician, no conduit and no disruption to install. A single charge lasts 6-12 months depending on update frequency. This makes retrofit installations trivial.</p><p><b>Glare-free readability.</b> E-ink reflects ambient light rather than emitting it. In bright corridors and lobbies, it is more readable than an LCD panel at a fraction of the power.</p><p><b>Wireless updates.</b> Most e-ink solutions support Wi-Fi or BLE updates from a cloud CMS. Content changes happen in seconds without physical access.</p><h3>Where e-ink loses</h3><p><b>No video or animation.</b> E-ink refreshes at 0.5-1 second intervals. It cannot display video, scrolling tickers or animated wayfinding arrows.</p><p><b>Colour limitations.</b> Current e-ink panels support 3-7 colours. Full-colour signage or photographic content needs an LCD.</p><p><b>Viewing angle.</b> E-ink is excellent in direct front view but degrades at steep angles, which matters for corridor installations.</p><p>The right choice depends on the content, the environment and the maintenance model. We spec both and recommend what fits.</p>',
    'meta_description' => 'E-ink vs LCD for room signage: battery life, readability, colour, animation and when to use each technology.',
    'featured_image' => 'assets/img/Audio-video-solution.webp',
    'published_at' => '2024-10-10 10:00:00',
  ),
  array(
    'slug' => 'outdoor-led-indian-weather',
    'status' => 'published',
    'title' => 'Outdoor LED in Indian weather',
    'excerpt' => 'Nits, IP ratings, thermal design and a maintenance plan that holds up.',
    'content' => '<p>Nits, IP ratings, thermal design and a maintenance plan that holds up.</p><p>India\'s climate throws challenges at outdoor LED that temperate markets never face. Here is what to specify:</p><h3>Brightness</h3><p>Direct sunlight in Mumbai or Delhi can exceed 100,000 lux. A readable outdoor LED display needs 5,000-10,000 nits minimum. Below that, content washes out in midday sun. Auto-brightness sensors adjust for day/night to reduce power and extend panel life.</p><h3>IP rating</h3><p>IP65 is the baseline for outdoor LED: dust-tight and protected against water jets. IP66 or IP67 is preferable for coastal locations where salt spray and monsoon rain are factors. Front-serviceable panels reduce maintenance risk.</p><h3>Thermal design</h3><p>Ambient temperatures of 40-48 degrees plus direct sun load mean the cabinet needs active cooling or oversized heatsinks. Poor thermal design leads to colour shift, dead pixels and shortened panel life. Specify operating range up to 55 degrees Celsius.</p><h3>Maintenance plan</h3><p>Dust, humidity and thermal cycling degrade panels over time. A maintenance contract with defined SLAs for cleaning, module replacement and firmware updates is not optional; it is part of the total cost of ownership.</p><p>We design outdoor LED for Indian conditions from day one, not as an afterthought.</p>',
    'meta_description' => 'Outdoor LED display specification guide for Indian conditions: brightness, IP rating, thermal design and maintenance planning.',
    'featured_image' => 'assets/img/Audio-video-solution.webp',
    'published_at' => '2024-11-05 10:00:00',
  ),
);

$db = bitsy_db();
if (!$db) {
  echo "ERROR: Could not connect to database\n";
  exit(1);
}

$count = 0;
foreach ($posts as $post) {
  /* Skip if slug already exists */
  $check = $db->prepare("SELECT id FROM posts WHERE slug = :slug LIMIT 1");
  $check->execute(array(':slug' => $post['slug']));
  if ($check->fetch()) {
    echo "SKIP: {$post['slug']} (already exists)\n";
    continue;
  }
  $q = $db->prepare("INSERT INTO posts (slug, status, title, excerpt, content, meta_description, featured_image, published_at, created_at) VALUES (:slug, :status, :title, :excerpt, :content, :meta, :image, :published, NOW())");
  $q->execute(array(
    ':slug' => $post['slug'],
    ':status' => $post['status'],
    ':title' => $post['title'],
    ':excerpt' => $post['excerpt'],
    ':content' => $post['content'],
    ':meta' => $post['meta_description'],
    ':image' => $post['featured_image'],
    ':published' => $post['published_at'],
  ));
  echo "OK: {$post['title']} (ID " . $db->lastInsertId() . ")\n";
  $count++;
}

echo "\nSeeded $count posts.\n";
