<?php   
include("db_connection.php");
session_destroy(); //destroy the session
$conn->close();
header("location: login.php"); //to redirect back to "index.php" after logging out
exit();
?>