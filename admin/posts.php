<?php
require __DIR__ . '/bootstrap.php';
bitsy_admin_require_login();
bitsy_admin_mark_seen('posts');
$navCounts = bitsy_admin_new_counts();
require_once __DIR__ . '/../includes/cms.php';

/* ── helpers ── */
function slugify($text) {
  $text = preg_replace('/[^A-Za-z0-9]+/', '-', strtolower(trim($text)));
  return trim($text, '-');
}

$message = '';
$error = '';
$edit = null;

/* ── delete / toggle ── */
if (isset($_GET['delete'])) {
  if (!bitsy_admin_check_csrf(isset($_GET['csrf']) ? $_GET['csrf'] : '')) { http_response_code(403); exit('Invalid request.'); }
  $id = (int) $_GET['delete'];
  if (bitsy_cms_delete_post($id)) { header('Location: posts.php?deleted=1'); exit; } else { $error = 'Could not delete this post.'; }
}
if (isset($_GET['toggle'])) {
  if (!bitsy_admin_check_csrf(isset($_GET['csrf']) ? $_GET['csrf'] : '')) { http_response_code(403); exit('Invalid request.'); }
  $id = (int) $_GET['toggle'];
  $row = bitsy_cms_get_post($id);
  if ($row) {
    $newStatus = $row['status'] === 'published' ? 'draft' : 'published';
    bitsy_cms_save_post($id, array(
      'slug' => $row['slug'], 'status' => $newStatus, 'title' => $row['title'], 'category_id' => $row['category_id'],
      'excerpt' => $row['excerpt'], 'content' => $row['content'],
      'meta_description' => $row['meta_description'], 'featured_image' => $row['featured_image'],
      'published_at' => $newStatus === 'published' ? ($row['published_at'] ?: date('Y-m-d H:i:s')) : null,
    ));
    header('Location: posts.php?saved=1'); exit;
  }
}

/* ── edit load ── */
if (isset($_GET['edit'])) {
  $edit = bitsy_cms_get_post((int) $_GET['edit']);
  if (!$edit) { $error = 'Post not found.'; }
}

/* ── save (create / update) ── */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!bitsy_admin_check_csrf(isset($_POST['csrf']) ? $_POST['csrf'] : '')) { http_response_code(403); exit('Invalid request.'); }
  $postId = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
  $title = trim(isset($_POST['title']) ? $_POST['title'] : '');
  $slug = trim(isset($_POST['slug']) ? $_POST['slug'] : '');
  if ($slug === '' && $title !== '') { $slug = slugify($title); }
  $slug = slugify($slug);
  $data = array(
    'slug' => $slug,
    'status' => in_array(isset($_POST['status']) ? $_POST['status'] : 'draft', array('draft', 'published', 'private')) ? $_POST['status'] : 'draft',
    'title' => $title,
    'category_id' => isset($_POST['category_id']) ? (int) $_POST['category_id'] : 0,
    'excerpt' => trim(isset($_POST['excerpt']) ? $_POST['excerpt'] : ''),
    'content' => trim(isset($_POST['content']) ? $_POST['content'] : ''),
    'meta_description' => trim(isset($_POST['meta_description']) ? $_POST['meta_description'] : ''),
    'featured_image' => trim(isset($_POST['featured_image']) ? $_POST['featured_image'] : ''),
    'published_at' => trim(isset($_POST['published_at']) ? $_POST['published_at'] : ''),
  );
  if ($title === '' || $slug === '') {
    $error = 'Title and slug are required.';
    $edit = array_merge(array('id' => $postId), $data);
  } else {
    /* Check slug uniqueness */
    $db = bitsy_db();
    $check = $db->prepare("SELECT id FROM posts WHERE slug = :slug AND id != :id LIMIT 1");
    $check->execute(array(':slug' => $slug, ':id' => $postId));
    if ($check->fetch()) {
      $error = 'A post with this slug already exists.';
      $edit = array_merge(array('id' => $postId), $data);
    } else {
      if ($postId) {
        bitsy_cms_save_post($postId, $data);
      } else {
        bitsy_cms_save_post(0, $data);
      }
      header('Location: posts.php?saved=1'); exit;
    }
  }
}

if (isset($_GET['saved'])) { $message = 'Post saved.'; }
if (isset($_GET['deleted'])) { $message = 'Post deleted.'; }

$posts = bitsy_cms_posts();
$categories = bitsy_cms_categories();
$isEditing = $edit !== null && !empty($edit['id']);
$isCreating = isset($_GET['new']) || $isEditing || $error !== '' && $_SERVER['REQUEST_METHOD'] === 'POST';
?><!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Posts | Bitsy Admin</title><link rel="stylesheet" href="assets/admin.css"><link rel="stylesheet" href="assets/snippets.css"><style>
.post-form{max-width:760px}
.post-form label{display:block;font-weight:700;font-size:13px;margin:14px 0 6px}
.post-form input[type="text"],.post-form textarea,.post-form select{width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif;background:#fff}
.post-form textarea{min-height:120px;resize:vertical}
.post-form .content-area{min-height:220px;font-family:monospace;font-size:13px}
.post-form .row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.post-table td{vertical-align:top}
.post-excerpt{max-width:320px;color:var(--muted);font-size:13px;line-height:1.4;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.status-badge{display:inline-block;padding:2px 8px;border-radius:10px;font-size:11px;font-weight:800;letter-spacing:.04em;text-transform:uppercase}
.status-badge.published{background:#e6f4ea;color:#1a7f37}
.status-badge.draft{background:#fce8d0;color:#8a5a12}
.status-badge.private{background:#e8e8f0;color:#5a5a7a}
</style></head><body><div class="admin-shell"><aside class="sidebar"><a class="brand" href="index.php"><img class="brand-mark" src="../assets/img/bitsy-favicon.png" alt="Bitsy AV"><span>Bitsy <small>Admin</small></span></a><p class="nav-label">Workspace</p><nav class="side-nav"><a href="index.php"><span></span>Dashboard</a><a href="pages.php"><span></span>Pages<?php if ($navCounts['pages'] > 0): ?> <b><?php echo $navCounts['pages']; ?></b><?php endif; ?></a><a class="active" href="posts.php"><span></span>Posts</a><a href="categories.php"><span></span>Categories<?php if ($navCounts['categories'] > 0): ?> <b><?php echo $navCounts['categories']; ?></b><?php endif; ?></a><a href="media.php"><span></span>Media</a><a href="leads.php"><span></span>Enquiries<?php if ($navCounts['leads'] > 0): ?> <b><?php echo $navCounts['leads']; ?></b><?php endif; ?></a></nav><p class="nav-label">System</p><nav class="side-nav"><a href="../" target="_blank"><span></span>View website</a><?php if (bitsy_admin_is_admin()): ?><a href="snippets.php"><span></span>Code Snippets</a><a href="users.php"><span></span>Users</a><?php endif; ?><a href="logout.php"><span></span>Sign out</a></nav></aside><div class="admin-content"><header class="topbar"><div><p class="eyebrow">CONTENT / POSTS</p><h1>Posts</h1></div><a class="avatar" href="logout.php">A</a></header><main class="admin-main"><div class="page-toolbar"><p class="muted">Articles and buyer guides published on the blog.</p>
<?php if (!$isCreating): ?><a class="button primary" href="posts.php?new=1">+ New post</a><?php else: ?><a class="button secondary" href="posts.php">Cancel</a><?php endif; ?>
</div>

<?php if ($message): ?><p class="alert success"><?php echo bitsy_admin_escape($message); ?></p><?php endif; ?>
<?php if ($error): ?><p class="alert error"><?php echo bitsy_admin_escape($error); ?></p><?php endif; ?>

<?php if ($isCreating): ?>
<section class="panel" style="padding:28px 30px">
<h2 style="margin:0 0 6px;font-size:18px"><?php echo $isEditing ? 'Edit post' : 'New post'; ?></h2>
<p class="muted" style="margin:0 0 20px"><?php echo $isEditing ? 'Update the fields below and save.' : 'Fill in the fields and publish when ready.'; ?></p>
<form method="post" class="post-form">
<input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
<input type="hidden" name="post_id" value="<?php echo isset($edit['id']) ? (int) $edit['id'] : 0; ?>">
<label for="p-title">Title *</label>
<input type="text" id="p-title" name="title" value="<?php echo bitsy_admin_escape(isset($edit['title']) ? $edit['title'] : ''); ?>" required placeholder="How to size a video wall for your room"><div class="row"><div><label for="p-category">Category</label><select id="p-category" name="category_id"><option value="">No category</option><?php foreach ($categories as $cat): ?><option value="<?php echo (int) $cat['id']; ?>"<?php echo (isset($edit['category_id']) && (int) $edit['category_id'] === (int) $cat['id']) ? ' selected' : ''; ?>><?php echo bitsy_admin_escape($cat['name']); ?></option><?php endforeach; ?></select><small><a href="categories.php">Manage categories</a></small></div><div><label for="p-slug">Slug</label>
<input type="text" id="p-slug" name="slug" value="<?php echo bitsy_admin_escape(isset($edit['slug']) ? $edit['slug'] : ''); ?>" placeholder="how-to-size-video-wall (auto-generated from title)"></div></div>
<p class="muted" style="margin:4px 0 0;font-size:12px">URL will be <code>post.php?slug=your-slug</code>. Leave blank to auto-generate.</p>
<div class="row">
<div><label for="p-status">Status</label><select id="p-status" name="status"><option value="draft"<?php echo (isset($edit['status']) && $edit['status']==='draft')?' selected':''; ?>>Draft</option><option value="published"<?php echo (isset($edit['status']) && $edit['status']==='published')?' selected':''; ?>>Published</option><option value="private"<?php echo (isset($edit['status']) && $edit['status']==='private')?' selected':''; ?>>Private</option></select></div>
<div><label for="p-published">Published at</label><input type="text" id="p-published" name="published_at" value="<?php echo bitsy_admin_escape(isset($edit['published_at']) ? $edit['published_at'] : ''); ?>" placeholder="2024-06-15 10:00:00"></div>
</div>
<label for="p-excerpt">Excerpt</label>
<textarea id="p-excerpt" name="excerpt" placeholder="Short description shown on the blog listing card."><?php echo bitsy_admin_escape(isset($edit['excerpt']) ? $edit['excerpt'] : ''); ?></textarea>
<label for="p-content">Content (HTML)</label>
<textarea id="p-content" name="content" class="content-area" placeholder="Full article body — HTML is supported."><?php echo bitsy_admin_escape(isset($edit['content']) ? $edit['content'] : ''); ?></textarea>
<label for="p-meta">Meta description (SEO)</label>
<input type="text" id="p-meta" name="meta_description" value="<?php echo bitsy_admin_escape(isset($edit['meta_description']) ? $edit['meta_description'] : ''); ?>" placeholder="Short sentence for search engine results.">
<label for="p-image">Featured image path</label>
<input type="text" id="p-image" name="featured_image" value="<?php echo bitsy_admin_escape(isset($edit['featured_image']) ? $edit['featured_image'] : ''); ?>" placeholder="assets/img/Audio-video-solution.webp">
<div style="margin-top:20px;display:flex;gap:10px">
<button class="button primary" type="submit"><?php echo $isEditing ? 'Save post' : 'Create post'; ?></button>
<a class="button secondary" href="posts.php">Cancel</a>
</div>
</form>
</section>
<?php endif; ?>

<section class="panel page-table"><div class="table-tools"><strong>All posts <span class="muted"><?php echo count($posts); ?></span></strong><span class="table-note"><?php echo count(array_filter($posts, function($p){ return $p['status']==='published'; })); ?> published</span></div>
<?php if (empty($posts)): ?>
<div style="padding:32px;text-align:center;color:var(--muted)">No posts yet. Create the first one above.</div>
<?php else: ?>
<div class="table-wrap"><table class="post-table"><thead><tr><th>Title</th><th>Category</th><th>Status</th><th>Slug</th><th>Published</th><th>Actions</th></tr></thead><tbody>
<?php foreach ($posts as $post): ?>
<tr>
<td><strong><?php echo bitsy_admin_escape($post['title']); ?></strong><div class="post-excerpt"><?php echo bitsy_admin_escape(mb_strimwidth($post['excerpt'], 0, 80, '…')); ?></div></td>
<td style="font-size:13px;color:var(--muted)"><?php echo $post['category'] ? bitsy_admin_escape($post['category']) : '—'; ?></td>
<td><span class="status-badge <?php echo bitsy_admin_escape($post['status']); ?>"><?php echo bitsy_admin_escape($post['status']); ?></span></td>
<td><code style="font-size:12px"><?php echo bitsy_admin_escape($post['slug']); ?></code></td>
<td style="font-size:13px;color:var(--muted)"><?php echo $post['published_at'] ? bitsy_admin_escape(date('j M Y', strtotime($post['published_at']))) : '—'; ?></td>
<td style="white-space:nowrap">
<a class="button secondary" style="padding:5px 10px;font-size:12px" href="posts.php?edit=<?php echo (int) $post['id']; ?>">Edit</a>
<a class="button secondary" style="padding:5px 10px;font-size:12px" href="posts.php?toggle=<?php echo (int) $post['id']; ?>&csrf=<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>"><?php echo $post['status']==='published' ? 'Unpublish' : 'Publish'; ?></a>
<a class="button" style="padding:5px 10px;font-size:12px;background:#fde8e8;color:#a33" href="posts.php?delete=<?php echo (int) $post['id']; ?>&csrf=<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>" onclick="return confirm('Delete this post permanently?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</tbody></table></div>
<?php endif; ?>
</section>

</main></div></div></body></html>
