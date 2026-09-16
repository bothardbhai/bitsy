<?php
/**
 * Sends plain-text mail via SMTP (PHPMailer) when config/smtp.php has a
 * non-empty host configured, otherwise falls back to PHP's mail() exactly as
 * this project has always done (locally captured by Mailpit). Callers get
 * the same boolean success/failure result either way.
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

function bitsy_smtp_config() {
  static $config = false;
  if ($config !== false) { return $config; }
  $file = dirname(__DIR__) . '/config/smtp.php';
  $config = is_file($file) ? require $file : null;
  return $config;
}

function bitsy_send_mail($to, $subject, $body, $fromEmail, $fromName, $replyToEmail = null, $replyToName = null, $cc = null) {
  $smtp = bitsy_smtp_config();
  if ($smtp && !empty($smtp['host'])) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
      $mail->isSMTP();
      $mail->Host = $smtp['host'];
      $mail->Port = $smtp['port'];
      $mail->SMTPAuth = $smtp['username'] !== '';
      if ($mail->SMTPAuth) { $mail->Username = $smtp['username']; $mail->Password = $smtp['password']; }
      if (!empty($smtp['encryption'])) { $mail->SMTPSecure = $smtp['encryption']; }
      $mail->setFrom($smtp['from_address'] ?: $fromEmail, $smtp['from_name'] ?: $fromName);
      $mail->addAddress($to);
      if ($cc) { $mail->addCC($cc); }
      if ($replyToEmail) { $mail->addReplyTo($replyToEmail, $replyToName ?: ''); }
      $mail->isHTML(false);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  // Fallback: PHP's mail(), same header shape this project has always used.
  $headers  = 'From: ' . $fromName . ' <' . $fromEmail . ">\r\n";
  if ($replyToEmail) { $headers .= 'Reply-To: ' . ($replyToName ?: $replyToEmail) . ' <' . $replyToEmail . ">\r\n"; }
  if ($cc) { $headers .= 'Cc: ' . $cc . "\r\n"; }
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
  $headers .= 'X-Mailer: PHP/' . phpversion();
  return @mail($to, $subject, $body, $headers);
}
