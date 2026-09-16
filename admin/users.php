<?php
require __DIR__ . '/bootstrap.php';
bitsy_admin_require_login();
bitsy_admin_require_role('admin');
$navCounts = bitsy_admin_new_counts();

$currentUser = bitsy_admin_current_user();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!bitsy_admin_check_csrf(isset($_POST['csrf']) ? $_POST['csrf'] : '')) {
    http_response_code(403);
    exit('Invalid request.');
  }
  if (isset($_POST['delete'])) {
    $deleteId = (int) $_POST['delete'];
    $target = bitsy_cms_user($deleteId);
    if ($deleteId === (int) $currentUser['id']) {
      $error = 'You cannot delete your own account while signed in.';
    } elseif ($target && $target['role'] === 'admin' && bitsy_cms_admin_count($deleteId) < 1) {
      $error = 'At least one admin account must remain.';
    } else {
      bitsy_cms_delete_user($deleteId);
      header('Location: users.php?msg=2');
      exit;
    }
  } elseif (isset($_POST['save'])) {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $name = trim(isset($_POST['name']) ? $_POST['name'] : '');
    $username = trim(isset($_POST['username']) ? $_POST['username'] : '');
    $email = trim(isset($_POST['email']) ? $_POST['email'] : '');
    $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
    $role = in_array($_POST['role'], array('admin', 'editor'), true) ? $_POST['role'] : 'editor';

    if ($name === '' || $username === '') {
      $error = 'Name and username are required.';
    } elseif (!preg_match('/^[A-Za-z0-9._-]{3,60}$/', $username)) {
      $error = 'Username must be 3-60 characters (letters, numbers, . _ -).';
    } elseif ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'Enter a valid email address, or leave it blank.';
    } elseif (!$id && strlen($password) < 10) {
      $error = 'Use at least 10 characters for the password.';
    } elseif ($password !== '' && strlen($password) < 10) {
      $error = 'Use at least 10 characters for the new password, or leave it blank to keep the current one.';
    } elseif ($id === (int) $currentUser['id'] && $role !== 'admin') {
      $error = 'You cannot remove your own admin role.';
    } else {
      $db = bitsy_db();
      $check = $db->prepare('SELECT id FROM users WHERE username = :username AND id != :id LIMIT 1');
      $check->execute(array(':username' => $username, ':id' => $id));
      if ($check->fetch()) {
        $error = 'That username is already taken.';
      } elseif ($id && $role !== 'admin' && bitsy_cms_user($id)['role'] === 'admin' && bitsy_cms_admin_count($id) < 1) {
        $error = 'At least one admin account must remain.';
      } else {
        bitsy_cms_save_user($id ?: null, array('name' => $name, 'username' => $username, 'email' => $email, 'password' => $password, 'role' => $role));
        header('Location: users.php?msg=' . ($id ? '3' : '1'));
        exit;
      }
    }
  }
}

if (isset($_GET['msg'])) {
  $codes = array('1' => 'User created.', '2' => 'User deleted.', '3' => 'User updated.');
  $message = isset($codes[$_GET['msg']]) ? $codes[$_GET['msg']] : '';
}

$edit = null;
if (isset($_GET['edit']) && (int) $_GET['edit'] > 0) {
  $edit = bitsy_cms_user((int) $_GET['edit']);
}

$users = bitsy_cms_users();
?><!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Users | Bitsy Admin</title>
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
            <b><?php echo $navCounts['posts']; ?></b><?php endif; ?></a><a
          href="categories.php"><span></span>Categories<?php if ($navCounts['categories'] > 0): ?>
            <b><?php echo $navCounts['categories']; ?></b><?php endif; ?></a><a href="media.php"><span></span>Media</a><a
          href="leads.php"><span></span>Enquiries<?php if ($navCounts['leads'] > 0): ?>
            <b><?php echo $navCounts['leads']; ?></b><?php endif; ?></a></nav>
      <p class="nav-label">System</p>
      <nav class="side-nav"><a href="../" target="_blank"><span></span>View website</a><a
          href="snippets.php"><span></span>Code Snippets</a><a class="active" href="users.php"><span></span>Users
          <b><?php echo count($users); ?></b></a><a href="logout.php"><span></span>Sign out</a></nav>
    </aside>
    <div class="admin-content">
      <header class="topbar">
        <div>
          <p class="eyebrow">SYSTEM / USERS</p>
          <h1>Users</h1>
        </div><a class="avatar" href="logout.php">A</a>
      </header>
      <main class="admin-main">

        <div class="page-toolbar">
          <p class="muted">Admins can manage everything, including other users. Editors can manage pages, posts,
            categories and media, but not users, code snippets, or enquiries.</p>
          <?php if ($edit === null && !isset($_GET['edit'])): ?><a class="button primary" href="users.php?edit=0#form">+
              New user</a><?php endif; ?>
        </div>

        <?php if ($message): ?>
          <p class="alert success"><?php echo bitsy_admin_escape($message); ?></p><?php endif; ?>
        <?php if ($error): ?>
          <p class="alert error"><?php echo bitsy_admin_escape($error); ?></p><?php endif; ?>

        <?php if (isset($_GET['edit'])): ?>
          <section class="panel" style="padding:28px 30px" id="form">
            <h2 style="margin:0 0 6px;font-size:18px"><?php echo $edit ? 'Edit user' : 'New user'; ?></h2>
            <form method="post" style="max-width:520px">
              <input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
              <input type="hidden" name="save" value="1">
              <input type="hidden" name="id" value="<?php echo $edit ? (int) $edit['id'] : 0; ?>">
              <label style="display:block;font-weight:700;font-size:13px;margin:14px 0 6px" for="u-name">Name</label>
              <input
                style="width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif"
                type="text" id="u-name" name="name" value="<?php echo bitsy_admin_escape($edit ? $edit['name'] : ''); ?>"
                required placeholder="Priya Sharma">
              <label style="display:block;font-weight:700;font-size:13px;margin:14px 0 6px"
                for="u-username">Username</label>
              <input
                style="width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif"
                type="text" id="u-username" name="username"
                value="<?php echo bitsy_admin_escape($edit ? $edit['username'] : ''); ?>" required
                pattern="[A-Za-z0-9._\-]{3,60}" placeholder="priya">
              <label style="display:block;font-weight:700;font-size:13px;margin:14px 0 6px" for="u-email">Email <span
                  class="muted">(optional)</span></label>
              <input
                style="width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif"
                type="email" id="u-email" name="email"
                value="<?php echo bitsy_admin_escape($edit ? $edit['email'] : ''); ?>" placeholder="priya@bitsyav.com">
              <label style="display:block;font-weight:700;font-size:13px;margin:14px 0 6px"
                for="u-password"><?php echo $edit ? 'New password' : 'Password'; ?>   <?php if ($edit): ?><span
                    class="muted">(leave blank to keep current)</span><?php endif; ?></label>
              <input
                style="width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif"
                type="password" id="u-password" name="password" minlength="10" <?php echo $edit ? '' : 'required'; ?>
                placeholder="At least 10 characters">
              <label style="display:block;font-weight:700;font-size:13px;margin:14px 0 6px" for="u-role">Role</label>
              <select
                style="width:100%;padding:10px 12px;border:1px solid var(--line);border-radius:6px;font:14px/1.5 Arial,sans-serif"
                id="u-role" name="role" <?php echo ($edit && (int) $edit['id'] === (int) $currentUser['id']) ? 'disabled' : ''; ?>>
                <option value="admin" <?php echo ($edit && $edit['role'] === 'admin') ? 'selected' : ''; ?>>Admin — full
                  access</option>
                <option value="editor" <?php echo (!$edit || $edit['role'] === 'editor') ? 'selected' : ''; ?>>Editor —
                  content only</option>
              </select>
              <?php if ($edit && (int) $edit['id'] === (int) $currentUser['id']): ?><input type="hidden" name="role"
                  value="admin">
                <p class="muted" style="margin:4px 0 0;font-size:12px">You can't change your own role.</p><?php endif; ?>
              <div style="margin-top:20px;display:flex;gap:10px">
                <button class="button primary"
                  type="submit"><?php echo $edit ? 'Save changes' : 'Create user'; ?></button>
                <a class="button secondary" href="users.php">Cancel</a>
              </div>
            </form>
          </section>
        <?php endif; ?>

        <section class="panel page-table">
          <div class="table-tools"><strong>All users <span class="muted"><?php echo count($users); ?></span></strong>
          </div>
          <?php if (empty($users)): ?>
            <div style="padding:32px;text-align:center;color:var(--muted)">No users yet.</div>
          <?php else: ?>
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Last login</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $u): ?>
                    <tr>
                      <td>
                        <strong><?php echo bitsy_admin_escape($u['name']); ?></strong><?php if ((int) $u['id'] === (int) $currentUser['id']): ?>
                          <span class="muted">(you)</span><?php endif; ?></td>
                      <td><code style="font-size:12px"><?php echo bitsy_admin_escape($u['username']); ?></code></td>
                      <td><?php echo bitsy_admin_escape($u['email'] ?: '—'); ?></td>
                      <td><span class="tag <?php echo $u['role'] === 'admin' ? 'tag-accent' : 'tag-neutral'; ?>"
                          style="display:inline-block;padding:2px 10px;border-radius:999px;font-size:11px"><?php echo bitsy_admin_escape(ucfirst($u['role'])); ?></span>
                      </td>
                      <td><?php echo bitsy_admin_escape($u['last_login_at'] ?: 'Never'); ?></td>
                      <td style="white-space:nowrap">
                        <a class="button secondary" style="padding:5px 10px;font-size:12px"
                          href="users.php?edit=<?php echo (int) $u['id']; ?>#form">Edit</a>
                        <form method="post" class="inline-form" style="display:inline"
                          onsubmit="return confirm('Delete this user?');">
                          <input type="hidden" name="csrf" value="<?php echo bitsy_admin_escape(bitsy_admin_csrf()); ?>">
                          <button class="button"
                            style="padding:5px 10px;font-size:12px;background:#fde8e8;color:#a33;border:0;cursor:pointer"
                            type="submit" name="delete" value="<?php echo (int) $u['id']; ?>" <?php echo ((int) $u['id'] === (int) $currentUser['id']) ? 'disabled' : ''; ?>>Delete</button>
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