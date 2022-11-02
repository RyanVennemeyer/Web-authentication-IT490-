
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


echo "successfully connected to database".PHP_EOL;

function login($username,$password){
	$mydb = new mysqli('127.0.0.1','testUser','12345','testdb');
	$utest = $_POST["username"];
	$ptest = $_POST["password"];
	echo "$utest $ptest";
	if ($mydb->errno != 0)
	{
		echo "failed to connect to database: ". $mydb->error . PHP_EOL;
		exit(0);
	}
	$username="guest";
	$password="password123";


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
	return true;
}







function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    //case "validate_session":
      //return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
