<?php
    session_start();
    //  Requireing required files
    require_once('../rabbitmqphp_example/path.inc');
    require_once('../rabbitmqphp_example/get_host_info.inc');
    require_once('../rabbitmqphp_example/rabbitMQLib.inc');
    require_once('rabbitMQClient.php');

    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");

    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username"]=$_POST['username'];
    $request = array();
    $request['type'] = "Login";
    $request['username'] = $username;
    $request['password'] = $password;
    $request['message'] = $msg;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    echo "client received response: ".PHP_EOL;
    print_r($response);
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
  

?>
