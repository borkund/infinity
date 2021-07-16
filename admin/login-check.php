<?php
include("db_connection.php");
$username = $_POST["username"];
$password = $_POST["pwd"];
//$sql = "SELECT infinity_user_name,full_name FROM infinity_login WHERE infinity_user_name = '$username' and infinity_password = md5('$password')";
$sql = "SELECT id,infinity_user_name,full_name FROM infinity_login WHERE infinity_user_name = '$username' and infinity_password = '$password'";
//echo $sql;
$result = $conn->query($sql);
//print_r($result);
//exit;
if ($result->num_rows > 0) {
  $row = $result -> fetch_assoc();  
  $_SESSION["id"] = $row["id"];
  $_SESSION["infinity_user_name"] = $row["infinity_user_name"];
  
  header("location: dashboard.php");
  exit;
}else{
 echo 'User name or password wrong'." <a href='login.php'>Login</a>";
 exit;
}

?>