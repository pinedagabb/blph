<?php
    session_start();
    if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
        header("location: home.php");
    }
?>



<!DOCTYPE html>
<html>
<head>
	<title>BucketlistPH</title>
	<meta charset = "utf-8">
	<link rel="icon" href = "img/icon.ico">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/animate.min.css">
    <style>
        .modal-header, h4, .close {
            color: #fff !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-header, .modal-body {
            padding: 40px 50px;
        }
    </style>
</head>

<body>
	<div id ="loading" class = "fill" style = "background-color:#ffffff">
        <center><img src = 'img/postbox/loader.gif' style = "padding-top:20%;"></center>
    </div>
	
	<!-- HEADER BANNER -->
	
	<div class="fill" style="background-image:url('img/loginpage/faded.jpg');">
		<div class="text-center">
			<br><img src="img/nav/lol.png" class = 'animated bounceInUp' style = "width:20%;height:20%;-webkit-animation-delay:0.5s;"><br>
            <img src="img/loginpage/caption.png" class = 'animated fadeIn' style = "width:43%;height:43%;padding-left:5%;-webkit-animation-delay:1s;"><br><br><br>
            <a id = "login"><img class = 'animated zoomInLeft'id = "loginbtn"src="img/loginpage/login.png" style = "width:14%;height:14%;padding-right:10px;cursor:pointer;-webkit-animation-delay:1.5s;"></a>
            <a id = "signup"><img class = 'animated zoomInRight' id = "signupbtn"src= "img/loginpage/signup.png"style = "width:15%;height:15%;padding-left:13px;cursor:pointer;-webkit-animation-delay:1.5s;"></a>
		</div>
    </div>
    
    <!-- Login Modal -->
    <div class="modal fade" id="loginmodal" role="dialog" style = 'display:hidden;'>
        <div class="modal-dialog"><br><br><br>
                
        <!-- Modal content-->
            <div class="modal-content fill">
                <div class="modal-header fill" style = "background-image: url('img/loginpage/log5.jpg')" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>L O G - I N</h4>
                </div>
                <div class="modal-body">
                <div class = 'loginprompt'></div>
                <form role="form" method = "POST">
                    <div class="form-group">
                        U S E R N A M E
                        <input type="text" class="form-control form-control-gray" id="username" name = "un">
                    </div>
                    <div class="form-group">
                        P A S S W O R D 
                        <input type="password" class="form-control form-control-gray" id="password" name = "pw">
                    </div>
                    <span id = "loginbutton" onclick = "loginattempt();"class="btn mybtn" style = "width:500px;background-color:#27ae60;">L O G - I N</span>
                    </button>
                </form>
                </div>
                <div class="modal-footer">
                    <p>Forgot <a href="#" style = "color:#27ae60">password?</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Register Modal -->
    <div class="modal fade" id="registermodal" role="dialog" style = 'display:hidden;'>
        <div class="modal-dialog"><br>
                
        <!-- Modal content-->
            <div class="modal-content fill">
                <div class="modal-header fill" style = "background-image: url('img/loginpage/log5.jpg')" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>S I G N - U P</h4>
                </div>
                <div class="modal-body">
                
                <form method = 'POST' action = 'registeracc.php' enctype = "multipart/form-data" class = "form-inline">
                    <center>
                    
                    <input type = 'text' name = 'first_name' placeholder='First Name' class = 'form-control form-control-gray inputbox' style ="width:220px" required = 'required'>
				    <input type = 'text' name = 'last_name' placeholder='Last Name' class = 'form-control form-control-gray inputbox' style ="width:220px" required = 'required'><br>
					<!-- input type = 'date' //OR// USE A DATEPICKER PLUG-IN -->
					<input type = 'text' name = 'username' placeholder='Username' class = 'form-control form-control-gray inputbox' style ="width:454px" required = 'required'><br>
					<input type = 'text' name = 'email' placeholder='Email address' class = 'form-control form-control-gray inputbox' style ="width:454px" required = 'required'><br>
					<input type = 'password' name = 'password' placeholder='Password' class = 'form-control form-control-gray inputbox' style ="width:454px" required = 'required'><br>
					<input type = 'file' name = 'profpic' class = 'form-control form-control-gray inputbox' style = "width : 454px" required = 'required'><br><br>
					<button type="submit" class="btn mybtn check" style = "width:458px;background-color:#27ae60;">Sign up!</button>
                    </center>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
	
</html>

<script src = "js/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/myjs.js"></script>
<script>

$(document).ready(function(){
    jQuery(window).on('load', function(){     
        $("#loading").fadeOut(500);
    });
    $("body").css("overflow", "hidden");
    $("#loginbtn")
        .mouseover(function() { 
            $(this).attr("src", "img/loginpage/hoverlogin.png");
        })
        .mouseout(function() {
            $(this).attr("src", "img/loginpage/login.png");
        });
    $("#signupbtn")
        .mouseover(function() { 
            $(this).attr("src", "img/loginpage/hoversignup.png");
        })
        .mouseout(function() {
            $(this).attr("src", "img/loginpage/signup.png");
        });
    
    $("#login").click(function(){
        $("#loginmodal").modal();
    }); 
    $("#signup").click(function(){
        $("#registermodal").modal();
    });

});

function loginattempt(e){
    var x = $("#username").val();
    var y = $("#password").val();
    logInCheck(x,y);
}
    
    
function logInCheck(x,y){
    $.ajax({
		url:"logincheck.php",
		method: "POST",
        data: {
            un : x,
            pw : y
        },
		success: function(data){
			if(data == "1"){
                $(location).attr('href', 'home.php');
                //alert("CORRECT");
            }else{
                $(".loginprompt").html("");
                $(".loginprompt").html("<div class = 'alert alert-danger animated shake'><p>Wrong Username/Password!</p></div>");
            }
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}
</script>
