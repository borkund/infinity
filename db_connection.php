<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
// database connection
$servername = "localhost";
$username = "infinity_2021";
$password = "Infinity@2021";
$db_name = "infinity_agrotech";

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>