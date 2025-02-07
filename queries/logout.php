<?php include "../database/config.php";
// Initialize the session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1); 
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

// Redirect to login page
// header("location: index.php");
header("location: ../index");
exit;
?>