<?php
/**
 * Bitsy AV lead handler. Validates, emails the sales inbox, logs a CSV backup,
 * then redirects to thank-you.php. Errors bounce back to the form with ?err=.
 * Change the two constants below to route leads elsewhere.
 */
define('BITSY_MAIL_TO', 'info@bitsydisplays.com');
define('BITSY_MAIL_CC', '');
define('BITSY_PHONE', '+91 99303 73731');
define('BITSY_WHATSAPP', 'https://wa.me/919821157155');
require_once __DIR__ . '/includes/cms.php';
require_once __DIR__ . '/includes/mailer.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

function bitsy_field($k) {
  $v = isset($_POST[$k]) ? $_POST[$k] : '';
  $v = is_string($v) ? trim($v) : '';
  $v = str_replace(array("\r", "\n", "%0a", "%0d"), ' ', $v);
  return substr($v, 0, 500);
}

$back = bitsy_field('page');
if ($back === '' || !preg_match('/^[a-z0-9\-]+$/', $back)) { $back = 'index'; }
$back .= '.php';

function bitsy_fail($msg, $back) { header('Location: ' . $back . '?err=' . urlencode($msg) . '#quote'); exit; }

/** Simple sliding-window rate limit, keyed by IP, stored outside the web-servable path. */
function bitsy_rate_limited($key, $max, $windowSeconds) {
  $file = __DIR__ . '/data/rate_limits.json';
  $limits = is_file($file) ? json_decode(file_get_contents($file), true) : array();
  if (!is_array($limits)) { $limits = array(); }
  $now = time();
  foreach ($limits as $k => $entry) { if (($now - $entry['start']) > $windowSeconds) { unset($limits[$k]); } }
  if (!isset($limits[$key]) || ($now - $limits[$key]['start']) > $windowSeconds) {
    $limits[$key] = array('count' => 1, 'start' => $now);
    $limited = false;
  } else {
    $limits[$key]['count']++;
    $limited = $limits[$key]['count'] > $max;
  }
  @file_put_contents($file, json_encode($limits), LOCK_EX);
  return $limited;
}

$clientIp = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
if (bitsy_rate_limited($clientIp, 5, 600)) { bitsy_fail('Too many requests. Please try again in a few minutes.', $back); }

if (bitsy_field('company_website') !== '') { header('Location: thank-you.php'); exit; } // honeypot

$name = bitsy_field('name');
$phoneRaw = bitsy_field('phone');
$phone = preg_replace('/[^0-9]/', '', $phoneRaw);
$email = bitsy_field('email');
$offering = bitsy_field('offering');

if ($name === '') { bitsy_fail('Please tell us your name.', $back); }
if (strlen($phone) < 10) { bitsy_fail('Please enter a valid 10 digit mobile number.', $back); }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { bitsy_fail('Please enter a valid work email.', $back); }
if ($offering === '') { bitsy_fail('Please pick the solution you need.', $back); }

$data = array(
  'Name' => $name,
  'Mobile' => $phoneRaw,
  'Email' => $email,
  'Solution' => $offering,
  'Company' => bitsy_field('company'),
  'Role' => bitsy_field('role'),
  'City' => bitsy_field('city'),
  'Industry' => bitsy_field('industry'),
  'Rooms' => bitsy_field('screens'),
  'Timeline' => bitsy_field('timeline'),
  'Budget' => bitsy_field('budget'),
  'Message' => isset($_POST['message']) ? substr(trim($_POST['message']), 0, 2000) : '',
  'Form' => bitsy_field('source'),
  'Page' => $back,
  'IP' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
  'Received' => date('d M Y, H:i') . ' IST'
);

$savedToDb = bitsy_cms_insert_lead($data);

$subject = 'New website lead: ' . $data['Solution'] . ' from ' . $data['Name'];
$lines = array('New lead from the Bitsy AV website', str_repeat('-', 46));
foreach ($data as $k => $v) { if ($v !== '') { $lines[] = str_pad($k . ':', 12) . $v; } }
$lines[] = str_repeat('-', 46);
$lines[] = 'Reply within 24 working hours with layout, spec and indicative budget.';
$body = implode("\n", $lines);

$host = isset($_SERVER['HTTP_HOST']) ? preg_replace('/^www\./', '', $_SERVER['HTTP_HOST']) : 'bitsyav.com';
bitsy_send_mail(BITSY_MAIL_TO, $subject, $body, 'no-reply@' . $host, 'Bitsy AV Website', $data['Email'], $data['Name'], BITSY_MAIL_CC !== '' ? BITSY_MAIL_CC : null);

$ack  = 'Hi ' . $data['Name'] . ",\n\n";
$ack .= 'Thanks for your enquiry about ' . $data['Solution'] . ".\n";
$ack .= "A Certified Technology Specialist will get back to you within 24 working hours with a layout, a spec sheet and an honest indicative budget.\n\n";
$ack .= 'Need it sooner? Call ' . BITSY_PHONE . ' or WhatsApp us: ' . BITSY_WHATSAPP . "\n\n";
$ack .= "Team Bitsy AV\nBitsy Infotech Pvt Ltd";
bitsy_send_mail($data['Email'], 'We have your request, Bitsy AV', $ack, BITSY_MAIL_TO, 'Bitsy AV');

// leads.csv is a fallback for when the database is unreachable, not a permanent duplicate store.
if (!$savedToDb) {
  $csv = __DIR__ . '/leads.csv';
  if (!file_exists($csv)) { @file_put_contents($csv, implode(',', array_keys($data)) . "\n"); }
  $row = array();
  foreach ($data as $v) {
    // Prefix values that Excel/Sheets would interpret as a formula, to prevent CSV injection.
    if (is_string($v) && $v !== '' && strpos('=+-@', $v[0]) !== false) { $v = "'" . $v; }
    $row[] = '"' . str_replace('"', '""', $v) . '"';
  }
  @file_put_contents($csv, implode(',', $row) . "\n", FILE_APPEND | LOCK_EX);
}

header('Location: thank-you.php?s=' . urlencode($data['Solution']));
exit;
