<?php
	$username = $_POST["username"];   
	$password = $_POST["password"];
	
	/* CONNECT TO DATABASE */
    $host = getenv('IP');
	$un = getenv('C9_USER');
	$pd = '';
	$dbname = 'CheapoMail';
	$CheapoMail = new PDO("mysql:host=$host;dbname=$dbname", $un, $pd);

	if (!$CheapoMail) {
		echo "Connection failed";
		return false;
	}
	
	/* PERFORM QUERY */
	
	$query = $CheapoMail->prepare("SELECT * FROM User WHERE username = ? AND password = ?");
	$query->execute([$username, $password]);
	$userfound = $query->fetch();
	
	if($userfound)
	{
		echo "pass";
		session_start();
		$_SESSION['currentUser'] = $username;
	} 
	else
	{
		echo "fail";
	}
	
				 /*   THIS CODE WORKS DO NOT MODIFY */
?>