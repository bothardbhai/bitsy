<?php
require_once __DIR__ . '/includes/site-bootstrap.php';
$pageTitle = 'Test Page - Bitsy AV';
$pageDescription = 'test page for Bitsy AV CMS functionality.';
require __DIR__ . '/includes/header.php';
?>
<section class="sec" style="padding-top:56px">
    <div class="wrap">
        <p class="crumbs"><a href="index.php">Home</a> / Test Page</p>
        <h1>Test Page Heading 1</h1>
        <p class="lede">This is a test page created during complete Bitsy AV project testing.</p>
        <p>This page was created to verify the Admin &rarr; Pages CMS workflow (SEO fields, heading, and intro editing)
            end to end, and to confirm the shared header/footer includes render correctly on a newly added page. It is
            intentionally left in place for manual inspection.</p>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>