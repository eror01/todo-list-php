<?php 
session_start();
$_SESSION['username'] = null;
$_SESSION['password'] = null;
$_SESSION['loggedIn'] = false; 
header("Location: index.php"); ?>