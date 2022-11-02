<?php
//Makes DB connection
$servername = "127.0.0.1";
$username = "testUser";
$password = "12345";
$dbname = "testdb";

$db = new mysqli($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
 {
echo "CONNECTED ";
}

/*
$servername = "127.0.0.1";
$username = "testUser";
$password = "password123";
$dbname = "testdb";
$db = new mysqli('127.0.0.1','testUser','12345','testdb');
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
 {
echo "CONNECTED ";
}
*/
?>
