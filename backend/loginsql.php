
<?php

$mydb = new mysqli('127.0.0.1','testUser','12345','testdb');
$utest = $_POST["username"];
$ptest = $_POST["password"];
echo "$utest $ptest";
$username="guest";
$password="password123";
if ($mydb->errno != 0)
{
	echo "failed to connect to database: ". $mydb->error . PHP_EOL;
	exit(0);
}

echo "successfully connected to database".PHP_EOL;

//$query = "select * from testtable;";
$querynametest = "select * from user where username='$username' and password='$password';";

//$response = $mydb->query($query);

$response2= $mydb->query($querynametest);
if ($mydb->errno != 0)
{
	echo "failed to execute query:".PHP_EOL;
	echo __FILE__.':'.__LINE__.":error: ".$mydb->error.PHP_EOL;
	exit(0);
}

//$numrows = mysqli_num_rows($response);
$users = mysqli_num_rows($response2);
//echo "we got $numrows from the query".PHP_EOL;

/*while ($row = $response->fetch_row())
{
	print_r($row);
}
 */

echo "test complete".PHP_EOL;
if($users==1)
{
echo "pass".PHP_EOL;
}
else
{
echo "fail".PHP_EOL;
}
echo "plz work $users".PHP_EOL;

?>