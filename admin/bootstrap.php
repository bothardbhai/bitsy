<?php
session_start();
require_once dirname(__DIR__) . '/includes/cms.php';
ob_start(function ($html) {
  return str_replace('</head>', '<link rel="stylesheet" href="assets/theme.css"><link rel="stylesheet" href="assets/typography.css"></head>', $html);
});

define('BITSY_ROOT', dirname(__DIR__));
define('BITSY_ADMIN_ATTEMPTS', BITSY_ROOT . '/data/login_attempts.json');
define('BITSY_ADMIN_LOCKOUT_THRESHOLD', 5);
define('BITSY_ADMIN_LOCKOUT_SECONDS', 900);

/** True once at least one user account exists — until then, login.php shows
 *  a one-time "create the first admin" form instead of a login form. */
function bitsy_admin_ready() {
  return bitsy_cms_users_count() > 0;
}

function bitsy_admin_client_ip() {
  return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
}

function bitsy_admin_attempts_load() {
  if (!file_exists(BITSY_ADMIN_ATTEMPTS)) { return array(); }
  $attempts = json_decode(file_get_contents(BITSY_ADMIN_ATTEMPTS), true);
  return is_array($attempts) ? $attempts : array();
}

function bitsy_admin_attempts_save($attempts) {
  file_put_contents(BITSY_ADMIN_ATTEMPTS, json_encode($attempts), LOCK_EX);
}

/** Returns seconds remaining in the lockout, or false if the caller may attempt login. */
function bitsy_admin_login_locked() {
  $ip = bitsy_admin_client_ip();
  $attempts = bitsy_admin_attempts_load();
  if (empty($attempts[$ip])) { return false; }
  $entry = $attempts[$ip];
  $elapsed = time() - $entry['last'];
  if ($entry['count'] >= BITSY_ADMIN_LOCKOUT_THRESHOLD && $elapsed < BITSY_ADMIN_LOCKOUT_SECONDS) {
    return BITSY_ADMIN_LOCKOUT_SECONDS - $elapsed;
  }
  return false;
}

function bitsy_admin_record_failed_login() {
  $ip = bitsy_admin_client_ip();
  $attempts = bitsy_admin_attempts_load();
  $now = time();
  if (empty($attempts[$ip]) || ($now - $attempts[$ip]['last']) > BITSY_ADMIN_LOCKOUT_SECONDS) {
    $attempts[$ip] = array('count' => 1, 'last' => $now);
  } else {
    $attempts[$ip]['count']++;
    $attempts[$ip]['last'] = $now;
  }
  bitsy_admin_attempts_save($attempts);
}

function bitsy_admin_clear_login_attempts() {
  $ip = bitsy_admin_client_ip();
  $attempts = bitsy_admin_attempts_load();
  if (isset($attempts[$ip])) { unset($attempts[$ip]); bitsy_admin_attempts_save($attempts); }
}

function bitsy_admin_logged_in() { return !empty($_SESSION['bitsy_admin_user_id']); }

/** The logged-in user's row (cached per-request), or null. */
function bitsy_admin_current_user() {
  static $user = false;
  if ($user === false) {
    $user = !empty($_SESSION['bitsy_admin_user_id']) ? bitsy_cms_user($_SESSION['bitsy_admin_user_id']) : null;
  }
  return $user;
}

function bitsy_admin_role() {
  if (!empty($_SESSION['bitsy_admin_role'])) { return $_SESSION['bitsy_admin_role']; }
  $user = bitsy_admin_current_user();
  return $user ? $user['role'] : null;
}

function bitsy_admin_is_admin() { return bitsy_admin_role() === 'admin'; }

const BITSY_ADMIN_NAV_SECTIONS = array('pages' => 'pages_last_seen_at', 'posts' => 'posts_last_seen_at', 'categories' => 'categories_last_seen_at', 'leads' => 'leads_last_seen_at');

/** How many pages/posts/categories/leads were created since this admin last
 *  opened that section — used for the sidebar "new since your last visit" badges. */
function bitsy_admin_new_counts() {
  $counts = array('pages' => 0, 'posts' => 0, 'categories' => 0, 'leads' => 0);
  $user = bitsy_admin_current_user();
  $db = bitsy_db();
  if (!$user || !$db) { return $counts; }
  foreach (BITSY_ADMIN_NAV_SECTIONS as $section => $column) {
    if (empty($user[$column])) { continue; }
    $q = $db->prepare("SELECT COUNT(*) FROM {$section} WHERE created_at > :seen");
    $q->execute(array(':seen' => $user[$column]));
    $counts[$section] = (int) $q->fetchColumn();
  }
  return $counts;
}

/** Marks a nav section (pages/posts/categories) as seen right now for the
 *  current admin, clearing its sidebar badge until new items are added. */
function bitsy_admin_mark_seen($section) {
  if (!isset(BITSY_ADMIN_NAV_SECTIONS[$section])) { return; }
  $user = bitsy_admin_current_user();
  $db = bitsy_db();
  if (!$user || !$db) { return; }
  $column = BITSY_ADMIN_NAV_SECTIONS[$section];
  $q = $db->prepare("UPDATE users SET {$column} = NOW() WHERE id = :id");
  $q->execute(array(':id' => $user['id']));
}

/** Call after bitsy_admin_require_login(). Blocks (403) unless the current
 *  user's role is in $roles (a role string or array of roles). */
function bitsy_admin_require_role($roles) {
  $roles = (array) $roles;
  if (!in_array(bitsy_admin_role(), $roles, true)) {
    http_response_code(403);
    exit('You do not have permission to view this page.');
  }
}

function bitsy_admin_csrf() {
  if (empty($_SESSION['bitsy_admin_csrf'])) { $_SESSION['bitsy_admin_csrf'] = bin2hex(random_bytes(16)); }
  return $_SESSION['bitsy_admin_csrf'];
}

function bitsy_admin_check_csrf($token) {
  return is_string($token) && !empty($_SESSION['bitsy_admin_csrf']) && hash_equals($_SESSION['bitsy_admin_csrf'], $token);
}

function bitsy_admin_require_login() {
  if (!bitsy_admin_logged_in()) { header('Location: login.php'); exit; }
  if (!bitsy_admin_current_user()) {
    // The session points at a user account that no longer exists (deleted
    // while they were signed in). Drop the stale session and send them back.
    $_SESSION = array();
    session_destroy();
    header('Location: login.php'); exit;
  }
}

function bitsy_admin_escape($value) { return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'); }

function bitsy_admin_media_dir() { return BITSY_ROOT . '/assets/img/uploads'; }

function bitsy_admin_video_dir() { return BITSY_ROOT . '/assets/video/uploads'; }

function bitsy_admin_is_video($filename) { return (bool) preg_match('/\.(mp4|webm|ogg|mov)$/i', $filename); }

function bitsy_admin_media_in_use($relativePath) {
  foreach (glob(BITSY_ROOT . '/*.{php,html}', GLOB_BRACE) as $file) {
    if (strpos(file_get_contents($file), $relativePath) !== false) { return true; }
  }
  return false;
}

function bitsy_admin_media() {
  $media = array();
  $directory = BITSY_ROOT . '/assets/img';
  if (is_dir($directory)) {
    foreach (glob($directory . '/*') as $file) {
      if (!is_file($file)) { continue; }
      $name = basename($file);
      if (!preg_match('/\.(jpe?g|png|gif|webp)$/i', $name)) { continue; }
      $relative = 'assets/img/' . $name;
      $inUse = bitsy_admin_media_in_use($relative);
      $media[] = array('filename' => $name, 'path' => $relative, 'url' => '../' . $relative, 'size' => filesize($file), 'modified' => filemtime($file), 'deletable' => !$inUse, 'in_use' => $inUse, 'type' => 'image');
    }
  }
  if (is_dir(bitsy_admin_media_dir())) {
    foreach (glob(bitsy_admin_media_dir() . '/*') as $file) {
      if (!is_file($file)) { continue; }
      $name = basename($file);
      if (!preg_match('/\.(jpe?g|png|gif|webp)$/i', $name)) { continue; }
      $relative = 'assets/img/uploads/' . $name;
      $inUse = bitsy_admin_media_in_use($relative);
      $media[] = array('filename' => $name, 'path' => $relative, 'url' => '../' . $relative, 'size' => filesize($file), 'modified' => filemtime($file), 'deletable' => !$inUse, 'in_use' => $inUse, 'type' => 'image');
    }
  }
  if (is_dir(bitsy_admin_video_dir())) {
    foreach (glob(bitsy_admin_video_dir() . '/*') as $file) {
      if (!is_file($file)) { continue; }
      $name = basename($file);
      if (!bitsy_admin_is_video($name)) { continue; }
      $relative = 'assets/video/uploads/' . $name;
      $inUse = bitsy_admin_media_in_use($relative);
      $media[] = array('filename' => $name, 'path' => $relative, 'url' => '../' . $relative, 'size' => filesize($file), 'modified' => filemtime($file), 'deletable' => !$inUse, 'in_use' => $inUse, 'type' => 'video');
    }
  }
  usort($media, function ($a, $b) { return $b['modified'] <=> $a['modified']; });
  return $media;
}

function bitsy_admin_upload_media($upload) {
  if (!isset($upload['error']) || $upload['error'] !== UPLOAD_ERR_OK) { return 'Upload failed. Please choose an image or video file.'; }
  $mime = function_exists('finfo_open') ? finfo_file(finfo_open(FILEINFO_MIME_TYPE), $upload['tmp_name']) : mime_content_type($upload['tmp_name']);
  $imageExtensions = array('image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp');
  $videoExtensions = array('video/mp4' => 'mp4', 'video/webm' => 'webm', 'video/ogg' => 'ogg', 'video/quicktime' => 'mov');
  if (isset($imageExtensions[$mime])) {
    if ($upload['size'] > 10 * 1024 * 1024) { return 'Images must be smaller than 10 MB.'; }
    $dir = bitsy_admin_media_dir();
    $relativeDir = 'assets/img/uploads/';
    $extension = $imageExtensions[$mime];
  } elseif (isset($videoExtensions[$mime])) {
    if ($upload['size'] > 50 * 1024 * 1024) { return 'Videos must be smaller than 50 MB.'; }
    $dir = bitsy_admin_video_dir();
    $relativeDir = 'assets/video/uploads/';
    $extension = $videoExtensions[$mime];
  } else {
    return 'Only JPG, PNG, GIF, WebP images or MP4, WebM, OGG, and MOV videos are allowed.';
  }
  if (!is_dir($dir)) { mkdir($dir, 0750, true); }
  $filename = bin2hex(random_bytes(12)) . '.' . $extension;
  $destination = $dir . '/' . $filename;
  if (!move_uploaded_file($upload['tmp_name'], $destination)) { return 'The server could not save this file.'; }
  $db = bitsy_db();
  if ($db) {
    $query = $db->prepare('INSERT INTO media (filename, path, mime_type, alt_text) VALUES (:filename, :path, :mime_type, :alt_text)');
    $query->execute(array(':filename' => $filename, ':path' => $relativeDir . $filename, ':mime_type' => $mime, ':alt_text' => ''));
  }
  return true;
}

function bitsy_admin_delete_media($filename) {
  $filename = basename((string) $filename);
  if ($filename === '' || $filename !== preg_replace('/[^A-Za-z0-9._-]/', '', $filename)) { return false; }
  if (bitsy_admin_media_in_use('assets/img/uploads/' . $filename) || bitsy_admin_media_in_use('assets/img/' . $filename) || bitsy_admin_media_in_use('assets/video/uploads/' . $filename)) { return false; }
  $file = bitsy_admin_media_dir() . '/' . $filename;
  if (!is_file($file)) { $file = BITSY_ROOT . '/assets/img/' . $filename; }
  if (!is_file($file)) { $file = bitsy_admin_video_dir() . '/' . $filename; }
  if (!is_file($file) || !unlink($file)) { return false; }
  $db = bitsy_db();
  if ($db) {
    $query = $db->prepare('DELETE FROM media WHERE filename = :filename');
    $query->execute(array(':filename' => $filename));
  }
  return true;
}

function bitsy_admin_pages() {
  $db = bitsy_db();
  if ($db) {
    try {
      $rows = $db->query('SELECT slug, template AS file, title, meta_description AS description, heading, intro FROM pages ORDER BY slug')->fetchAll();
      if ($rows) {
        foreach ($rows as &$row) { $row['file'] = BITSY_ROOT . '/' . $row['file']; }
        return $rows;
      }
    } catch (Exception $exception) { /* Use the file fallback until the schema is migrated. */ }
  }
  $pages = array();
  foreach (glob(BITSY_ROOT . '/*.php') as $file) {
    $slug = basename($file, '.php');
    if ($slug === 'submit' || $slug === 'thank-you') { continue; }
    $html = file_get_contents($file);
    preg_match('/<title>(.*?)<\/title>/is', $html, $title);
    preg_match('/<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']/is', $html, $description);
    $pages[] = array('slug' => $slug, 'file' => $file,
      'title' => isset($title[1]) ? trim(html_entity_decode($title[1], ENT_QUOTES, 'UTF-8')) : '',
      'description' => isset($description[1]) ? trim(html_entity_decode($description[1], ENT_QUOTES, 'UTF-8')) : '');
  }
  usort($pages, function ($a, $b) { return strcmp($a['slug'], $b['slug']); });
  return $pages;
}

function bitsy_admin_find_page($slug) {
  $file = BITSY_ROOT . '/' . preg_replace('/[^a-z0-9\-]/', '', $slug) . '.php';
  if (!is_file($file) || basename($file) === 'submit.php') { return null; }
  return $file;
}

function bitsy_admin_page_content($file) {
  $html = file_get_contents($file);
  preg_match('/<h1\b[^>]*>(.*?)<\/h1>/is', $html, $heading);
  preg_match('/<p\b[^>]*class=["\'][^"\']*\blede\b[^"\']*["\'][^>]*>(.*?)<\/p>/is', $html, $intro);
  return array(
    'heading' => isset($heading[1]) ? trim(strip_tags($heading[1])) : '',
    'intro' => isset($intro[1]) ? trim(strip_tags($intro[1])) : ''
  );
}

function bitsy_admin_update_page_content($file, $heading, $intro) {
  $slug = basename($file, '.php');
  if (bitsy_cms_update_page_content($slug, $heading, $intro)) { return true; }
  $html = file_get_contents($file);
  $heading = htmlspecialchars(trim($heading), ENT_QUOTES, 'UTF-8');
  $intro = htmlspecialchars(trim($intro), ENT_QUOTES, 'UTF-8');
  $html = preg_replace_callback('/(<h1\b[^>]*>).*?(<\/h1>)/is', function ($match) use ($heading) { return $match[1] . $heading . $match[2]; }, $html, 1);
  $html = preg_replace_callback('/(<p\b[^>]*class=["\'][^"\']*\blede\b[^"\']*["\'][^>]*>).*?(<\/p>)/is', function ($match) use ($intro) { return $match[1] . $intro . $match[2]; }, $html, 1);
  return file_put_contents($file, $html, LOCK_EX) !== false;
}

function bitsy_admin_update_meta($file, $title, $description) {
  $slug = basename($file, '.php');
  if (bitsy_cms_update_page_meta($slug, $title, $description)) { return true; }
  $html = file_get_contents($file);
  $title = htmlspecialchars(trim($title), ENT_QUOTES, 'UTF-8');
  $description = htmlspecialchars(trim($description), ENT_QUOTES, 'UTF-8');
  $html = preg_replace_callback('/<title>.*?<\/title>/is', function () use ($title) { return '<title>' . $title . '</title>'; }, $html, 1);
  $html = preg_replace_callback('/(<meta\s+name=["\']description["\']\s+content=["\']).*?(["\'])/is', function ($match) use ($description) { return $match[1] . $description . $match[2]; }, $html, 1);
  $html = preg_replace_callback('/(<meta\s+property=["\']og:title["\']\s+content=["\']).*?(["\'])/is', function ($match) use ($title) { return $match[1] . $title . $match[2]; }, $html, 1);
  $html = preg_replace_callback('/(<meta\s+property=["\']og:description["\']\s+content=["\']).*?(["\'])/is', function ($match) use ($description) { return $match[1] . $description . $match[2]; }, $html, 1);
  return file_put_contents($file, $html, LOCK_EX) !== false;
}

/* ── Code Snippets (HFCM) ── */

function bitsy_admin_snippets() {
  $db = bitsy_db();
  if (!$db) { return array(); }
  try {
    return $db->query('SELECT * FROM code_snippets ORDER BY priority ASC, created_at DESC')->fetchAll();
  } catch (Exception $e) { return array(); }
}

function bitsy_admin_snippet($id) {
  $db = bitsy_db();
  if (!$db) { return null; }
  $q = $db->prepare('SELECT * FROM code_snippets WHERE id = :id LIMIT 1');
  $q->execute(array(':id' => (int) $id));
  return $q->fetch() ?: null;
}

function bitsy_admin_save_snippet($data) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $id = isset($data['id']) ? (int) $data['id'] : 0;
  $name = trim($data['name']);
  $content = $data['content'];
  $location = in_array($data['location'], array('header', 'footer', 'body_open', 'body_close')) ? $data['location'] : 'header';
  $pageScope = in_array($data['page_scope'], array('all', 'home', 'specific', 'exclude_home')) ? $data['page_scope'] : 'all';
  $pageSlugs = trim($data['page_slugs']);
  $contentType = in_array($data['content_type'], array('html', 'js', 'css', 'php')) ? $data['content_type'] : 'html';
  $priority = max(1, min(999, (int) ($data['priority'] ?? 10)));
  $enabled = !empty($data['enabled']) ? 1 : 0;
  if ($name === '') { return false; }
  if ($id > 0) {
    $q = $db->prepare('UPDATE code_snippets SET name = :name, content = :content, location = :location, page_scope = :page_scope, page_slugs = :page_slugs, content_type = :content_type, priority = :priority, enabled = :enabled, updated_at = NOW() WHERE id = :id');
    return $q->execute(array(':id' => $id, ':name' => $name, ':content' => $content, ':location' => $location, ':page_scope' => $pageScope, ':page_slugs' => $pageSlugs, ':content_type' => $contentType, ':priority' => $priority, ':enabled' => $enabled));
  }
  $q = $db->prepare('INSERT INTO code_snippets (name, content, location, page_scope, page_slugs, content_type, priority, enabled) VALUES (:name, :content, :location, :page_scope, :page_slugs, :content_type, :priority, :enabled)');
  return $q->execute(array(':name' => $name, ':content' => $content, ':location' => $location, ':page_scope' => $pageScope, ':page_slugs' => $pageSlugs, ':content_type' => $contentType, ':priority' => $priority, ':enabled' => $enabled));
}

function bitsy_admin_delete_snippet($id) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $q = $db->prepare('DELETE FROM code_snippets WHERE id = :id');
  return $q->execute(array(':id' => (int) $id));
}

function bitsy_admin_toggle_snippet($id) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $q = $db->prepare('UPDATE code_snippets SET enabled = NOT enabled, updated_at = NOW() WHERE id = :id');
  return $q->execute(array(':id' => (int) $id));
}

function bitsy_admin_leads() {
  $db = bitsy_db();
  if ($db) {
    try {
      $rows = $db->query('SELECT name AS Name, mobile AS Mobile, email AS Email, solution AS Solution, company AS Company, role AS Role, city AS City, industry AS Industry, rooms AS Rooms, timeline AS Timeline, budget AS Budget, message AS Message, form_source AS Form, page_slug AS Page, ip_address AS IP, DATE_FORMAT(created_at, "%d %b %Y, %H:%i") AS Received FROM leads ORDER BY created_at DESC')->fetchAll();
      return $rows;
    } catch (Exception $exception) { /* Use the CSV fallback until the schema is migrated. */ }
  }
  $file = BITSY_ROOT . '/leads.csv';
  if (!is_file($file) || !is_readable($file)) { return array(); }
  $handle = fopen($file, 'r');
  $headers = fgetcsv($handle, null, ',', '"', '\\');
  if (!$headers) { fclose($handle); return array(); }
  $rows = array();
  while (($row = fgetcsv($handle, null, ',', '"', '\\')) !== false) {
    if (count(array_filter($row, 'strlen')) === 0) { continue; }
    $rows[] = array_combine($headers, array_pad($row, count($headers), ''));
  }
  fclose($handle);
  return array_reverse($rows);
}