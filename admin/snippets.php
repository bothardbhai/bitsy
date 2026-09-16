<?php
require __DIR__ . '/bootstrap.php';
bitsy_admin_require_login();
bitsy_admin_require_role('admin');
$navCounts = bitsy_admin_new_counts();
$pages = bitsy_admin_pages();
$slugs = array_map(function ($p) {
  return $p['slug']; }, $pages);
$pageList = $slugs;
$message = '';
$error = '';

/* ── Handle actions ── */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!bitsy_admin_check_csrf($_POST['csrf'] ?? '')) {
    http_response_code(403);
    exit('Invalid request.');
  }
  if (isset($_POST['toggle'])) {
    bitsy_admin_toggle_snippet($_POST['toggle']);
    header('Location: snippets.php?msg=1');
    exit;
  } elseif (isset($_POST['delete'])) {
    bitsy_admin_delete_snippet($_POST['delete']);
    header('Location: snippets.php?msg=2');
    exit;
  } elseif (isset($_POST['save'])) {
    $ok = bitsy_admin_save_snippet($_POST);
    if ($ok) {
      header('Location: snippets.php?msg=3');
      exit;
    }
    $error = 'Could not save snippet.';
  }
}
if (isset($_GET['msg'])) {
  $codes = array('1' => 'Snippet status updated.', '2' => 'Snippet deleted.', '3' => 'Snippet saved.');
  $message = $codes[$_GET['msg']] ?? '';
}

/* ── Edit mode ── */
$edit = null;
if (isset($_GET['edit'])) {
  $edit = bitsy_admin_snippet((int) $_GET['edit']);
}
$isNew = isset($_GET['new']);

$snippets = bitsy_admin_snippets();
$locations = array('header' => 'Header (inside &lt;head&gt;)', 'footer' => 'Footer (before &lt;/body&gt;)', 'body_open' => 'After &lt;body&gt; tag', 'body_close' => 'Before &lt;/body&gt; tag');
$scopeOptions = array('all' => 'All pages', 'home' => 'Homepage only', 'exclude_home' => 'All pages except homepage', 'specific' => 'Specific pages only');
$typeOptions = array('html' => 'HTML', 'js' => 'JavaScript', 'css' => 'CSS', 'php' => 'PHP');
?><!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title><?php echo ($isNew || $edit) ? 'Edit snippet' : 'Code Snippets'; ?> | Bitsy Admin</title>
  <link rel="stylesheet" href="assets/admin.css">
  <link rel="stylesheet" href="assets/snippets.css">
</head>

<body>
  <div class="admin-shell">
    <aside class="sidebar">
      <a class="brand" href="index.php"><img class="brand-mark" src="../assets/img/bitsy-favicon.png"
          alt="Bitsy AV"><span>Bitsy <small>Admin</small></span></a>
      <p class="nav-label">Workspace</p>
      <nav class="side-nav">
        <a href="index.php"><span></span>Dashboard</a>
        <a href="pages.php"><span></span>Pages<?php if ($navCounts['pages'] > 0): ?>
            <b><?php echo $navCounts['pages']; ?></b><?php endif; ?></a>
        <a href="posts.php"><span></span>Posts<?php if ($navCounts['posts'] > 0): ?>
            <b><?php echo $navCounts['posts']; ?></b><?php endif; ?></a>
        <a href="categories.php"><span></span>Categories<?php if ($navCounts['categories'] > 0): ?>
            <b><?php echo $navCounts['categories']; ?></b><?php endif; ?></a>
        <a href="media.php"><span></span>Media</a>
        <a href="leads.php"><span></span>Enquiries<?php if ($navCounts['leads'] > 0): ?>
            <b><?php echo $navCounts['leads']; ?></b><?php endif; ?></a>
      </nav>
      <p class="nav-label">System</p>
      <nav class="side-nav">
        <a class="active" href="snippets.php"><span></span>Code Snippets <b><?php echo count($snippets); ?></b></a>
        <a href="users.php"><span></span>Users</a>
        <a href="../" target="_blank"><span></span>View website</a>
        <a href="logout.php"><span></span>Sign out</a>
      </nav>
    </aside>

    <div class="admin-content">
      <header class="topbar">
        <div>
          <p class="eyebrow">SYSTEM / CODE SNIPPETS</p>
          <h1><?php echo ($isNew || $edit) ? ($edit ? 'Edit snippet' : 'New snippet') : 'Code Snippets'; ?></h1>
        </div>
        <a class="avatar" href="logout.php">A</a>
      </header>

      <main class="admin-main">
        <?php if ($message): ?>
          <p class="alert success"><?php echo bitsy_admin_escape($message); ?></p><?php endif; ?>
        <?php if ($error): ?>
          <p class="alert error"><?php echo bitsy_admin_escape($error); ?></p><?php endif; ?>

        <?php if ($isNew || $edit): ?>
          <!-- ── Add / Edit Form ── -->
          <div class="page-toolbar">
            <div>
              <p class="muted">
                <?php echo $edit ? 'Editing: ' . bitsy_admin_escape($edit['name']) : 'Create a new code snippet to inject into your pages.'; ?>
              </p>
            </div>
            <a class="button secondary" href="snippets.php">&larr; Back to list</a>
          </div>
          <section class="panel snippet-form">
            <form method="post">
              <input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
              <?php if ($edit): ?><input type="hidden" name="id" value="<?php echo (int) $edit['id']; ?>"><?php endif; ?>
              <input type="hidden" name="save" value="1">

              <div class="form-grid">
                <div class="form-col">
                  <label for="f-name">Snippet name</label>
                  <input id="f-name" name="name" type="text" required
                    placeholder="e.g. Google Analytics, Schema, Chat Widget"
                    value="<?php echo bitsy_admin_escape($edit['name'] ?? ''); ?>">
                </div>
                <div class="form-col">
                  <label for="f-priority">Priority</label>
                  <input id="f-priority" name="priority" type="number" min="1" max="999"
                    value="<?php echo bitsy_admin_escape($edit['priority'] ?? '10'); ?>">
                  <small>Lower numbers load first</small>
                </div>
              </div>

              <div class="form-grid">
                <div class="form-col">
                  <label for="f-location">Injection location</label>
                  <select id="f-location" name="location">
                    <?php foreach ($locations as $val => $label): ?>
                      <option value="<?php echo $val; ?>" <?php echo ($edit['location'] ?? 'header') === $val ? 'selected' : ''; ?>><?php echo $label; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-col">
                  <label for="f-type">Code type</label>
                  <select id="f-type" name="content_type">
                    <?php foreach ($typeOptions as $val => $label): ?>
                      <option value="<?php echo $val; ?>" <?php echo ($edit['content_type'] ?? 'html') === $val ? 'selected' : ''; ?>><?php echo $label; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-grid">
                <div class="form-col">
                  <label for="f-scope">Page scope</label>
                  <select id="f-scope" name="page_scope">
                    <?php foreach ($scopeOptions as $val => $label): ?>
                      <option value="<?php echo $val; ?>" <?php echo ($edit['page_scope'] ?? 'all') === $val ? 'selected' : ''; ?>><?php echo $label; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-col" id="slug-picker"
                  style="<?php echo ($edit['page_scope'] ?? 'all') === 'specific' ? '' : 'display:none'; ?>">
                  <label for="f-slugs">Page slugs (comma-separated)</label>
                  <input id="f-slugs" name="page_slugs" type="text" placeholder="e.g. index, about-us, contact-us"
                    value="<?php echo bitsy_admin_escape($edit['page_slugs'] ?? ''); ?>">
                  <small>Available:
                    <?php echo implode(', ', array_slice($pageList, 0, 10)); ?>  <?php echo count($pageList) > 10 ? '...' : ''; ?></small>
                </div>
              </div>

              <div class="form-row">
                <label class="toggle-label">
                  <input type="checkbox" name="enabled" value="1" <?php echo empty($edit) || !empty($edit['enabled']) ? 'checked' : ''; ?>>
                  <span>Enabled</span>
                </label>
              </div>

              <div class="form-col">
                <label for="f-content">Code</label>
                <textarea id="f-content" name="content" rows="16" required class="code-editor"
                  placeholder="Paste your code here..."><?php echo htmlspecialchars($edit['content'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
              </div>

              <div class="form-actions">
                <a class="button secondary" href="snippets.php">Cancel</a>
                <button class="button primary"
                  type="submit"><?php echo $edit ? 'Save changes' : 'Create snippet'; ?></button>
              </div>
            </form>
          </section>

          <script>
            document.getElementById('f-scope').addEventListener('change', function () {
              document.getElementById('slug-picker').style.display = this.value === 'specific' ? '' : 'none';
            });
          </script>

        <?php else: ?>
          <!-- ── Snippets List ── -->
          <div class="page-toolbar">
            <div>
              <p class="muted">Inject custom HTML, JavaScript, CSS, PHP, or Schema code into any page. Similar to the HFCM
                plugin.</p>
            </div>
            <a class="button primary" href="snippets.php?new=1">+ New snippet</a>
          </div>

          <?php if (empty($snippets)): ?>
            <section class="panel">
              <div class="empty-content">
                <span class="empty-mark">S</span>
                <h2>No code snippets yet</h2>
                <p>Add your first snippet to inject tracking code, schema markup, chat widgets, or any custom code into your
                  pages.</p>
                <a class="button primary" href="snippets.php?new=1">+ Create your first snippet</a>
              </div>
            </section>
          <?php else: ?>
            <section class="panel snippet-table">
              <div class="table-tools">
                <strong>All snippets <span class="muted"><?php echo count($snippets); ?></span></strong>
                <span class="table-note">Sorted by priority (lower first)</span>
              </div>
              <div class="table-wrap">
                <table>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Location</th>
                      <th>Type</th>
                      <th>Scope</th>
                      <th>Priority</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($snippets as $s): ?>
                      <tr class="<?php echo empty($s['enabled']) ? 'row-disabled' : ''; ?>">
                        <td>
                          <div class="page-cell">
                            <span class="file-icon"><?php echo strtoupper(substr($s['content_type'], 0, 1)); ?></span>
                            <div>
                              <strong><?php echo bitsy_admin_escape($s['name']); ?></strong>
                              <small><?php echo bitsy_admin_escape(substr(strip_tags($s['content']), 0, 60)); ?><?php echo strlen(strip_tags($s['content'])) > 60 ? '...' : ''; ?></small>
                            </div>
                          </div>
                        </td>
                        <td><span
                            class="location-badge loc-<?php echo $s['location']; ?>"><?php echo $locations[$s['location']]; ?></span>
                        </td>
                        <td><span
                            class="type-badge type-<?php echo $s['content_type']; ?>"><?php echo strtoupper($s['content_type']); ?></span>
                        </td>
                        <td><?php echo $scopeOptions[$s['page_scope']] ?? $s['page_scope']; ?></td>
                        <td><?php echo (int) $s['priority']; ?></td>
                        <td>
                          <form method="post" class="inline-form">
                            <input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
                            <button type="submit" name="toggle" value="<?php echo (int) $s['id']; ?>"
                              class="status-link <?php echo $s['enabled'] ? 'status-on' : 'status-off'; ?>">
                              <?php echo $s['enabled'] ? 'Active' : 'Disabled'; ?>
                            </button>
                          </form>
                        </td>
                        <td class="actions-cell">
                          <a class="button small" href="snippets.php?edit=<?php echo (int) $s['id']; ?>">Edit</a>
                          <form method="post" class="inline-form" onsubmit="return confirm('Delete this snippet?');">
                            <input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
                            <button class="delete-link" type="submit" name="delete"
                              value="<?php echo (int) $s['id']; ?>">Delete</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </section>
          <?php endif; ?>

        <?php endif; ?>
      </main>
    </div>
  </div>
</body>

</html>