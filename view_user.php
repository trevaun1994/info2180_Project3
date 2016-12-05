<?php 
    //session_start(); 

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
    
   

   /* if(isset($_COOKIE['username'])){ 
	
		$userlistq =  $CheapoMail-> prepare ("SELECT * FROM user;");
		$userlistres = mysqli_query($con,$userlistq);
		while($row=mysqli_fetch_array($userlistres)){
			$firstname= $row['first_name'];
			$lastname= $row['last_name'];
			$username= $row['username'];
			
			echo "<tr>";
            echo "<td>".$firstname."</td>";
            echo "<td>".$lastname."</td>";
            echo "<td>".$username."</td>";
            echo "</tr>";
		
		}
		
		
	}
	else
	{
	    echo"Not logged in";
	}   */
?>