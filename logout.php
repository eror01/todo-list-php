<?php 
session_start();
$_SESSION['username'] = null;
$_SESSION['password'] = null;
$_SESSION['loggedIn'] = false; 
$_SESSION['user_id'] = null;
session_destroy();
header("Location: index.php"); ?>