<?php
include 'db.php';
///from request on front end

$username = $username;
$password = $password;
///$password = md5($string["password"]);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * from IT490user where username='$username' and password='$password'";
$row = mysqli_query($conn, $query);



exit;

?>