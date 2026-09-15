<?php
/**
 * Migration: turn the single shared admin password (data/admin.json) into a
 * real users table with username/password logins and roles (admin, editor).
 * Adds users.username, relaxes users.email to optional, and — if a legacy
 * data/admin.json exists and no users exist yet — carries its password hash
 * over into a first admin user (username "admin") so the current password
 * keeps working.
 */
require_once __DIR__ . '/../includes/cms.php';

$db = bitsy_db();
if (!$db) {
    echo "Error: could not connect to database.\n";
    exit(1);
}

try {
    $hasUsername = $db->query("SHOW COLUMNS FROM users LIKE 'username'")->fetch();
    if (!$hasUsername) {
        $db->exec("ALTER TABLE users ADD COLUMN username VARCHAR(60) NULL AFTER name");
        echo "users.username added.\n";
    } else {
        echo "users.username already exists.\n";
    }

    $emailColumn = $db->query("SHOW COLUMNS FROM users LIKE 'email'")->fetch();
    if ($emailColumn && stripos($emailColumn['Null'], 'NO') === 0) {
        $db->exec("ALTER TABLE users MODIFY COLUMN email VARCHAR(190) NULL");
        echo "users.email relaxed to optional.\n";
    }

    $hasUsernameIndex = $db->query("SHOW INDEX FROM users WHERE Key_name = 'uq_users_username'")->fetch();
    if (!$hasUsernameIndex) {
        $db->exec("ALTER TABLE users ADD UNIQUE KEY uq_users_username (username)");
        echo "uq_users_username index added.\n";
    }

    $userCount = (int) $db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $legacyConfig = __DIR__ . '/../data/admin.json';
    if ($userCount === 0 && is_file($legacyConfig)) {
        $config = json_decode(file_get_contents($legacyConfig), true);
        if (!empty($config['password_hash'])) {
            $insert = $db->prepare("INSERT INTO users (name, username, email, password_hash, role) VALUES ('Admin', 'admin', NULL, :hash, 'admin')");
            $insert->execute(array(':hash' => $config['password_hash']));
            echo "Created first admin user from data/admin.json — username: admin (existing password kept).\n";
        }
    } elseif ($userCount === 0) {
        echo "No users exist yet. The next visit to admin/login.php will prompt to create the first admin account.\n";
    } else {
        echo "Users already present ({$userCount}); nothing to backfill.\n";
    }

    echo "Done.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
