<?php 
    $messageid = $_REQUEST['id'];
    $messagesender = $_REQUEST['sender'];
    $flag = $_REQUEST['flag'];
    $con=mysqli_connect("localhost","", "" );
    if (!$con) {
    	echo "Connection failed";
    	return false;
    }
    
    
    if(isset($_COOKIE['username'])){
        //echo "cookie set";
		$current_user = $_COOKIE['username'];
		$messagequery =  "SELECT * FROM message WHERE id = '$messageid'";
		$messageinfo = mysqli_query($con,$messagequery);
		while($row=mysqli_fetch_array($messageinfo)){
		    //echo"In the while";
			$message_body= $row['body'];
			$message_subject= $row['subject'];
			//$message_body= $row['body'];
		    
		    echo "<div class='readme'>";
		    echo "<div id='subject2'>".$message_subject."</div>"; 
		    echo "<hr id='hr2'>";
		    echo "<div id='from'><strong>From: </strong>".$messagesender."</div>";
		    echo "<p id='message_body'>".$message_body."</p>";
		    echo "</div>";
		}
		if($flag == 0){
		    $useridstring=  "SELECT id FROM user WHERE username = '$current_user'";
		    $useridquery = mysqli_query($con,$useridstring);
		    while($row2=mysqli_fetch_array($useridquery)){
		        $date = date("Y/m/d");
		        $userid=$row2['id'];
		        $sql= "INSERT INTO message_read (message_id,reader_id,date) VALUES ('$messageid','$userid','$date');";
		        if (!mysqli_query($con,$sql)){
  					    //die('Error: ' . mysqli_error($con));
  					    echo "ERROR";
  				}
		    }
		    
		}
	}else{
	    
	    
	    echo "Not logged in";
	}
?>