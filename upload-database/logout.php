<?php
session_start();
include 'db_conf.php';

// Unset all of the session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to index.php
header("Location: index.php");
exit;
?>
