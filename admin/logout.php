<?php
require __DIR__ . '/bootstrap.php';
$_SESSION = array();
session_destroy();
header('Location: login.php');
exit;