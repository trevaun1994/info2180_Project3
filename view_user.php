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
	
	$query = $CheapoMail->prepare("SELECT * FROM User");
	$query->execute([$username, $password]);
	while ($row = $query->fetch())
    {
        echo "<p>".$row['username']."</p>";
    }
    
    echo "<p> Current User = ".$_SESSION['currentUser']."</p>";
?>