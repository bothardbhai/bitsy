<?php
require __DIR__ . '/bootstrap.php';
if (bitsy_admin_logged_in()) { header('Location: index.php'); exit; }
$error = '';
$setup = !bitsy_admin_ready();
$lockedFor = $setup ? false : bitsy_admin_login_locked();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $lockedFor !== false) {
  $error = 'Too many failed attempts. Try again in ' . ceil($lockedFor / 60) . ' minute(s).';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $setup) {
  $name = trim(isset($_POST['name']) ? $_POST['name'] : '');
  $username = trim(isset($_POST['username']) ? $_POST['username'] : '');
  $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
  if ($name === '' || $username === '') {
    $error = 'Name and username are required.';
  } elseif (!preg_match('/^[A-Za-z0-9._-]{3,60}$/', $username)) {
    $error = 'Username must be 3-60 characters (letters, numbers, . _ -).';
  } elseif (strlen($password) < 10) {
    $error = 'Use at least 10 characters for the first admin password.';
  } else {
    bitsy_cms_save_user(null, array('name' => $name, 'username' => $username, 'email' => '', 'password' => $password, 'role' => 'admin'));
    $user = bitsy_cms_user_by_username($username);
    $_SESSION['bitsy_admin_user_id'] = $user['id'];
    $_SESSION['bitsy_admin_role'] = $user['role'];
    session_regenerate_id(true);
    header('Location: index.php'); exit;
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim(isset($_POST['username']) ? $_POST['username'] : '');
  $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
  $user = $username !== '' ? bitsy_cms_user_by_username($username) : null;
  if ($user && password_verify($password, $user['password_hash'])) {
    bitsy_admin_clear_login_attempts();
    session_regenerate_id(true);
    $_SESSION['bitsy_admin_user_id'] = $user['id'];
    $_SESSION['bitsy_admin_role'] = $user['role'];
    bitsy_cms_touch_user_login($user['id']);
    header('Location: index.php'); exit;
  } else {
    bitsy_admin_record_failed_login();
    $error = 'Incorrect username or password.';
  }
}
?><!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title><?php echo $setup ? 'Set up' : 'Sign in'; ?> | Bitsy Admin</title><link rel="stylesheet" href="assets/admin.css"></head><body class="admin-auth"><main class="auth-card"><p class="eyebrow">BITSY AV / ADMIN</p><h1><?php echo $setup ? 'Create your admin login' : 'Welcome back'; ?></h1><p class="muted"><?php echo $setup ? 'This one-time setup protects your content and lead dashboard.' : 'Sign in to manage page SEO and website enquiries.'; ?></p><?php if ($error): ?><p class="alert error"><?php echo bitsy_admin_escape($error); ?></p><?php endif; ?><form method="post">
<?php if ($setup): ?>
<label for="name">Your name</label>
<input id="name" name="name" type="text" required autofocus value="<?php echo bitsy_admin_escape(isset($_POST['name']) ? $_POST['name'] : ''); ?>">
<label for="username">Username</label>
<input id="username" name="username" type="text" required pattern="[A-Za-z0-9._\-]{3,60}" value="<?php echo bitsy_admin_escape(isset($_POST['username']) ? $_POST['username'] : ''); ?>">
<label for="password">Admin password</label>
<input id="password" name="password" type="password" minlength="10" required>
<button class="button primary" type="submit">Create secure login</button>
<?php else: ?>
<label for="username">Username</label>
<input id="username" name="username" type="text" required autofocus value="<?php echo bitsy_admin_escape(isset($_POST['username']) ? $_POST['username'] : ''); ?>">
<label for="password">Password</label>
<input id="password" name="password" type="password" required>
<button class="button primary" type="submit">Sign in</button>
<?php endif; ?>
</form></main></body></html>
