# Bitsy AV — Full Project Analysis

## 1. Project Overview

**Project:** Bitsy AV website / CMS  
**Identified domain in project:** `bitsyav.com` / `bitsydisplays.com` references appear in source and documentation. Confirm the final production domain before launch.

This is a custom PHP website with a lightweight custom CMS/admin panel backed by MySQL/MariaDB.

### Main characteristics

- Custom PHP frontend
- Custom PHP admin panel
- MySQL/MariaDB database
- PDO database access
- Apache `.htaccess` URL rewriting
- Database-backed users and content
- Database-backed blog posts/categories/leads
- Database-backed page SEO/content overrides
- Filesystem-based media library
- PHP `mail()` for lead notifications/autoresponses
- CSV fallback for leads if the database is unavailable
- CSRF protection in admin forms
- Session-based admin authentication
- Login throttling
- Honeypot and IP-based rate limiting for frontend leads
- Dynamic XML sitemap endpoints
- Code snippet injection system for admin users

---

# 2. Technology Stack

| Technology | Usage |
|---|---|
| PHP | Frontend, backend handlers, admin CMS |
| MySQL / MariaDB | CMS data storage |
| PDO | Database access |
| Apache | Web server assumed by `.htaccess` |
| mod_rewrite | Pretty URLs and `.php` extension handling |
| HTML/CSS/JavaScript | Frontend/admin UI |
| PHP `mail()` | Lead notification and autoresponder |
| JSON files | Login/rate-limit runtime state |
| CSV | Lead fallback storage |
| UTF-8 / utf8mb4 | Database character encoding |

### Version requirements identified

- README: PHP 7.4+
- Database schema: MySQL 8+ or MariaDB 10.6+
- SQL dump was generated from MariaDB 10.4.32

**Production note:** The dump's MariaDB 10.4 version differs from the schema documentation's stated MariaDB 10.6+ requirement. Confirm the target database version before deployment.

---

# 3. Project Structure

The ZIP contains approximately 414 files.

Major PHP files/directories:

```text
bitsy/
├── admin/
│   ├── bootstrap.php
│   ├── categories.php
│   ├── index.php
│   ├── leads.php
│   ├── login.php
│   ├── logout.php
│   ├── media.php
│   ├── pages.php
│   ├── posts.php
│   ├── snippets.php
│   └── users.php
│
├── assets/
│   ├── css/
│   ├── img/
│   ├── js/
│   └── ...
│
├── config/
│   └── database.example.php
│
├── database/
│   ├── import_wordpress_posts.php
│   ├── migrate.php
│   ├── migrate_admin_seen_at.php
│   ├── migrate_categories.php
│   ├── migrate_snippets.php
│   ├── migrate_users.php
│   ├── schema.sql
│   ├── seed_posts.php
│   └── sync_wordpress_seo.php
│
├── includes/
│   ├── cms.php
│   └── site-bootstrap.php
│
├── about-us.php
├── ar-vr-solutions.php
├── audio-video-solutions.php
├── auditorium-av.php
├── bitsy-e-ink-display.php
├── blog.php
├── category.php
├── category-sitemap.php
├── clients.php
├── command-control-centre.php
├── conference-room-av.php
├── contact-us.php
├── digital-menu-boards.php
├── digital-signage.php
├── display-solutions.php
├── gallery.php
├── index.php
├── interactive-touch-kiosk.php
├── it-infrastructure.php
├── led-lcd-video-wall.php
├── our-services.php
├── outdoor-led-display.php
├── post.php
├── post-sitemap.php
├── projections.php
├── studio.php
├── thank-you.php
├── transparent-display.php
├── video-processor.php
├── wayfinding-kiosk.php
├── bitsy-e-ink-display.php
├── submit.php
├── robots.txt
├── sitemap.xml
└── .htaccess
```

The deployment package documentation also says the old `.html` WordPress-exported pages are intentionally not required for production.

---

# 4. Frontend Pages

The project contains the main website pages plus dynamic blog/category/sitemap pages.

## Main static PHP pages

| File | Purpose |
|---|---|
| `index.php` | Homepage |
| `our-services.php` | Services/offerings index |
| `about-us.php` | About / Who We Are |
| `clients.php` | Clients |
| `gallery.php` | Gallery |
| `blog.php` | Blog listing |
| `contact-us.php` | Contact page |
| `thank-you.php` | Form success page |

## Offering/service pages

The project contains individual offering pages including:

- LED/LCD Video Wall
- Projections
- Display Solutions
- Transparent Display
- Auditorium AV
- Conference Room AV
- Audio-Video Solutions
- Digital Menu Boards
- Command & Control Centre
- Studio
- Digital Signage
- AR/VR Solutions
- IT Infrastructure
- Video Processor
- Outdoor LED Display
- Wayfinding Kiosk
- Bitsy E-Ink Display
- Interactive Touch Kiosk

---

# 5. Frontend Architecture

The frontend is mostly made from individual PHP page files containing the page markup.

The common CMS bootstrap is loaded through:

```php
require_once __DIR__ . '/includes/site-bootstrap.php';
```

`site-bootstrap.php` loads `includes/cms.php` and uses an output-buffer callback to dynamically apply database CMS values to the rendered HTML.

The CMS can replace:

- `<title>`
- Meta description
- Open Graph title
- Open Graph description
- First `<h1>`
- First paragraph with the `lede` class

It also injects code snippets configured through the admin panel.

---

# 6. Database Configuration

The expected configuration file is:

```text
bitsy/config/database.php
```

The repository only provides:

```text
bitsy/config/database.example.php
```

Example structure:

```php
return array(
  'host' => '127.0.0.1',
  'port' => 3306,
  'database' => 'bitsy_cms',
  'username' => 'bitsy_cms_user',
  'password' => 'replace-with-a-strong-password',
  'charset' => 'utf8mb4'
);
```

The actual `database.php` is intentionally excluded from the deployment package.

`includes/cms.php` creates a PDO connection with:

- Exceptions enabled
- Associative-array fetch mode
- Emulated prepares disabled

---

# 7. Database Structure

The SQL dump contains these main tables:

```text
users
pages
page_revisions
categories
posts
media
leads
settings
code_snippets
```

## users

Stores admin/editor accounts.

Important columns:

- `id`
- `name`
- `username`
- `email`
- `password_hash`
- `role`
- `last_login_at`
- `pages_last_seen_at`
- `posts_last_seen_at`
- `categories_last_seen_at`
- `leads_last_seen_at`
- timestamps

Roles:

```text
admin
editor
```

Passwords are stored as password hashes using PHP's `password_hash()` / `PASSWORD_DEFAULT` mechanism and verified with `password_verify()`.

The supplied SQL dump contains one admin user:

```text
username: admin
role: admin
```

The password is hashed and is intentionally not documented here. A bcrypt-style hash cannot be converted back into the original password.

---

## pages

Stores CMS metadata/content for frontend PHP pages.

Important columns:

- `slug`
- `template`
- `status`
- `title`
- `meta_description`
- `og_title`
- `og_description`
- `heading`
- `intro`
- `body`
- `published_at`
- timestamps

Statuses:

```text
draft
published
private
```

The SQL dump contains 25 page records.

### Important behavior

The frontend does not simply render the entire `body` from the database.

Instead, the existing PHP page is rendered first and `bitsy_cms_apply_page()` overlays selected values from the `pages` table.

Current dynamically applied fields are:

- title
- meta description
- OG title
- OG description
- first H1
- first `.lede` paragraph

The admin page editor therefore controls selected content/SEO fields rather than replacing the entire PHP template.

---

## page_revisions

Contains:

- page ID
- user ID
- JSON snapshot
- timestamp

The table exists in the schema, but no current PHP application code was found that actively reads or writes `page_revisions`.

This appears to be a reserved/unused revision feature in the current package.

---

## categories

Stores blog categories.

Fields:

- `id`
- `name`
- `slug`
- timestamps

The supplied database contains 40 category records.

---

## posts

Stores blog posts.

Important fields:

- `slug`
- `status`
- `title`
- `category_id`
- `excerpt`
- `content`
- `meta_description`
- `featured_image`
- `author_id`
- `published_at`
- timestamps

The supplied database contains 243 post records.

Relationships:

```text
categories.id
      ↓
posts.category_id

users.id
      ↓
posts.author_id
```

Both relationships use `ON DELETE SET NULL`.

---

## media

The schema contains a media table with:

- filename
- path
- MIME type
- alt text
- uploaded_by
- timestamp

However, the current admin media implementation primarily scans the filesystem under:

```text
assets/img/
assets/img/uploads/
assets/video/uploads/
```

The `media` table is not used as the primary source by the current media admin implementation.

---

## leads

Stores website enquiries.

Fields include:

- name
- mobile
- email
- solution
- company
- role
- city
- industry
- rooms
- timeline
- budget
- message
- form_source
- page_slug
- IP address
- status
- notes
- timestamps

The supplied SQL dump contains one lead record.

Lead statuses:

```text
new
contacted
qualified
closed
spam
```

---

## settings

A generic key/value settings table exists in the schema.

No current PHP application code was found actively using the `settings` table.

It appears to be unused/reserved in the current implementation.

---

## code_snippets

Stores admin-managed code snippets.

Fields include:

- name
- content
- location
- page_scope
- page_slugs
- content_type
- priority
- enabled
- timestamps

Supported locations:

```text
header
footer
body_open
body_close
```

Supported content types:

```text
html
js
css
php
```

Supported page scopes:

```text
all
home
specific
exclude_home
```

The frontend injects enabled snippets according to priority and page scope.

---

# 8. Admin Panel

## Admin URL

The admin panel is located at:

```text
/admin/
```

The login page is:

```text
/admin/login.php
```

The dashboard is:

```text
/admin/index.php
```

Because `.htaccess` rewrites extensionless PHP paths, `/admin/` is the intended entry point.

---

# 9. How to Access the Admin Panel

### If the SQL database has already been imported

Open:

```text
https://YOUR-DOMAIN.com/admin/
```

The supplied SQL dump already contains a user:

```text
Username: admin
Role: admin
```

You need the corresponding password.

The dump contains only the password hash, not the original password.

### If there are no users

`admin/login.php` checks whether any users exist.

If there are no users, it displays a one-time setup form allowing creation of the first admin.

The first password must be at least 10 characters.

### Authentication flow

```text
/admin/login.php
        ↓
bootstrap.php
        ↓
users table
        ↓
username lookup
        ↓
password_verify()
        ↓
session_regenerate_id()
        ↓
$_SESSION['bitsy_admin_user_id']
$_SESSION['bitsy_admin_role']
        ↓
/admin/index.php
```

---

# 10. Admin Authentication & Security

The admin system uses PHP sessions.

Session variables include:

```text
bitsy_admin_user_id
bitsy_admin_role
bitsy_admin_csrf
```

Successful login regenerates the session ID.

Admin forms use CSRF tokens generated with:

```php
random_bytes()
```

and verified with:

```php
hash_equals()
```

The admin also uses a failed-login throttle stored in:

```text
data/login_attempts.json
```

The configured lockout threshold is 5 failed attempts within the lockout window.

The runtime file must be writable by PHP.

---

# 11. Admin Roles

There are two roles:

```text
admin
editor
```

All authenticated users can access the main workspace modules.

The following are explicitly restricted to the `admin` role:

- Code Snippets
- Users

The code calls:

```php
bitsy_admin_require_role('admin');
```

for those sections.

---

# 12. Admin Modules

## Dashboard

```text
/admin/index.php
```

Shows:

- Published pages
- Enquiry count
- Pages with SEO
- Recent pages
- Recent enquiries
- Quick actions

---

## Pages

```text
/admin/pages.php
```

Used for:

- Page title
- Meta description
- Heading
- Intro
- Page preview

The page data is stored in the `pages` table.

The frontend then applies these values dynamically.

---

## Posts

```text
/admin/posts.php
```

Used for blog CRUD.

Supports:

- Create post
- Edit post
- Delete post
- Publish/draft/private status
- Slug
- Category
- Excerpt
- Content
- Meta description
- Featured image
- Published date

Posts are stored in the `posts` table.

---

## Categories

```text
/admin/categories.php
```

Used for category CRUD.

Supports:

- Create
- Edit
- Delete
- Name
- Slug

Categories are stored in `categories`.

---

## Media

```text
/admin/media.php
```

Supports uploads of:

### Images

- JPG/JPEG
- PNG
- GIF
- WebP
- Max 10 MB

### Videos

- MP4
- WebM
- OGG
- MOV
- Max 50 MB

The implementation uses filesystem directories:

```text
assets/img/uploads/
assets/video/uploads/
```

The media screen checks whether an asset is referenced by PHP/HTML before allowing deletion.

---

## Enquiries

```text
/admin/leads.php
```

Shows website form submissions.

It first attempts to read leads from the MySQL `leads` table.

If the database cannot be read, it falls back to:

```text
leads.csv
```

---

## Code Snippets

```text
/admin/snippets.php
```

Admin-only.

Allows insertion of:

- HTML
- JS
- CSS
- PHP

at:

- header
- body open
- footer
- body close

It also supports page targeting and priority.

This is powerful and should only be accessible to trusted administrators.

---

## Users

```text
/admin/users.php
```

Admin-only.

Supports:

- Create user
- Edit user
- Change password
- Change role
- Delete user

Passwords are re-hashed using PHP's `password_hash()`.

The implementation protects against deleting the last admin through admin-count logic.

---

# 13. Lead/Form System

The primary form handler is:

```text
submit.php
```

Frontend forms submit to this file using POST.

## Short form fields

Most pages contain:

```text
name
phone
email
offering
company_website
source
page
```

The hidden `company_website` field acts as a honeypot.

## Long qualifying form

Homepage and Contact page additionally collect:

```text
company
role
city
industry
screens
timeline
budget
message
```

The handler maps `screens` to the database's `rooms` field.

---

# 14. Lead Submission Flow

```text
Frontend form
      ↓
POST submit.php
      ↓
IP rate limit
      ↓
Honeypot check
      ↓
Input cleaning
      ↓
Name validation
      ↓
Phone validation
      ↓
Email validation
      ↓
Offering validation
      ↓
Insert into leads table
      ↓
Send notification email
      ↓
Send acknowledgement email
      ↓
If DB failed → write leads.csv
      ↓
Redirect to thank-you.php
```

---

# 15. Lead Protection

The handler implements:

### IP rate limiting

The handler limits requests to:

```text
5 requests / 600 seconds
```

Runtime data is stored in:

```text
data/rate_limits.json
```

### Honeypot

If:

```text
company_website
```

is filled, the submission is treated as a bot and redirected to the thank-you page without normal lead processing.

### Input cleaning

The handler trims input and removes CR/LF characters and certain encoded newline strings.

### Email validation

`filter_var(..., FILTER_VALIDATE_EMAIL)` is used.

### Phone validation

Non-numeric characters are stripped and at least 10 digits are required.

---

# 16. Email System

The project uses PHP's native:

```php
mail()
```

There is no SMTP library configuration identified in the current code.

Lead recipient:

```text
info@bitsydisplays.com
```

CC is currently empty:

```text
BITSY_MAIL_CC = ''
```

The sender is generated from the current HTTP host:

```text
no-reply@domain
```

The lead email uses the submitted person's name/email as Reply-To.

An acknowledgement email is also sent to the submitted email address.

### Production requirement

The hosting server must support PHP `mail()` and have mail delivery correctly configured.

If reliable transactional email is required, SMTP or a transactional email provider should be considered.

---

# 17. Lead Storage Fallback

The preferred storage path is:

```text
MySQL → leads table
```

If MySQL is unavailable:

```text
leads.csv
```

is used as a fallback.

The `.htaccess` explicitly denies web access to `leads.csv`.

Production documentation recommends moving `leads.csv` outside the public document root or using private storage/database.

---

# 18. URL Routing

The project's `.htaccess` contains:

```text
/category/{slug}
/category-sitemap.xml
/post-sitemap.xml
```

rewrite rules.

It also contains a generic rule:

```text
If REQUEST_FILENAME.php exists,
rewrite the extensionless URL to the PHP file.
```

Therefore a file such as:

```text
about-us.php
```

can be reached through an extensionless URL:

```text
/about-us
```

while the admin is a physical directory:

```text
/admin/
```

---

# 19. Dynamic Blog URLs

The blog uses:

```text
blog.php
post.php
category.php
```

Category routing:

```text
/category/{category-slug}
```

is rewritten to:

```text
category.php?slug={category-slug}
```

Blog post rendering is handled by `post.php`.

Posts are loaded from the `posts` database table.

---

# 20. Sitemaps

The project contains:

```text
sitemap.xml
post-sitemap.php
category-sitemap.php
```

`.htaccess` maps:

```text
/post-sitemap.xml
```

to:

```text
post-sitemap.php
```

and:

```text
/category-sitemap.xml
```

to:

```text
category-sitemap.php
```

The static `sitemap.xml` should be checked after deployment to ensure its domain matches the final production domain.

---

# 21. Robots.txt

The project includes:

```text
robots.txt
```

The deployment notes specifically instruct checking its domain references if the final domain differs from the testing domain.

---

# 22. CMS Bootstrap / Dynamic Overrides

`includes/site-bootstrap.php`:

1. Loads `cms.php`
2. Detects the current PHP page slug
3. Starts output buffering
4. Applies CMS database values
5. Injects favicon if needed
6. Injects code snippets

Conceptually:

```text
PHP page
   ↓
site-bootstrap.php
   ↓
cms.php
   ↓
pages table
   ↓
replace selected HTML values
   ↓
code snippets
   ↓
final HTML response
```

---

# 23. Code Snippet Injection

The frontend can inject enabled database snippets into:

```text
<head>
<body opening>
<footer / before </body>
<body closing
```

The snippet system supports page scope:

```text
all
home
specific
exclude_home
```

and priority ordering.

PHP snippets are also supported.

### Security warning

Because PHP snippets can be executed, the Code Snippets feature effectively provides code execution capability to administrators. Only trusted admin accounts should have access.

---

# 24. WordPress Migration Tools

The project includes several migration/import scripts.

### `database/migrate.php`

Imports current PHP page metadata/content into the `pages` table and can import `leads.csv`.

### `database/migrate_categories.php`

Migrates/normalizes category data.

### `database/migrate_users.php`

Migrates the legacy single-password admin system to the database-backed users system.

It can carry the old password hash from:

```text
data/admin.json
```

into the first admin user.

### `database/migrate_snippets.php`

Migration for code snippets.

### `database/migrate_admin_seen_at.php`

Adds/updates admin "last seen" tracking fields.

### `database/import_wordpress_posts.php`

Imports WordPress posts and can download/localize images.

### `database/sync_wordpress_seo.php`

Fetches WordPress pages and compares SEO/title data.

### `database/seed_posts.php`

Seeds blog posts.

---

# 25. Legacy Authentication

The project documentation says:

```text
data/admin.json
```

was the old authentication source.

The current production authentication is database-backed.

`migrate_users.php` exists specifically to move the legacy password hash into the `users` table.

The deployment notes state that `data/admin.json` is no longer used.

---

# 26. Important Database/Application Observations

### Observation 1 — Page body is stored but not fully editable

The `pages.body` column contains page HTML, but the active frontend overlay only replaces selected fields.

Therefore the admin page editor is not a full visual/page-builder CMS.

It is primarily a metadata/selected-content override layer on top of the PHP templates.

### Observation 2 — `page_revisions` appears unused

The table exists but no current application reference was found.

### Observation 3 — `settings` appears unused

The table exists but no active CMS usage was found.

### Observation 4 — `media` table is not the main media source

The current media manager scans actual files rather than building the main library from the database table.

### Observation 5 — Two lead storage strategies exist

Preferred:

```text
MySQL
```

Fallback:

```text
leads.csv
```

This is intentional according to the project documentation.

---

# 27. Security Findings

## Positive controls identified

- PDO prepared statements are used for most database operations.
- PDO emulated prepares are disabled.
- Passwords use PHP password hashing.
- `password_verify()` is used during login.
- Admin sessions are regenerated after successful login.
- CSRF tokens are implemented in admin forms.
- `hash_equals()` is used for CSRF comparison.
- Admin role checks exist.
- Login throttling exists.
- Frontend form rate limiting exists.
- Honeypot spam protection exists.
- HTML escaping is used in admin output.
- CSV formula injection protection exists.
- `leads.csv` is denied by `.htaccess`.

## Items requiring production attention

### 1. PHP `mail()`

The site depends on the hosting environment's PHP mail configuration.

Verify actual delivery before go-live.

### 2. `leads.csv`

Even though `.htaccess` denies access, keeping lead data inside the public web root is less desirable than storing it outside the document root.

### 3. Runtime JSON files

Ensure:

```text
data/
```

is writable by PHP but not publicly browsable.

### 4. Code snippets

PHP snippet execution is extremely powerful and should remain admin-only.

### 5. Upload handling

Review production server upload restrictions and confirm that uploaded media cannot be interpreted as executable PHP.

### 6. Database credentials

Never upload the local `config/database.php`.

Create it from the example and use production credentials.

### 7. Error handling

Database connection failures are intentionally suppressed in `bitsy_db()` and represented as an unavailable connection. Production logging should be considered so failures are diagnosable without exposing details to visitors.

---

# 28. Production Deployment

## Step 1 — Create database

Create an empty MySQL/MariaDB database and database user.

Recommended:

```text
Database: bitsy_cms
User: dedicated production user
Password: strong unique password
```

Grant only the required database privileges.

---

## Step 2 — Import database

The deployment package includes:

```text
bitsy_cms.sql
```

Import this into the production database.

The supplied dump contains existing data including:

- 25 pages
- 243 posts
- 40 categories
- 1 lead
- 1 admin user

and the relevant schema.

---

## Step 3 — Upload website

Upload the **contents of `bitsy/`** to the website document root.

Do not upload the local development database configuration.

---

## Step 4 — Configure database.php

Copy:

```text
config/database.example.php
```

to:

```text
config/database.php
```

Then set the production:

- host
- port
- database
- username
- password
- charset

---

## Step 5 — Permissions

Make sure PHP can write to:

```text
data/
```

The runtime login/rate-limit JSON files need write access.

Media upload directories also need to be writable where applicable:

```text
assets/img/uploads/
assets/video/uploads/
```

---

## Step 6 — Apache / mod_rewrite

Confirm:

- Apache is being used
- `mod_rewrite` is enabled
- `.htaccess` is allowed
- overrides are permitted

Without this, pretty URLs and dynamic sitemap routes may fail.

---

## Step 7 — Test Admin

Open:

```text
https://YOUR-DOMAIN.com/admin/
```

Use the imported admin account.

If the database contains no users, the login screen can display first-admin setup.

---

## Step 8 — Test Frontend

Check:

```text
/
 /about-us
 /our-services
 /blog
 /contact-us
 /thank-you
```

Also test several offering pages.

---

## Step 9 — Test forms

Submit a test lead and verify:

```text
Form
 ↓
Database lead
 ↓
Email notification
 ↓
Acknowledgement email
 ↓
Thank-you page
```

If the database is unavailable, verify the CSV fallback only if required.

---

## Step 10 — Test sitemap

Check:

```text
/sitemap.xml
/post-sitemap.xml
/category-sitemap.xml
/robots.txt
```

Verify the final production hostname.

---

# 29. Deployment Files That Must NOT Be Used as Production Credentials

Do not upload or expose:

```text
config/database.php
```

if it contains local XAMPP credentials.

The deployment documentation specifically identifies local credentials as intentionally excluded from the deployment package.

---

# 30. Admin Quick Reference

```text
Admin:
https://YOUR-DOMAIN.com/admin/

Login:
https://YOUR-DOMAIN.com/admin/login.php

Dashboard:
/admin/index.php

Pages:
/admin/pages.php

Posts:
/admin/posts.php

Categories:
/admin/categories.php

Media:
/admin/media.php

Enquiries:
/admin/leads.php

Code Snippets:
/admin/snippets.php

Users:
/admin/users.php

Logout:
/admin/logout.php
```

### Admin database

```text
users
```

### Supplied admin username

```text
admin
```

### Password

Not recoverable from the supplied bcrypt hash. Reset it if the original password is unknown.

---

# 31. Developer Quick Reference

## Main frontend

```text
index.php
```

## Main CMS logic

```text
includes/cms.php
```

## Frontend bootstrap

```text
includes/site-bootstrap.php
```

## Form handler

```text
submit.php
```

## Admin bootstrap

```text
admin/bootstrap.php
```

## Database schema

```text
database/schema.sql
```

## Database dump

```text
bitsy_cms.sql
```

## Database configuration

```text
config/database.php
```

## Configuration template

```text
config/database.example.php
```

---

# 32. Important Data Flow

## Frontend page

```text
Visitor
   ↓
PHP page
   ↓
site-bootstrap.php
   ↓
cms.php
   ↓
pages table
   ↓
SEO/content override
   ↓
HTML response
```

## Blog

```text
Visitor
   ↓
blog.php / post.php / category.php
   ↓
cms.php
   ↓
posts/categories/users
   ↓
HTML
```

## Admin

```text
/admin/
   ↓
login.php
   ↓
users table
   ↓
PHP session
   ↓
admin dashboard
   ↓
CMS modules
```

## Lead

```text
Frontend form
   ↓
submit.php
   ↓
validation/security checks
   ↓
leads table
   ↓
mail()
   ↓
thank-you.php
```

---

# 33. Known Data in Supplied SQL

The supplied `bitsy_cms.sql` is not an empty schema.

It contains existing CMS data.

Identified records include:

```text
Users:       1
Categories:  40
Posts:       243
Pages:       25
Leads:       1
```

The single user is:

```text
Admin / admin / admin role
```

The password is stored as a secure password hash.

---

# 34. Current Form Coverage

Forms were found across the website.

Most offering/content pages contain a short lead form with:

```text
name
phone
email
offering
```

plus hidden/source fields.

The homepage and contact page contain longer qualification forms with:

```text
company
role
city
industry
screens
timeline
budget
message
```

The hidden fields:

```text
source
page
```

allow the system to identify where a lead originated.

---

# 35. Things to Check Before Making Code Changes

Before changing this project, understand that the website is **not purely database-rendered**.

It is a hybrid architecture:

```text
Hardcoded PHP templates
        +
Database CMS overrides
        +
Database blog system
        +
Filesystem media
        +
Admin panel
```

Therefore:

- Changing a PHP template can affect frontend layout/content.
- Changing the `pages` table can affect SEO/H1/intro output.
- Changing `cms.php` can affect every frontend page.
- Changing `site-bootstrap.php` can affect every page.
- Changing `submit.php` affects all frontend lead forms.
- Changing `admin/bootstrap.php` affects all admin pages.
- Changing the database schema can affect both frontend and admin.
- Code snippets can affect arbitrary frontend pages.

---

# 36. Recommended First Checks on Live Deployment

Before considering the deployment complete:

```text
[ ] Database imported successfully
[ ] database.php configured
[ ] Database connection works
[ ] Admin login works
[ ] Admin username/password confirmed
[ ] Admin dashboard works
[ ] Pages module works
[ ] Posts module works
[ ] Categories module works
[ ] Media upload works
[ ] Enquiries display correctly
[ ] User management works
[ ] Code snippets restricted to admin
[ ] Homepage loads
[ ] About page loads
[ ] Services pages load
[ ] Blog listing loads
[ ] Blog post loads
[ ] Category URL loads
[ ] Contact page loads
[ ] Lead form submits
[ ] Lead reaches database
[ ] Lead email arrives
[ ] Autoresponder arrives
[ ] Thank-you redirect works
[ ] CSV fallback behavior understood
[ ] sitemap.xml checked
[ ] post-sitemap.xml checked
[ ] category-sitemap.xml checked
[ ] robots.txt checked
[ ] HTTPS checked
[ ] data/ permissions checked
[ ] upload permissions checked
[ ] leads.csv protected/moved
[ ] production domain references checked
[ ] PHP mail delivery verified
[ ] database version compatibility verified
```

---

# 37. Final Summary

Bitsy AV is a custom PHP + MySQL/MariaDB website with a custom CMS rather than a traditional WordPress installation.

The frontend consists primarily of PHP templates. The CMS database provides dynamic page metadata and selected content overrides, while the blog and categories are more fully database-driven.

The admin panel is available at:

```text
/admin/
```

The supplied SQL database already contains an admin user named:

```text
admin
```

The password cannot be derived from the stored bcrypt hash. If unknown, reset it.

The core application is built around:

```text
includes/cms.php
```

which handles database access and CMS operations.

Frontend pages load:

```text
includes/site-bootstrap.php
```

which applies database-controlled values and code snippets to the rendered page.

Lead forms submit to:

```text
submit.php
```

and store leads in MySQL, with a CSV fallback if the database is unavailable.

The admin has these main areas:

```text
Dashboard
Pages
Posts
Categories
Media
Enquiries
Code Snippets (admin only)
Users (admin only)
```

The most important production requirements are:

1. Configure `config/database.php`.
2. Import `bitsy_cms.sql`.
3. Verify database-version compatibility.
4. Enable Apache `mod_rewrite`.
5. Make required runtime/upload directories writable.
6. Verify admin login.
7. Verify lead forms and email delivery.
8. Protect or move `leads.csv`.
9. Verify sitemap/robots domain references.
10. Keep production credentials and secrets out of the public codebase.

This document is intended as the primary technical reference for understanding the current supplied Bitsy AV project.
