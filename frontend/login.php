<?php
    session_start();
    //  Requireing required files
    require_once('../rabbitmqphp_example/path.inc');
    require_once('../rabbitmqphp_example/get_host_info.inc');
    require_once('../rabbitmqphp_example/rabbitMQLib.inc');
    require_once('rabbitMQClient.php');

    $client = new rabbitMQClient("../config/rabbitConf.ini","testServer");

 
    
    function login($username, $password){
        
        $request = array();
        
        $request['type'] = "Login";
        $request['username'] = $username;
        $request['password'] = $password;
        
        
        $_SESSION["username"] = $username;
        
        $response = $client->send_request($request);

        echo $response["returnCode"];
        return $request;
    }