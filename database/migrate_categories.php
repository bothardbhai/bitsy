<?php
/**
 * Migration: replace the free-text posts.category column with a proper
 * categories table (id, name, slug) and a posts.category_id foreign key.
 * Existing category text values are preserved as categories and linked back.
 */
require_once __DIR__ . '/../includes/cms.php';

$db = bitsy_db();
if (!$db) {
    echo "Error: Could not connect to database.\n";
    exit(1);
}

function bitsy_migrate_slugify($text) {
    $text = preg_replace('/[^A-Za-z0-9]+/', '-', strtolower(trim($text)));
    return trim($text, '-');
}

try {
    $db->exec("
CREATE TABLE IF NOT EXISTS categories (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(160) NOT NULL,
  slug VARCHAR(160) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_categories_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
");
    echo "categories table ready.\n";

    $hasCategoryId = $db->query("SHOW COLUMNS FROM posts LIKE 'category_id'")->fetch();
    if (!$hasCategoryId) {
        $db->exec("ALTER TABLE posts ADD COLUMN category_id BIGINT UNSIGNED NULL AFTER category");
        $db->exec("ALTER TABLE posts ADD CONSTRAINT fk_posts_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL");
        echo "posts.category_id added.\n";
    } else {
        echo "posts.category_id already exists.\n";
    }

    $hasOldColumn = $db->query("SHOW COLUMNS FROM posts LIKE 'category'")->fetch();
    if ($hasOldColumn) {
        $rows = $db->query("SELECT DISTINCT category FROM posts WHERE category IS NOT NULL AND category != ''")->fetchAll(PDO::FETCH_COLUMN);
        $insert = $db->prepare("INSERT INTO categories (name, slug) VALUES (:name, :slug) ON DUPLICATE KEY UPDATE name = VALUES(name)");
        $findBySlug = $db->prepare("SELECT id FROM categories WHERE slug = :slug LIMIT 1");
        $updatePosts = $db->prepare("UPDATE posts SET category_id = :category_id WHERE category = :category");
        $count = 0;
        foreach ($rows as $name) {
            $slug = bitsy_migrate_slugify($name);
            if ($slug === '') { continue; }
            $insert->execute(array(':name' => $name, ':slug' => $slug));
            $findBySlug->execute(array(':slug' => $slug));
            $categoryId = $findBySlug->fetchColumn();
            $updatePosts->execute(array(':category_id' => $categoryId, ':category' => $name));
            $count++;
        }
        echo "Migrated {$count} distinct categories from free text.\n";

        $db->exec("ALTER TABLE posts DROP COLUMN category");
        echo "posts.category (free text) column dropped.\n";
    } else {
        echo "posts.category (free text) column already removed.\n";
    }

    echo "Done.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
