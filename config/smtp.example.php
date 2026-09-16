<?php
// Copy this file to smtp.php and fill in real SMTP credentials from your mail
// provider. Keep smtp.php outside version control and never expose it publicly.
// Leave smtp.php absent (or 'host' empty) to keep using PHP's mail() function.
return array(
  'host' => '',
  'port' => 587,
  'username' => '',
  'password' => 'replace-with-a-strong-password',
  'encryption' => 'tls', // 'tls', 'ssl', or '' for none
  'from_address' => 'no-reply@bitsyav.com',
  'from_name' => 'Bitsy AV Website',
  'admin_email' => 'info@bitsydisplays.com'
);
