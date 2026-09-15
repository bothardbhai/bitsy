<?php
require_once __DIR__ . '/cms.php';
$bitsyPageSlug = basename($_SERVER['SCRIPT_FILENAME'], '.php');
ob_start(function ($html) use ($bitsyPageSlug) {
  $html = bitsy_cms_apply_page($html, $bitsyPageSlug);
  if (stripos($html, 'rel="icon"') === false) {
    $html = str_replace('</head>', '<link rel="icon" type="image/png" href="/assets/img/bitsy-favicon.png"></head>', $html);
  }
  /* Inject code snippets into header, footer, body_open, body_close */
  $headerSnippets = bitsy_cms_snippets('header', $bitsyPageSlug);
  $bodyOpenSnippets = bitsy_cms_snippets('body_open', $bitsyPageSlug);
  $footerSnippets = bitsy_cms_snippets('footer', $bitsyPageSlug);
  $bodyCloseSnippets = bitsy_cms_snippets('body_close', $bitsyPageSlug);
  if ($headerSnippets !== '') { $html = str_replace('</head>', $headerSnippets . '</head>', $html); }
  if ($bodyOpenSnippets !== '') { $html = preg_replace('/<body(\s[^>]*)?>/', '<body$1>' . $bodyOpenSnippets, $html, 1); }
  if ($footerSnippets !== '') { $html = str_replace('</body>', $footerSnippets . '</body>', $html); }
  if ($bodyCloseSnippets !== '') { $html = str_replace('</body>', $bodyCloseSnippets . '</body>', $html); }
  return $html;
});