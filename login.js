function verify(){              
	var username = $("#usr").val();
	var password = $("#pass").val();
	
	$.post("login.php", {username:username, password:password}, function(responseMessage){
	    if (responseMessage=="fail") {
               document.getElementById("login_status").innerHTML= "<div class='loginstat'><strong> Login Failed </strong></div>";
                
            }else if(responseMessage=="pass"){
                document.getElementById("login_status").innerHTML= "<div class='loginstat'><strong> Login Success </strong></div>";
                window.location.href="homepage.html";
            }
	});
    
} /*   THIS CODE WORKS DO NOT MODIFY */