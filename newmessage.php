<?php
session_start();
$recepient = $_POST["rec"];
$subject = $_POST["sub"];
$body = $_POST["bod"];


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

$ridquery = $CheapoMail->prepare("SELECT id FROM User WHERE username = ?");
$ridquery->execute([$recepient]);
while ($row = $ridquery->fetch())
{
	$rID = $row['id'];
	if($rID==NULL){
        echo "Message Failed";
    }
    else
    {
        $ridquery = $CheapoMail->prepare("INSERT INTO Message (body,subject,user_id,recipient_ids) VALUES (?,?,?,?);");
        $ridquery->execute([$body,$subject,$current_userID,$rID]);
        echo "Sent";
    }
}
  
?>