<?php
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
    $host = getenv('IP');
	$username = getenv('C9_USER');
	$password = '';
	$dbname = 'CheapoMail';
	$con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	if (!$con) {
		echo "Connection failed";
		return false;
	}
	
	$stmt = $con->query("SELECT * FROM User WHERE username = '$username' and password = '$password';");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->fetchAll(PDO::FETCH_ASSOC)){
    	// sends something to javascript if it fails
    	echo "fail";
    }else{
    	// sends something to javascript if it succeeds
    	//session_start();
    	//$_SESSION['username']=$username;
    	setcookie('username',$username,time()+2000);
    	echo "pass";
    }
?>