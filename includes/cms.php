<?php
function bitsy_db() {
  static $db = false;
  if ($db !== false) { return $db; }
  $configFile = dirname(__DIR__) . '/config/database.php';
  if (!is_file($configFile) || !class_exists('PDO')) { $db = null; return $db; }
  $config = require $configFile;
  try {
    $dsn = 'mysql:host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['database'] . ';charset=' . $config['charset'];
    $db = new PDO($dsn, $config['username'], $config['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false));
  } catch (Exception $exception) { $db = null; }
  return $db;
}

function bitsy_cms_page($slug) {
  $db = bitsy_db();
  if (!$db) { return null; }
  $query = $db->prepare("SELECT * FROM pages WHERE slug = :slug AND status = 'published' LIMIT 1");
  $query->execute(array(':slug' => $slug));
  return $query->fetch() ?: null;
}

function bitsy_cms_update_page_content($slug, $heading, $intro) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $query = $db->prepare('UPDATE pages SET heading = :heading, intro = :intro, updated_at = NOW() WHERE slug = :slug');
  return $query->execute(array(':slug' => $slug, ':heading' => $heading, ':intro' => $intro));
}

function bitsy_cms_update_page_meta($slug, $title, $description) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $query = $db->prepare('UPDATE pages SET title = :title, meta_description = :description, og_title = :og_title, og_description = :og_description, updated_at = NOW() WHERE slug = :slug');
  return $query->execute(array(':slug' => $slug, ':title' => $title, ':description' => $description, ':og_title' => $title, ':og_description' => $description));
}

function bitsy_cms_insert_lead($data) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $query = $db->prepare('INSERT INTO leads (name, mobile, email, solution, company, role, city, industry, rooms, timeline, budget, message, form_source, page_slug, ip_address, notes, created_at) VALUES (:name, :mobile, :email, :solution, :company, :role, :city, :industry, :rooms, :timeline, :budget, :message, :form_source, :page_slug, :ip_address, :notes, NOW())');
  return $query->execute(array(':name' => $data['Name'], ':mobile' => $data['Mobile'], ':email' => $data['Email'], ':solution' => $data['Solution'], ':company' => $data['Company'], ':role' => $data['Role'], ':city' => $data['City'], ':industry' => $data['Industry'], ':rooms' => $data['Rooms'], ':timeline' => $data['Timeline'], ':budget' => $data['Budget'], ':message' => $data['Message'], ':form_source' => $data['Form'], ':page_slug' => $data['Page'], ':ip_address' => $data['IP'], ':notes' => ''));
}

function bitsy_cms_apply_page($html, $slug) {
  $page = bitsy_cms_page($slug);
  if (!$page) { return $html; }
  $title = htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8');
  $description = htmlspecialchars($page['meta_description'], ENT_QUOTES, 'UTF-8');
  $heading = htmlspecialchars($page['heading'], ENT_QUOTES, 'UTF-8');
  $intro = htmlspecialchars($page['intro'], ENT_QUOTES, 'UTF-8');
  $html = preg_replace('/<title>.*?<\/title>/is', '<title>' . $title . '</title>', $html, 1);
  $html = preg_replace('/(<meta\s+name=["\']description["\']\s+content=["\']).*?(["\'])/is', '${1}' . $description . '${2}', $html, 1);
  $html = preg_replace('/(<meta\s+property=["\']og:title["\']\s+content=["\']).*?(["\'])/is', '${1}' . $title . '${2}', $html, 1);
  $html = preg_replace('/(<meta\s+property=["\']og:description["\']\s+content=["\']).*?(["\'])/is', '${1}' . $description . '${2}', $html, 1);
  $html = preg_replace('/(<h1\b[^>]*>).*?(<\/h1>)/is', '${1}' . $heading . '${2}', $html, 1);
  return preg_replace('/(<p\b[^>]*class=["\'][^"\']*\blede\b[^"\']*["\'][^>]*>).*?(<\/p>)/is', '${1}' . $intro . '${2}', $html, 1);
}

/* ── Post helpers ─────────────────────────────────────────────────── */

function bitsy_cms_posts($status = null) {
  $db = bitsy_db();
  if (!$db) { return []; }
  $select = "SELECT posts.*, categories.name AS category, categories.slug AS category_slug FROM posts LEFT JOIN categories ON categories.id = posts.category_id";
  if ($status) {
    $q = $db->prepare($select . " WHERE posts.status = :status ORDER BY posts.created_at DESC");
    $q->execute(array(':status' => $status));
  } else {
    $q = $db->query($select . " ORDER BY posts.created_at DESC");
  }
  return $q->fetchAll();
}

/** One page of posts, newest first. $page is 1-based. */
function bitsy_cms_posts_page($status, $page, $perPage) {
  $db = bitsy_db();
  if (!$db) { return []; }
  $page = max(1, (int) $page);
  $perPage = max(1, (int) $perPage);
  $offset = ($page - 1) * $perPage;
  $select = "SELECT posts.*, categories.name AS category, categories.slug AS category_slug FROM posts LEFT JOIN categories ON categories.id = posts.category_id";
  if ($status) {
    $q = $db->prepare($select . " WHERE posts.status = :status ORDER BY posts.created_at DESC LIMIT :limit OFFSET :offset");
    $q->bindValue(':status', $status);
  } else {
    $q = $db->prepare($select . " ORDER BY posts.created_at DESC LIMIT :limit OFFSET :offset");
  }
  $q->bindValue(':limit', $perPage, PDO::PARAM_INT);
  $q->bindValue(':offset', $offset, PDO::PARAM_INT);
  $q->execute();
  return $q->fetchAll();
}

function bitsy_cms_posts_count($status = null) {
  $db = bitsy_db();
  if (!$db) { return 0; }
  if ($status) {
    $q = $db->prepare("SELECT COUNT(*) FROM posts WHERE status = :status");
    $q->execute(array(':status' => $status));
    return (int) $q->fetchColumn();
  }
  return (int) $db->query("SELECT COUNT(*) FROM posts")->fetchColumn();
}

function bitsy_cms_post($slug) {
  $db = bitsy_db();
  if (!$db) { return null; }
  $q = $db->prepare("SELECT posts.*, categories.name AS category, categories.slug AS category_slug FROM posts LEFT JOIN categories ON categories.id = posts.category_id WHERE posts.slug = :slug AND posts.status = 'published' LIMIT 1");
  $q->execute(array(':slug' => $slug));
  return $q->fetch() ?: null;
}

/* ── Category helpers ────────────────────────────────────────────── */

function bitsy_cms_categories() {
  $db = bitsy_db();
  if (!$db) { return []; }
  return $db->query("SELECT * FROM categories ORDER BY name")->fetchAll();
}

function bitsy_cms_published_categories() {
  $db = bitsy_db();
  if (!$db) { return []; }
  $sql = "SELECT categories.*, COUNT(posts.id) AS post_count FROM categories
          JOIN posts ON posts.category_id = categories.id AND posts.status = 'published'
          GROUP BY categories.id HAVING post_count > 0 ORDER BY categories.name";
  return $db->query($sql)->fetchAll();
}

function bitsy_cms_category($slug) {
  $db = bitsy_db();
  if (!$db) { return null; }
  $q = $db->prepare("SELECT * FROM categories WHERE slug = :slug LIMIT 1");
  $q->execute(array(':slug' => $slug));
  return $q->fetch() ?: null;
}

function bitsy_cms_posts_by_category($categoryId, $status = 'published') {
  $db = bitsy_db();
  if (!$db) { return []; }
  $q = $db->prepare("SELECT posts.*, categories.name AS category, categories.slug AS category_slug FROM posts LEFT JOIN categories ON categories.id = posts.category_id WHERE posts.category_id = :category_id AND posts.status = :status ORDER BY posts.published_at DESC");
  $q->execute(array(':category_id' => $categoryId, ':status' => $status));
  return $q->fetchAll();
}

/** One page of posts within a category, newest first. $page is 1-based. */
function bitsy_cms_posts_by_category_page($categoryId, $status, $page, $perPage) {
  $db = bitsy_db();
  if (!$db) { return []; }
  $page = max(1, (int) $page);
  $perPage = max(1, (int) $perPage);
  $offset = ($page - 1) * $perPage;
  $q = $db->prepare("SELECT posts.*, categories.name AS category, categories.slug AS category_slug FROM posts LEFT JOIN categories ON categories.id = posts.category_id WHERE posts.category_id = :category_id AND posts.status = :status ORDER BY posts.published_at DESC LIMIT :limit OFFSET :offset");
  $q->bindValue(':category_id', $categoryId);
  $q->bindValue(':status', $status);
  $q->bindValue(':limit', $perPage, PDO::PARAM_INT);
  $q->bindValue(':offset', $offset, PDO::PARAM_INT);
  $q->execute();
  return $q->fetchAll();
}

function bitsy_cms_posts_count_by_category($categoryId, $status = 'published') {
  $db = bitsy_db();
  if (!$db) { return 0; }
  $q = $db->prepare("SELECT COUNT(*) FROM posts WHERE category_id = :category_id AND status = :status");
  $q->execute(array(':category_id' => $categoryId, ':status' => $status));
  return (int) $q->fetchColumn();
}

function bitsy_cms_save_category($id, $name, $slug) {
  $db = bitsy_db();
  if (!$db) { return false; }
  if ($id) {
    $q = $db->prepare("UPDATE categories SET name = :name, slug = :slug WHERE id = :id");
    return $q->execute(array(':id' => $id, ':name' => $name, ':slug' => $slug));
  }
  $q = $db->prepare("INSERT INTO categories (name, slug) VALUES (:name, :slug)");
  return $q->execute(array(':name' => $name, ':slug' => $slug));
}

function bitsy_cms_delete_category($id) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $q = $db->prepare("DELETE FROM categories WHERE id = :id");
  return $q->execute(array(':id' => $id));
}

/* ── Users ── */

function bitsy_cms_users() {
  $db = bitsy_db();
  if (!$db) { return array(); }
  return $db->query("SELECT id, name, username, email, role, last_login_at, created_at FROM users ORDER BY name")->fetchAll();
}

function bitsy_cms_user($id) {
  $db = bitsy_db();
  if (!$db) { return null; }
  $q = $db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
  $q->execute(array(':id' => $id));
  return $q->fetch() ?: null;
}

function bitsy_cms_user_by_username($username) {
  $db = bitsy_db();
  if (!$db) { return null; }
  $q = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
  $q->execute(array(':username' => $username));
  return $q->fetch() ?: null;
}

function bitsy_cms_users_count() {
  $db = bitsy_db();
  if (!$db) { return 0; }
  return (int) $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
}

function bitsy_cms_admin_count($excludeId = null) {
  $db = bitsy_db();
  if (!$db) { return 0; }
  if ($excludeId) {
    $q = $db->prepare("SELECT COUNT(*) FROM users WHERE role = 'admin' AND id != :id");
    $q->execute(array(':id' => $excludeId));
    return (int) $q->fetchColumn();
  }
  return (int) $db->query("SELECT COUNT(*) FROM users WHERE role = 'admin'")->fetchColumn();
}

/** Create ($id = null) or update a user. $data['password'] is optional on
 *  update — when blank, the existing password_hash is kept. */
function bitsy_cms_save_user($id, $data) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $email = trim($data['email']) !== '' ? trim($data['email']) : null;
  if ($id) {
    if (!empty($data['password'])) {
      $q = $db->prepare("UPDATE users SET name = :name, username = :username, email = :email, password_hash = :hash, role = :role, updated_at = NOW() WHERE id = :id");
      return $q->execute(array(':id' => $id, ':name' => $data['name'], ':username' => $data['username'], ':email' => $email, ':hash' => password_hash($data['password'], PASSWORD_DEFAULT), ':role' => $data['role']));
    }
    $q = $db->prepare("UPDATE users SET name = :name, username = :username, email = :email, role = :role, updated_at = NOW() WHERE id = :id");
    return $q->execute(array(':id' => $id, ':name' => $data['name'], ':username' => $data['username'], ':email' => $email, ':role' => $data['role']));
  }
  $q = $db->prepare("INSERT INTO users (name, username, email, password_hash, role) VALUES (:name, :username, :email, :hash, :role)");
  return $q->execute(array(':name' => $data['name'], ':username' => $data['username'], ':email' => $email, ':hash' => password_hash($data['password'], PASSWORD_DEFAULT), ':role' => $data['role']));
}

function bitsy_cms_delete_user($id) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $q = $db->prepare("DELETE FROM users WHERE id = :id");
  return $q->execute(array(':id' => $id));
}

function bitsy_cms_touch_user_login($id) {
  $db = bitsy_db();
  if (!$db) { return; }
  $q = $db->prepare("UPDATE users SET last_login_at = NOW() WHERE id = :id");
  $q->execute(array(':id' => $id));
}

function bitsy_cms_get_post($id) {
  $db = bitsy_db();
  if (!$db) { return null; }
  $q = $db->prepare("SELECT * FROM posts WHERE id = :id LIMIT 1");
  $q->execute(array(':id' => $id));
  return $q->fetch() ?: null;
}

function bitsy_cms_save_post($id, $data) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $categoryId = !empty($data['category_id']) ? (int) $data['category_id'] : null;
  if ($id) {
    $q = $db->prepare("UPDATE posts SET slug = :slug, status = :status, title = :title, category_id = :category_id, excerpt = :excerpt, content = :content, meta_description = :meta, featured_image = :image, published_at = :published, updated_at = NOW() WHERE id = :id");
    return $q->execute(array(':id' => $id, ':slug' => $data['slug'], ':status' => $data['status'], ':title' => $data['title'], ':category_id' => $categoryId, ':excerpt' => $data['excerpt'], ':content' => $data['content'], ':meta' => $data['meta_description'], ':image' => $data['featured_image'], ':published' => $data['published_at'] ?: null));
  } else {
    $q = $db->prepare("INSERT INTO posts (slug, status, title, category_id, excerpt, content, meta_description, featured_image, author_id, published_at, created_at) VALUES (:slug, :status, :title, :category_id, :excerpt, :content, :meta, :image, :author, :published, NOW())");
    return $q->execute(array(':slug' => $data['slug'], ':status' => $data['status'], ':title' => $data['title'], ':category_id' => $categoryId, ':excerpt' => $data['excerpt'], ':content' => $data['content'], ':meta' => $data['meta_description'], ':image' => $data['featured_image'], ':author' => isset($_SESSION['bitsy_admin_user_id']) ? $_SESSION['bitsy_admin_user_id'] : null, ':published' => $data['published_at'] ?: null));
  }
}

function bitsy_cms_delete_post($id) {
  $db = bitsy_db();
  if (!$db) { return false; }
  $q = $db->prepare("DELETE FROM posts WHERE id = :id");
  return $q->execute(array(':id' => $id));
}

function bitsy_cms_snippets($location, $slug) {
  $db = bitsy_db();
  if (!$db) { return ''; }
  try {
    $q = $db->prepare("SELECT content, content_type, page_scope, page_slugs FROM code_snippets WHERE enabled = 1 AND location = :loc ORDER BY priority ASC, created_at ASC");
    $q->execute(array(':loc' => $location));
    $rows = $q->fetchAll();
  } catch (Exception $e) { return ''; }
  $out = '';
  foreach ($rows as $row) {
    $scope = $row['page_scope'];
    $slugs = array_map('trim', explode(',', $row['page_slugs']));
    if ($scope === 'home' && $slug !== 'index') { continue; }
    if ($scope === 'specific' && !in_array($slug, $slugs)) { continue; }
    if ($scope === 'exclude_home' && $slug === 'index') { continue; }
    switch ($row['content_type']) {
      case 'js': $out .= '<script>' . "\n" . $row['content'] . "\n" . '</script>' . "\n"; break;
      case 'css': $out .= '<style>' . "\n" . $row['content'] . "\n" . '</style>' . "\n"; break;
      case 'php':
        if (preg_match('/<\?php|<\?=/', $row['content'])) {
          $out .= $row['content'] . "\n";
        } else {
          $out .= '<?php ' . $row['content'] . ' ?>' . "\n";
        }
        break;
      default: $out .= $row['content'] . "\n"; break;
    }
  }
  return $out;
}