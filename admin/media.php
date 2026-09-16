<?php
require __DIR__ . '/bootstrap.php';
bitsy_admin_require_login();
$navCounts = bitsy_admin_new_counts();
$message = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!bitsy_admin_check_csrf(isset($_POST['csrf']) ? $_POST['csrf'] : '')) {
    http_response_code(403);
    exit('Invalid request.');
  }
  if (isset($_POST['delete'])) {
    $message = bitsy_admin_delete_media($_POST['delete']) ? 'Image deleted.' : '';
    if ($message === '') {
      $error = 'The image could not be deleted.';
    }
  } elseif (isset($_FILES['image'])) {
    $result = bitsy_admin_upload_media($_FILES['image']);
    if ($result === true) {
      $message = 'File uploaded.';
    } else {
      $error = $result;
    }
  }
}
$media = bitsy_admin_media();
?><!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Media | Bitsy Admin</title>
  <link rel="stylesheet" href="assets/admin.css">
  <link rel="stylesheet" href="assets/media.css">
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
            <b><?php echo $navCounts['posts']; ?></b><?php endif; ?></a><a
          href="categories.php"><span></span>Categories<?php if ($navCounts['categories'] > 0): ?>
            <b><?php echo $navCounts['categories']; ?></b><?php endif; ?></a><a href="media.php"
          class="active"><span></span>Media <b><?php echo count($media); ?></b></a><a
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
          <p class="eyebrow">CONTENT / MEDIA</p>
          <h1>Media library</h1>
        </div><a class="avatar" href="logout.php">A</a>
      </header>
      <main class="admin-main">
        <div class="page-toolbar">
          <div>
            <p class="muted">Upload images and videos for pages, posts, galleries and future content blocks.</p><small
              class="media-note">JPG, PNG, GIF or WebP images (max 10 MB) - MP4, WebM, OGG or MOV videos (max 50
              MB)</small>
          </div>
          <form class="upload-form" method="post" enctype="multipart/form-data"><input type="hidden" name="csrf"
              value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>"><label
              class="button primary upload-button">Choose file<input type="file" name="image"
                accept="image/jpeg,image/png,image/gif,image/webp,video/mp4,video/webm,video/ogg,video/quicktime"
                required onchange="this.form.submit()"></label></form>
        </div><?php if ($message): ?>
          <p class="alert success"><?php echo bitsy_admin_escape($message); ?></p><?php endif; ?><?php if ($error): ?>
          <p class="alert error"><?php echo bitsy_admin_escape($error); ?></p><?php endif; ?>
        <section class="panel">
          <div class="table-tools"><strong>All media <span
                class="muted"><?php echo count($media); ?></span></strong><span class="table-note">Click an item to
              preview it. Referenced assets cannot be deleted.</span></div><?php if (!$media): ?>
            <div class="empty-content"><span class="empty-mark">M</span>
              <h2>Your media library is empty</h2>
              <p>Upload your first image or video to use it in future page and post editors.</p>
            </div><?php else: ?>
            <div class="media-grid"><?php foreach ($media as $item): ?>
                <article class="media-card"><a class="media-preview" href="<?php echo bitsy_admin_escape($item['url']); ?>"
                    target="_blank" rel="noopener"><?php if ($item['type'] === 'video'): ?><video
                        src="<?php echo bitsy_admin_escape($item['url']); ?>" preload="metadata"
                        muted></video><?php else: ?><img src="<?php echo bitsy_admin_escape($item['url']); ?>" alt=""
                        loading="lazy"><?php endif; ?></a>
                  <div class="media-card-body"><strong
                      title="<?php echo bitsy_admin_escape($item['filename']); ?>"><?php echo bitsy_admin_escape($item['filename']); ?></strong><small><?php echo number_format($item['size'] / 1024, 1); ?>
                      KB</small><code><?php echo bitsy_admin_escape($item['path']); ?></code><?php if ($item['deletable']): ?>
                      <form method="post" onsubmit="return confirm('Delete this image?');"><input type="hidden" name="csrf"
                          value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>"><button class="delete-link"
                          type="submit" name="delete"
                          value="<?php echo bitsy_admin_escape($item['filename']); ?>">Delete</button></form>
                    <?php else: ?><span
                        class="protected-label"><?php echo !empty($item['in_use']) ? 'In use' : 'Bundled asset'; ?></span><?php endif; ?>
                  </div>
                </article><?php endforeach; ?>
            </div><?php endif; ?>
        </section>
      </main>
    </div>
  </div>
</body>

</html>