<?php
session_start();

// Create connection
$conn = new mysqli("localhost", "root", "", "hrm");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  

error_reporting(E_ALL);
ini_set('display_errors', 1); //Show page errors

date_default_timezone_set('Asia/Kolkata'); //Default time zone set

?>