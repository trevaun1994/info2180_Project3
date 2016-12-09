<?php
session_start();
//include 'login.php';
$recepient = $_POST["recp"];
$subject = $_POST["sub"];
$body = $_POST["body"];

	
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

$current_user = $_SESSION['currentUser'];   // GET THE CURRENT USER'S ID
$useridquery = $CheapoMail->prepare("SELECT id FROM User WHERE username = ?");
$useridquery->execute([$current_user]);
while ($row = $useridquery->fetch())
{
    $current_userID = $row['id'];
}

$recpt = $_SESSION['currentUser'];   
$ridquery = $CheapoMail->prepare("SELECT id FROM User WHERE username = ?");
$ridquery->execute([$recp]);
while ($row = $ridquery->fetch())
{
	$rID = $row['id'];
	if(mysql_fetch_array($rID)==0){
        echo "Invalid Recipient Username";
        
    }
    else
    {
    
        
        $sql = "INSERT INTO message (body,subject,user_id,recipient_ids) VALUES ($body,$subject,'$current_userID','$rID');";

        if (!mysqli_query($con,$sql))
	    {
		    die('Error: ' . mysqli_error($con));
	    }
	    else{
			echo "Message Sent";
  		}
        
    }
	 
}

    
    
    
else
{
    echo "Session not set";
}

}
  
?>