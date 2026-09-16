<?php
require __DIR__ . '/bootstrap.php';
bitsy_admin_require_login();
bitsy_admin_mark_seen('pages');
$navCounts = bitsy_admin_new_counts();
$message = '';
$error = '';
$addPageError = '';
if (isset($_GET['saved'])) {
  $message = 'Page content and SEO details saved.';
}
if (isset($_GET['added'])) {
  $message = 'Page registered. You can now edit its SEO details below.';
}
if (isset($_GET['deleted'])) {
  $message = 'Page unregistered. The PHP file was not touched.';
}

/** Add Page: validates a slug typed by the admin, confirms the matching
 *  .php file already exists directly under the project root (never inside a
 *  subfolder, never via ../), and rejects it otherwise. Returns the safe
 *  slug on success or null (with $error set) on failure. */
function bitsy_admin_validate_new_page_slug($raw, &$error)
{
  $slug = trim((string) $raw);
  if ($slug === '') {
    $error = 'Please enter a page slug.';
    return null;
  }
  if (substr($slug, -4) === '.php') {
    $slug = substr($slug, 0, -4);
  }
  if (!preg_match('/^[a-z0-9]+(-[a-z0-9]+)*$/', $slug)) {
    $error = 'Please enter a valid page slug using lowercase letters, numbers and hyphens only (e.g. test, about-us).';
    return null;
  }
  if ($slug === 'submit' || $slug === 'thank-you') {
    $error = 'This slug is reserved and cannot be registered.';
    return null;
  }
  $file = BITSY_ROOT . '/' . $slug . '.php';
  $realFile = realpath($file);
  $realRoot = realpath(BITSY_ROOT);
  if ($realFile === false || $realRoot === false || strpos($realFile, $realRoot . DIRECTORY_SEPARATOR) !== 0) {
    $error = 'Page file ' . $slug . '.php was not found in the project root.';
    return null;
  }
  if (!is_file($realFile)) {
    $error = 'Page file ' . $slug . '.php was not found in the project root.';
    return null;
  }
  if (bitsy_cms_page_exists($slug)) {
    $error = 'A page with this slug is already registered.';
    return null;
  }
  return $slug;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!bitsy_admin_check_csrf(isset($_POST['csrf']) ? $_POST['csrf'] : '')) {
    http_response_code(403);
    exit('Invalid request.');
  }
  if (isset($_POST['add_page'])) {
    $newSlug = bitsy_admin_validate_new_page_slug(isset($_POST['new_slug']) ? $_POST['new_slug'] : '', $addPageError);
    if ($newSlug !== null) {
      if (bitsy_cms_register_page($newSlug, $newSlug . '.php')) {
        header('Location: pages.php?added=1');
        exit;
      }
      $addPageError = 'The page could not be registered. Please try again.';
    }
  } elseif (isset($_POST['delete_slug'])) {
    $delSlug = preg_replace('/[^a-z0-9\-]/', '', (string) $_POST['delete_slug']);
    if ($delSlug !== '' && bitsy_cms_delete_page($delSlug)) {
      header('Location: pages.php?deleted=1');
      exit;
    }
    $error = 'The page could not be unregistered.';
  } else {
    // Saving SEO/status only ever touches the pages DB row by slug, so this
    // keeps working even if the page's PHP template file has been deleted.
    $slug = preg_replace('/[^a-z0-9\-]/', '', isset($_POST['slug']) ? (string) $_POST['slug'] : '');
    if ($slug === '' || !bitsy_cms_page_exists($slug)) {
      $error = 'The page could not be updated.';
    } else {
      $metaSaved = bitsy_cms_update_page_meta($slug, isset($_POST['title']) ? $_POST['title'] : '', isset($_POST['description']) ? $_POST['description'] : '');
      $contentSaved = bitsy_cms_update_page_content($slug, isset($_POST['heading']) ? $_POST['heading'] : '', isset($_POST['intro']) ? $_POST['intro'] : '');
      $statusSaved = bitsy_cms_update_page_status($slug, isset($_POST['status']) ? $_POST['status'] : 'published');
      if ($metaSaved && $contentSaved && $statusSaved) {
        header('Location: pages.php?saved=1');
        exit;
      } else {
        $error = 'The page could not be updated.';
      }
    }
  }
}
$pages = bitsy_admin_pages();
foreach ($pages as &$page) {
  $content = bitsy_admin_page_content($page['file']);
  if (!isset($page['heading']) || $page['heading'] === '') {
    $page['heading'] = $content['heading'];
  }
  if (!isset($page['intro']) || $page['intro'] === '') {
    $page['intro'] = $content['intro'];
  }
}
unset($page);
?><!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Pages | Bitsy Admin</title>
  <link rel="stylesheet" href="assets/admin.css">
  <style>
    #add-page {
      display: none
    }

    #add-page:target {
      display: block
    }

    .status-select {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid var(--line);
      border-radius: 6px;
      font: 14px/1.5 Arial, sans-serif;
      background: #fff
    }
  </style>
</head>

<body>
  <div class="admin-shell">
    <aside class="sidebar"><a class="brand" href="index.php"><img class="brand-mark"
          src="../assets/img/bitsy-favicon.png" alt="Bitsy AV"><span>Bitsy <small>Admin</small></span></a>
      <p class="nav-label">Workspace</p>
      <nav class="side-nav"><a href="index.php"><span></span>Dashboard</a><a class="active"
          href="pages.php"><span></span>Pages</a><a
          href="posts.php"><span></span>Posts<?php if ($navCounts['posts'] > 0): ?>
            <b><?php echo $navCounts['posts']; ?></b><?php endif; ?></a><a
          href="categories.php"><span></span>Categories<?php if ($navCounts['categories'] > 0): ?>
            <b><?php echo $navCounts['categories']; ?></b><?php endif; ?></a><a href="media.php"><span></span>Media</a><a
          href="leads.php"><span></span>Enquiries</a></nav>
      <p class="nav-label">System</p>
      <nav class="side-nav"><a href="../" target="_blank"><span></span>View
          website</a><?php if (bitsy_admin_is_admin()): ?><a href="snippets.php"><span></span>Code Snippets</a><a
            href="users.php"><span></span>Users</a><?php endif; ?><a href="logout.php"><span></span>Sign out</a></nav>
    </aside>
    <div class="admin-content">
      <header class="topbar">
        <div>
          <p class="eyebrow">CONTENT / PAGES</p>
          <h1>Pages</h1>
        </div><a class="avatar" href="logout.php">A</a>
      </header>
      <main class="admin-main">
        <div class="page-toolbar">
          <p class="muted">Edit the main page message and search preview for each live page.</p>
          <div style="display:flex;gap:10px"><a class="button secondary" href="#add-page">+ Add Page</a><a
              class="button primary" href="../index.php" target="_blank">View website -&gt;</a></div>
        </div><?php if ($message): ?>
          <p class="alert success"><?php echo bitsy_admin_escape($message); ?></p><?php endif; ?><?php if ($error): ?>
          <p class="alert error"><?php echo bitsy_admin_escape($error); ?></p><?php endif; ?>
        <section class="panel" id="add-page" style="padding:24px 26px;margin-bottom:20px">
          <h2 style="margin:0 0 6px;font-size:17px">Add Page</h2>
          <p class="muted" style="margin:0 0 16px">Enter the slug of an existing PHP page. Example: test</p>
          <?php if ($addPageError): ?>
            <p class="alert error"><?php echo bitsy_admin_escape($addPageError); ?></p><?php endif; ?>
          <form method="post" action="pages.php#add-page"><input type="hidden" name="csrf"
              value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>"><input type="hidden" name="add_page"
              value="1"><label>Page slug<input name="new_slug" placeholder="e.g. test"
                value="<?php echo bitsy_admin_escape(isset($_POST['new_slug']) ? $_POST['new_slug'] : ''); ?>"
                maxlength="160" required></label>
            <div class="edit-actions"><a href="#" class="close-editor">Close</a><button class="button primary"
                type="submit">Add Page</button></div>
          </form>
        </section>
        <section class="panel page-table">
          <div class="table-tools"><strong>All pages <span
                class="muted"><?php echo count($pages); ?></span></strong><span class="table-note">Edits publish
              directly to the PHP page</span></div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Page</th>
                  <th>Status</th>
                  <th>Page content</th>
                  <th>SEO</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody><?php foreach ($pages as $page): ?>
                  <tr id="<?php echo bitsy_admin_escape($page['slug']); ?>">
                    <td>
                      <div class="page-cell"><span class="file-icon">P</span>
                        <div>
                          <strong><?php echo bitsy_admin_escape(ucwords(str_replace('-', ' ', $page['slug']))); ?></strong><small>/<?php echo bitsy_admin_escape($page['slug']); ?>.php</small>
                        </div>
                      </div>
                    </td>
                    <td><span
                        class="status <?php echo $page['status'] === 'published' ? 'published' : 'draft'; ?>"><?php echo bitsy_admin_escape(ucfirst($page['status'])); ?></span><?php if (empty($page['file_exists'])): ?><br><small
                          style="color:#a33;font-weight:700">File missing</small><?php endif; ?></td>
                    <td class="truncate">
                      <?php echo bitsy_admin_escape($page['heading']); ?><small><?php echo bitsy_admin_escape($page['intro']); ?></small>
                    </td>
                    <td><span
                        class="status <?php echo ($page['title'] && $page['description']) ? 'published' : 'draft'; ?>"><?php echo ($page['title'] && $page['description']) ? 'SEO ready' : 'Needs SEO'; ?></span>
                    </td>
                    <td style="white-space:nowrap"><a class="button secondary" style="padding:5px 10px;font-size:12px"
                        href="#edit-<?php echo bitsy_admin_escape($page['slug']); ?>">Edit</a>
                      <form method="post" class="inline-form" style="display:inline"
                        onsubmit="return confirm('Unregister this page? The PHP file will NOT be deleted.');"><input
                          type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>"><input
                          type="hidden" name="delete_slug"
                          value="<?php echo bitsy_admin_escape($page['slug']); ?>"><button class="button" type="submit"
                          style="padding:7px 10px;font-size:12px;background:#fde8e8;color:#a33">Delete</button></form>
                    </td>
                  </tr>
                  <tr class="edit-row" id="edit-<?php echo bitsy_admin_escape($page['slug']); ?>">
                    <td colspan="5">
                      <form method="post" class="seo-form content-editor"><input type="hidden" name="csrf"
                          value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>"><input type="hidden" name="slug"
                          value="<?php echo bitsy_admin_escape($page['slug']); ?>"><?php if (empty($page['file_exists'])): ?>
                          <p class="alert error" style="margin:0 0 14px">Template file is missing.</p>
                        <?php endif; ?><label>Main heading<input name="heading"
                            value="<?php echo bitsy_admin_escape($page['heading']); ?>" maxlength="240"
                            required></label><label>Intro paragraph<textarea name="intro" rows="3" maxlength="600"
                            required><?php echo bitsy_admin_escape($page['intro']); ?></textarea></label><label>SEO
                          title<input name="title" value="<?php echo bitsy_admin_escape($page['title']); ?>"
                            maxlength="160" required></label><label>Meta description<textarea name="description" rows="3"
                            maxlength="320"
                            required><?php echo bitsy_admin_escape($page['description']); ?></textarea></label><label>Status<select
                            name="status" class="status-select">
                            <option value="published" <?php echo $page['status'] === 'published' ? ' selected' : ''; ?>>
                              Published</option>
                            <option value="draft" <?php echo $page['status'] === 'draft' ? ' selected' : ''; ?>>Draft
                            </option>
                            <option value="private" <?php echo $page['status'] === 'private' ? ' selected' : ''; ?>>Private
                            </option>
                          </select></label>
                        <div class="edit-actions"><a href="#<?php echo bitsy_admin_escape($page['slug']); ?>"
                            class="close-editor">Close</a><a
                            href="../<?php echo bitsy_admin_escape($page['slug']); ?>.php" target="_blank">Preview
                            -&gt;</a><button class="button primary" type="submit">Save page</button></div>
                      </form>
                    </td>
                  </tr><?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </div>
</body>

</html>