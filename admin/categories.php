<?php
require __DIR__ . '/bootstrap.php';
bitsy_admin_require_login();
bitsy_admin_mark_seen('categories');
$navCounts = bitsy_admin_new_counts();

function bitsy_admin_slugify($text)
{
  $text = preg_replace('/[^A-Za-z0-9]+/', '-', strtolower(trim($text)));
  return trim($text, '-');
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!bitsy_admin_check_csrf(isset($_POST['csrf']) ? $_POST['csrf'] : '')) {
    http_response_code(403);
    exit('Invalid request.');
  }
  if (isset($_POST['delete'])) {
    bitsy_cms_delete_category((int) $_POST['delete']);
    header('Location: categories.php?msg=2');
    exit;
  } elseif (isset($_POST['save'])) {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $name = trim(isset($_POST['name']) ? $_POST['name'] : '');
    $slug = trim(isset($_POST['slug']) ? $_POST['slug'] : '');
    if ($slug === '' && $name !== '') {
      $slug = $name;
    }
    $slug = bitsy_admin_slugify($slug);
    if ($name === '' || $slug === '') {
      $error = 'Name is required.';
    } else {
      $db = bitsy_db();
      $check = $db->prepare('SELECT id FROM categories WHERE slug = :slug AND id != :id LIMIT 1');
      $check->execute(array(':slug' => $slug, ':id' => $id));
      if ($check->fetch()) {
        $error = 'A category with this slug already exists.';
      } else {
        bitsy_cms_save_category($id ?: null, $name, $slug);
        header('Location: categories.php?msg=' . ($id ? '3' : '1'));
        exit;
      }
    }
  }
}
if (isset($_GET['msg'])) {
  $codes = array('1' => 'Category created.', '2' => 'Category deleted.', '3' => 'Category updated.');
  $message = isset($codes[$_GET['msg']]) ? $codes[$_GET['msg']] : '';
}

$edit = isset($_GET['edit']) ? null : null;
if (isset($_GET['edit'])) {
  $editId = (int) $_GET['edit'];
  foreach (bitsy_cms_categories() as $cat) {
    if ((int) $cat['id'] === $editId) {
      $edit = $cat;
      break;
    }
  }
}

$db = bitsy_db();
$categories = array();
if ($db) {
  $rows = $db->query("SELECT categories.*, COUNT(posts.id) AS post_count FROM categories LEFT JOIN posts ON posts.category_id = categories.id GROUP BY categories.id ORDER BY categories.name")->fetchAll();
  $categories = $rows;
}
?><!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Categories | Bitsy Admin</title>
  <link rel="stylesheet" href="assets/admin.css">
  <link rel="stylesheet" href="assets/snippets.css">
</head>

<body>
  <div class="admin-shell">
    <aside class="sidebar"><a class="brand" href="index.php"><img class="brand-mark"
          src="../assets/img/bitsy-favicon.png" alt="Bitsy AV"><span>Bitsy <small>Admin</small></span></a>
      <p class="nav-label">Workspace</p>
      <nav class="side-nav"><a href="index.php"><span></span>Dashboard</a><a
          href="pages.php"><span></span>Pages<?php if ($navCounts['pages'] > 0): ?>
            <b><?php echo $navCounts['pages']; ?></b><?php endif; ?></a><a
          href="posts.php"><span></span>Posts<?php if ($navCounts['posts'] > 0): ?>
            <b><?php echo $navCounts['posts']; ?></b><?php endif; ?></a><a class="active"
          href="categories.php"><span></span>Categories</a><a href="media.php"><span></span>Media</a><a
          href="leads.php"><span></span>Enquiries<?php if ($navCounts['leads'] > 0): ?>
            <b><?php echo $navCounts['leads']; ?></b><?php endif; ?></a></nav>
      <p class="nav-label">System</p>
      <nav class="side-nav"><a href="../" target="_blank"><span></span>View
          website</a><?php if (bitsy_admin_is_admin()): ?><a href="snippets.php"><span></span>Code Snippets</a><a
            href="users.php"><span></span>Users</a><?php endif; ?><a href="logout.php"><span></span>Sign out</a></nav>
    </aside>
    <div class="admin-content">
      <header class="topbar">
        <div>
          <p class="eyebrow">CONTENT / CATEGORIES</p>
          <h1>Categories</h1>
        </div><a class="avatar" href="logout.php">A</a>
      </header>
      <main class="admin-main">

        <div class="page-toolbar">
          <p class="muted">Group blog posts into categories. Each category gets its own archive page and appears in the
            category sitemap.</p><?php if (!$edit): ?><a class="button primary" href="categories.php?edit=0#form">+ New
              category</a><?php endif; ?>
        </div>

        <?php if ($message): ?>
          <p class="alert success"><?php echo bitsy_admin_escape($message); ?></p><?php endif; ?>
        <?php if ($error): ?>
          <p class="alert error"><?php echo bitsy_admin_escape($error); ?></p><?php endif; ?>

        <?php if (isset($_GET['edit'])): ?>
          <section class="panel" style="padding:28px 30px" id="form">
            <h2 style="margin:0 0 6px;font-size:18px"><?php echo $edit ? 'Edit category' : 'New category'; ?></h2>
            <form method="post" style="max-width:520px">
              <input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
              <input type="hidden" name="save" value="1">
              <input type="hidden" name="id" value="<?php echo $edit ? (int) $edit['id'] : 0; ?>">
              <label style="display:block;font-weight:700;font-size:13px;margin:14px 0 6px" for="c-name">Name</label>
              <input
                style="width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif"
                type="text" id="c-name" name="name" value="<?php echo bitsy_admin_escape($edit ? $edit['name'] : ''); ?>"
                required placeholder="LED / LCD Video Wall">
              <label style="display:block;font-weight:700;font-size:13px;margin:14px 0 6px" for="c-slug">Slug</label>
              <input
                style="width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif"
                type="text" id="c-slug" name="slug" value="<?php echo bitsy_admin_escape($edit ? $edit['slug'] : ''); ?>"
                placeholder="led-lcd-video-wall (auto-generated from name)">
              <p class="muted" style="margin:4px 0 0;font-size:12px">Archive URL will be
                <code>/category/your-slug/</code>. Leave blank to auto-generate.</p>
              <div style="margin-top:20px;display:flex;gap:10px">
                <button class="button primary"
                  type="submit"><?php echo $edit ? 'Save changes' : 'Create category'; ?></button>
                <a class="button secondary" href="categories.php">Cancel</a>
              </div>
            </form>
          </section>
        <?php endif; ?>

        <section class="panel page-table">
          <div class="table-tools"><strong>All categories <span
                class="muted"><?php echo count($categories); ?></span></strong></div>
          <?php if (empty($categories)): ?>
            <div style="padding:32px;text-align:center;color:var(--muted)">No categories yet. Create the first one above.
            </div>
          <?php else: ?>
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Posts</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categories as $cat): ?>
                    <tr>
                      <td><strong><?php echo bitsy_admin_escape($cat['name']); ?></strong></td>
                      <td><code style="font-size:12px"><?php echo bitsy_admin_escape($cat['slug']); ?></code></td>
                      <td><?php echo (int) $cat['post_count']; ?></td>
                      <td style="white-space:nowrap">
                        <a class="button secondary" style="padding:5px 10px;font-size:12px"
                          href="categories.php?edit=<?php echo (int) $cat['id']; ?>#form">Edit</a>
                        <a class="button secondary" style="padding:5px 10px;font-size:12px"
                          href="../category/<?php echo bitsy_admin_escape($cat['slug']); ?>/" target="_blank">View</a>
                        <form method="post" class="inline-form" style="display:inline"
                          onsubmit="return confirm('Delete this category? Posts using it will become uncategorized.');">
                          <input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
                          <button class="button"
                            style="padding:5px 10px;font-size:12px;background:#fde8e8;color:#a33;border:0;cursor:pointer"
                            type="submit" name="delete" value="<?php echo (int) $cat['id']; ?>">Delete</button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </section>

      </main>
    </div>
  </div>
</body>

</html>