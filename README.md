# Bitsy AV website (bitsyav.com)

Two parallel sets of the same 26 pages:

* **`*.php` files: the deployable site.** Upload these plus `assets/`, `submit.php`, `.htaccess`, `robots.txt`, `sitemap.xml` to the web root (PHP 7.4+ with `mail()` enabled). Forms post to `submit.php`, which validates, emails info@bitsydisplays.com, appends `leads.csv` and redirects to `thank-you.php`.
* **`*.html` files: click-through previews.** Identical markup, links point at the `.html` copies, forms land on `thank-you.html`. Useful for review without a PHP server. Do not upload them.

## Pages
Home, Offerings index, 18 offering pages, Who we are, Clients, Gallery, Insights, Contact Us, Thank you.

## Lead routing
Edit the constants at the top of `submit.php`: `BITSY_MAIL_TO`, `BITSY_MAIL_CC`.

## Conversion mechanics
* 4 field form in the first fold of every page (sticky on desktop), long qualifying brief on home and contact
* Sticky call / WhatsApp / CTA bar on mobile, scarcity strip, trust badges, stats band, named testimonials, client logos, FAQ objection handling
* Hidden `source` and `page` fields on every form so you can see which page and which form converted

## Before go-live
* Images and logos used by the site are now bundled in `assets/img/`; verify the folder is included in the upload.
* Point contact email and phone at the bitsyav.com inbox if it differs.
* Add GA4 and Google Ads conversion tracking on `thank-you.php`.
* Move `leads.csv` outside the web root or keep the `.htaccess` deny rule.

## Admin dashboard

The first admin foundation is available at `/admin/`. It provides:

* one-time password setup with PHP password hashing and session authentication;
* page SEO editing for the live `.php` pages (title, description and Open Graph values);
* media library for uploading new JPG, PNG, GIF, and WebP images;
* a read-only enquiries view backed by the existing `leads.csv` file.

On first visit, create an admin password of at least 10 characters. The host must support PHP 7.4+ with sessions enabled and must allow PHP to write the `data/` directory and page files. Keep `data/` protected by its `.htaccess` rule. Before production, move `leads.csv` outside the public document root or use a private database/storage service.

## Production database

The production CMS is designed for MySQL 8+ or MariaDB 10.6+. Create an empty database and user on the server, run `database/schema.sql`, copy `config/database.example.php` to `config/database.php`, and fill in the credentials. Keep `config/` protected and do not commit `database.php`. Run `php database/migrate.php` once to import the current PHP page metadata/content and CSV enquiries into MySQL. Take a database backup before running it again.
# bitsy
