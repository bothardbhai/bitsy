<?php
require dirname(__DIR__) . '/includes/cms.php';
$db = bitsy_db();
if (!$db) { exit("Database connection unavailable. Create config/database.php first.\n"); }
$root = dirname(__DIR__);
$files = glob($root . '/*.php');
$insert = $db->prepare('INSERT INTO pages (slug, template, status, title, meta_description, og_title, og_description, heading, intro, body, published_at) VALUES (:slug, :template, "published", :title, :description, :og_title, :og_description, :heading, :intro, :body, NOW()) ON DUPLICATE KEY UPDATE template = VALUES(template), title = VALUES(title), meta_description = VALUES(meta_description), og_title = VALUES(og_title), og_description = VALUES(og_description), heading = VALUES(heading), intro = VALUES(intro), body = VALUES(body)');
$count = 0;
foreach ($files as $file) {
  $slug = basename($file, '.php');
  if (in_array($slug, array('submit', 'thank-you'), true)) { continue; }
  $html = file_get_contents($file);
  preg_match('/<title>(.*?)<\/title>/is', $html, $title);
  preg_match('/<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']/is', $html, $description);
  preg_match('/<h1\b[^>]*>(.*?)<\/h1>/is', $html, $heading);
  preg_match('/<p\b[^>]*class=["\'][^"\']*\blede\b[^"\']*["\'][^>]*>(.*?)<\/p>/is', $html, $intro);
  $pageTitle = isset($title[1]) ? trim(html_entity_decode($title[1], ENT_QUOTES, 'UTF-8')) : '';
  $pageDescription = isset($description[1]) ? trim(html_entity_decode($description[1], ENT_QUOTES, 'UTF-8')) : '';
  $insert->execute(array(':slug' => $slug, ':template' => $slug . '.php', ':title' => $pageTitle, ':description' => $pageDescription, ':og_title' => $pageTitle, ':og_description' => $pageDescription, ':heading' => isset($heading[1]) ? trim(strip_tags($heading[1])) : '', ':intro' => isset($intro[1]) ? trim(strip_tags($intro[1])) : '', ':body' => $html));
  $count++;
}
echo "Imported {$count} pages.\n";

$csv = $root . '/leads.csv';
if (is_readable($csv)) {
  $handle = fopen($csv, 'r');
  $headers = fgetcsv($handle, null, ',', '"', '\\');
  $leadInsert = $db->prepare('INSERT INTO leads (name, mobile, email, solution, company, role, city, industry, rooms, timeline, budget, message, form_source, page_slug, ip_address, created_at) VALUES (:name, :mobile, :email, :solution, :company, :role, :city, :industry, :rooms, :timeline, :budget, :message, :form_source, :page_slug, :ip_address, :created_at)');
  $leadCount = 0;
  while (($row = fgetcsv($handle, null, ',', '"', '\\')) !== false) {
    if (!$headers || count(array_filter($row, 'strlen')) === 0) { continue; }
    $lead = array_combine($headers, array_pad($row, count($headers), ''));
    $leadInsert->execute(array(':name' => $lead['Name'], ':mobile' => $lead['Mobile'], ':email' => $lead['Email'], ':solution' => $lead['Solution'], ':company' => $lead['Company'], ':role' => $lead['Role'], ':city' => $lead['City'], ':industry' => $lead['Industry'], ':rooms' => $lead['Rooms'], ':timeline' => $lead['Timeline'], ':budget' => $lead['Budget'], ':message' => $lead['Message'], ':form_source' => $lead['Form'], ':page_slug' => $lead['Page'], ':ip_address' => $lead['IP'], ':created_at' => date('Y-m-d H:i:s', strtotime($lead['Received']))));
    $leadCount++;
  }
  fclose($handle);
  echo "Imported {$leadCount} leads.\n";
}