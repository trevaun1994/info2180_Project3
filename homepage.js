//Javascript file//
window.onload=function(){
	document.getElementById("Compose").onclick= compose_message;
	document.getElementById("Inbox").onclick= view_messages;
	document.getElementById("Other Users").onclick= view_users;
	document.getElementById("logout").onclick = logout;
}

/*function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
   } */

function compose_message(){
	var compose_panel=[
		'<div id ="compose_window">',
		'<div id="new_message">',
		'<div id="header"><strong> New Message </strong></div>',
		'</div>',
		'<form>',
		'<fieldset>',
		'<strong>To:</strong><br> <input type="text" id ="recipient" name="recipient" class="textfield"> <br>',
		'<strong>Subject:</strong><br> <input type="text" id="subject" name="subject" class="textfield"> <br><br>',
		'<strong>Message</strong><br> <textarea  id = "message_content" name="message_content" cols="40" rows="5"></textarea> <br>',
		'<button id="Send"> <strong> Send </strong> </button>',
		'</fieldset>',
		'</form>',
		'</div>',
		'<div id="Response"></div>',
		
	].join('');
	document.getElementById("pagecontent").innerHTML= compose_panel;
	document.getElementById("Send").onclick= insert_data;
	
}

function insert_data(){
    
    var rec = document.getElementById("recipient").value;
    var sub = document.getElementById("subject").value;
    var bod = document.getElementById("message_content").value;
    
    	$.post("newmessage.php", {recp:rec, sub:sub, body:bod}, function(responseMessage){
	    if (responseMessage!="Sent") {
	        alert ("Message Failed");
        }else if(responseMessage=="Sent"){
            alert ("Message Sent");
            window.location.href="homepage.html";
        }
	    });
    
    
    /*var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST","newmessage.php",true);
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            var responseMessage = xmlHttp.responseText;
            //document.getElementById("Response").innerHTML= responseMessage;
            alert(responseMessage);
            view_messages();
        }
    };
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", req_mes.length);
    xmlHttp.setRequestHeader("Connection", "close");
    
    
    xmlHttp.send(req_mes); */
  
}

function view_messages(){
    console.log("the message list");
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            var responseMessage = xmlHttp.responseText;
            document.getElementById("pagecontent").innerHTML= responseMessage;
        }
    };
    xmlHttp.open("POST","message_list.php",true);
    xmlHttp.send();

}

function view_users(){
    console.log("the user list");
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            var responseMessage = xmlHttp.responseText;
            document.getElementById("pagecontent").innerHTML= responseMessage;
             
        }
    };
    xmlHttp.open("GET","view_user.php",true);
    xmlHttp.send();   
}

function logout(){
    console.log("logging out");
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            var responseMessage = xmlHttp.responseText;
            alert(responseMessage);
             window.location.href="index.html";
        }
    };
    xmlHttp.open("GET","logout.php",true);
    xmlHttp.send();
    
}
function read(){
    console.log("reading");
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            var responseMessage = xmlHttp.responseText;
           
            // document.getElementById("pagecontent").innerHTML= responseMessage;
        }
    };
    xmlHttp.open("GET","read.php",true);
    xmlHttp.send();
    
}