<?php 
    session_start(); 

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
	
	$username = $_SESSION['currentUser'];
	$query = $CheapoMail->prepare("SELECT * FROM User where username=?");
	$query->execute([$username]);
	while ($row = $query->fetch())
    {
        echo $row['admin'];
    }
?>