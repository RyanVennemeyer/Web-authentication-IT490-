
<?php

session_start();
//  Require-ing required files

require_once('path.inc');

require_once('get_host_info.inc');

require_once('rabbitMQLib.inc');

//require_once('rabbitMQClient.php');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

if (!isset($_POST))
{
    $msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
    echo json_encode($msg);
    exit(0);
}

$request = $_POST;
$response = "unsupported request type, politely FUCK OFF";
$username = $_POST["username"];
$password = $_POST["password"];
$_SESSION["username"]=$_POST['username'];

$arr = array();
$arr['type'] = "login";
$arr['username'] = $username;
$arr['password'] = $password;
//$name = "$username $password";

$send = $client->send_request($arr);

/*
switch ($request["type"])
{
    case "login":
        $response = "login, yeah we can do that";
    break;
}
*/
//echo json_encode($request);
//echo "". PHP_EOL;
//echo json_encode($_POST);
///var_dump($arr);
exit(0);

?>