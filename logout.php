<?php 
    if(isset($_SESSION['username'])) {
        unset($_SESSION['username']);  //Is Used To Destroy Specified Session
        header("Location: index.html"); // Redirecting To Home Page
        echo 'You are now logged out';
    }
   
?>



