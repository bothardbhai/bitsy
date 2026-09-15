-- Bitsy AV CMS schema for MySQL 8+ / MariaDB 10.6+
-- Run this after creating an empty database and database user.

SET NAMES utf8mb4;
SET time_zone = '+00:00';

CREATE TABLE IF NOT EXISTS users (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(120) NOT NULL,
  username VARCHAR(60) NULL,
  email VARCHAR(190) NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin', 'editor') NOT NULL DEFAULT 'editor',
  last_login_at DATETIME NULL,
  pages_last_seen_at DATETIME NULL,
  posts_last_seen_at DATETIME NULL,
  categories_last_seen_at DATETIME NULL,
  leads_last_seen_at DATETIME NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_users_username (username),
  UNIQUE KEY uq_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS pages (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  slug VARCHAR(160) NOT NULL,
  template VARCHAR(160) NOT NULL,
  status ENUM('draft', 'published', 'private') NOT NULL DEFAULT 'published',
  title VARCHAR(255) NOT NULL,
  meta_description VARCHAR(320) NOT NULL DEFAULT '',
  og_title VARCHAR(255) NOT NULL DEFAULT '',
  og_description VARCHAR(320) NOT NULL DEFAULT '',
  heading VARCHAR(255) NOT NULL DEFAULT '',
  intro TEXT NOT NULL,
  body LONGTEXT NOT NULL,
  published_at DATETIME NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_pages_slug (slug),
  KEY idx_pages_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS page_revisions (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  page_id BIGINT UNSIGNED NOT NULL,
  user_id BIGINT UNSIGNED NULL,
  snapshot JSON NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_revisions_page (page_id),
  CONSTRAINT fk_revisions_page FOREIGN KEY (page_id) REFERENCES pages(id) ON DELETE CASCADE,
  CONSTRAINT fk_revisions_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS categories (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(160) NOT NULL,
  slug VARCHAR(160) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_categories_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS posts (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  slug VARCHAR(160) NOT NULL,
  status ENUM('draft', 'published', 'private') NOT NULL DEFAULT 'draft',
  title VARCHAR(255) NOT NULL,
  category_id BIGINT UNSIGNED NULL,
  excerpt TEXT NOT NULL,
  content LONGTEXT NOT NULL,
  meta_description VARCHAR(320) NOT NULL DEFAULT '',
  featured_image VARCHAR(500) NOT NULL DEFAULT '',
  author_id BIGINT UNSIGNED NULL,
  published_at DATETIME NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_posts_slug (slug),
  KEY idx_posts_status_date (status, published_at),
  CONSTRAINT fk_posts_author FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL,
  CONSTRAINT fk_posts_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS media (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  filename VARCHAR(255) NOT NULL,
  path VARCHAR(500) NOT NULL,
  mime_type VARCHAR(100) NOT NULL,
  alt_text VARCHAR(255) NOT NULL DEFAULT '',
  uploaded_by BIGINT UNSIGNED NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_media_filename (filename),
  CONSTRAINT fk_media_user FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS leads (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(160) NOT NULL,
  mobile VARCHAR(60) NOT NULL,
  email VARCHAR(190) NOT NULL,
  solution VARCHAR(190) NOT NULL,
  company VARCHAR(190) NOT NULL DEFAULT '',
  role VARCHAR(160) NOT NULL DEFAULT '',
  city VARCHAR(120) NOT NULL DEFAULT '',
  industry VARCHAR(160) NOT NULL DEFAULT '',
  rooms VARCHAR(120) NOT NULL DEFAULT '',
  timeline VARCHAR(120) NOT NULL DEFAULT '',
  budget VARCHAR(120) NOT NULL DEFAULT '',
  message TEXT NOT NULL,
  form_source VARCHAR(120) NOT NULL DEFAULT '',
  page_slug VARCHAR(160) NOT NULL DEFAULT '',
  ip_address VARCHAR(45) NOT NULL DEFAULT '',
  status ENUM('new', 'contacted', 'qualified', 'closed', 'spam') NOT NULL DEFAULT 'new',
  notes TEXT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_leads_status_created (status, created_at),
  KEY idx_leads_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS settings (
  setting_key VARCHAR(120) NOT NULL,
  setting_value TEXT NOT NULL,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;