<table id="table_header">
	<tr>
		<th id ="header1">From</th>
		<th id ="header2">Subject</th>
		<th id ="header3">Body</th>
	</tr>

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
	
	if(isset($_SESSION['currentUser'])){
		$current_user = $_SESSION['currentUser'];   // GET THE CURRENT USER'S ID
		$useridquery = $CheapoMail->prepare("SELECT id FROM User WHERE username = ?");
		$useridquery->execute([$current_user]);
		while ($row = $useridquery->fetch())
    	{
        	$current_userID = $row['id'];
    	}
	
		
		$messagePrep = $CheapoMail->prepare("SELECT * from Message where recipient_ids = ?;"); //GET THE USER'S MESSAGES
		$messagePrep->execute([$current_userID]);
		while ($eachmessage = $messagePrep->fetch())
   		{	
   			/*if ($eachmessage['message'] == NULL) {
   				echo "no message";
   			} */
    		$senderid= $eachmessage['user_id'];
    		$senderName =  $CheapoMail->prepare("SELECT firstname FROM User WHERE id = ?;");
       		$senderName->execute([$senderid]);
       		$senderName = $senderName->fetch();
       	
    		echo '<tr onclick="read();">';
			echo "<td>".$senderName."</td>";
			echo "<td>".$eachmessage['subject']."</td>";
			echo "<td>".$eachmessage['body']."</td>";
			echo "</tr>";
		}
	}else{
	    echo "Not Logged In";
	} 
?>
</table>