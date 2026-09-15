<?php
/**
 * Migration: Add code_snippets table for Header/Footer Code Manager functionality.
 * Supports injecting HTML, JS, CSS, PHP, and Schema into header, footer, before </body>, and after <body>.
 */
require_once __DIR__ . '/../includes/cms.php';

$db = bitsy_db();
if (!$db) {
    echo "Error: Could not connect to database.\n";
    exit(1);
}

$sql = "
CREATE TABLE IF NOT EXISTS code_snippets (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  content LONGTEXT NOT NULL,
  location ENUM('header', 'footer', 'body_open', 'body_close') NOT NULL DEFAULT 'header',
  page_scope ENUM('all', 'home', 'specific', 'exclude_home') NOT NULL DEFAULT 'all',
  page_slugs TEXT NOT NULL,
  content_type ENUM('html', 'js', 'css', 'php') NOT NULL DEFAULT 'html',
  priority INT NOT NULL DEFAULT 10,
  enabled TINYINT(1) NOT NULL DEFAULT 1,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_snippets_location (location),
  KEY idx_snippets_enabled (enabled)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
";

try {
    $db->exec($sql);
    echo "code_snippets table created successfully.\n";

    // Verify
    $stmt = $db->query("SHOW TABLES LIKE 'code_snippets'");
    if ($stmt->fetch()) {
        echo "Verified: code_snippets table exists in bitsy_cms database.\n";
    } else {
        echo "Warning: table may not have been created.\n";
    }
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage() . "\n";
    exit(1);
}
