<?php
/**
 * Migration: add per-user "last seen" timestamps for the Pages/Posts/
 * Categories admin sections, so sidebar badges can show a "new since your
 * last visit" count instead of a stale/hardcoded total. Existing users are
 * backfilled to "seen now" so pre-existing content doesn't show as new.
 */
require_once __DIR__ . '/../includes/cms.php';

$db = bitsy_db();
if (!$db) { echo "Error: could not connect to database.\n"; exit(1); }

$columns = array('pages_last_seen_at', 'posts_last_seen_at', 'categories_last_seen_at', 'leads_last_seen_at');

try {
    foreach ($columns as $column) {
        $exists = $db->query("SHOW COLUMNS FROM users LIKE '{$column}'")->fetch();
        if (!$exists) {
            $db->exec("ALTER TABLE users ADD COLUMN {$column} DATETIME NULL");
            $db->exec("UPDATE users SET {$column} = NOW() WHERE {$column} IS NULL");
            echo "users.{$column} added and backfilled to now().\n";
        } else {
            echo "users.{$column} already exists.\n";
        }
    }
    echo "Done.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
