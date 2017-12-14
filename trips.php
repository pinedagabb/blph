<?php
    include("logged_session.php");
	include("sql_connect.php");
    $rs = mysqli_query($mysqli, "SELECT * FROM user WHERE username ='".$_SESSION['username']."'");
    $info = mysqli_fetch_row($rs);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Trips</title>
	<meta charset = "utf-8">
	<link rel="icon" href = "img/icon.ico">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/animate.min.css">
    <link rel = "stylesheet" href = "css/normalize.min.css">
</head>

<body>	
	<?php include("usernav.php") 
    ?>
    <!-- HEADER BANNER -->
    <div class="halffill" style="background-image:url('img/headers/surfboard.jpg');">
		<div style = "padding-top:10%;">
            <img class = "animated fadeInLeft" src = 'img/alltrips/firstline.png' style = "width:55%;height:30%;padding-bottom:20px;opacity:0.7;-webkit-animation-delay : .5s;padding-left:20%;"><br>
            <img class = "animated fadeInLeft" src = 'img/alltrips/secondline.png' style = "width:54%;height:40%;padding-bottom:20px;opacity:0.8;-webkit-animation-delay : 1s;padding-left:7%;"><br>
            <img class = "animated fadeInLeft" src = 'img/allposts/line.png'  style = "width:54%;height:40%;padding-bottom:20px;opacity:0.8;-webkit-animation-delay : 1.5s;padding-left:13%;"><br>
		</div>
        <img class = "animated bounceInLeft"src = 'img/alltrips/buckleup.png'  style = "width:54%;height:12%;padding-left:28%;opacity:0.9;-webkit-animation-delay : 2s"><br>
	</div>
    
    <!-- TRIPS -->
    <div style = "padding-top:5%">
        <div class = "cont"></div>
    <!-- search bar -->    
   <div class="container">
       <?php
            if($info[9] == true){
                echo "<a href = 'addtrip.php'><button class = 'pull-right btn homebtn' style = 'margin-right:30px;'>ADD TRIP</button></a>";
            }
        ?>
    </div>  
    <!-- inclusion of postbox -->    
    <div class = "container" style = 'padding-top:5%;'>
        <div class = "tripboxcontainer">
        </div>
    </div>
</body>
	
</html>

<script src = "js/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/masonry.js"></script>
<script src = "js/myjs.js"></script>
<script>

    
// GLOBAL VARIABLES
var $checkboxes = $("input:checkbox");
var prov, d ,tag,postlikes,postchecks;
var globalinput;
    
$(document).ready(function(){
    $(".navbar-fixed-top").css("background-color", "transparent");
    $(".navbar-nav li a").css("color", "#ffffff");
    $(".dropdown-content a").css("color", "#333333");
    displayTrips();
    
    // fade in .navbar
    $(function () {
        $(window).scroll(function() { // check if scroll event happened
        if ($(document).scrollTop() > 50) { // check if user scrolled more than 50 from top of the browser window
          $(".navbar-fixed-top").css("background-color", "#ffffff"); // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
			$(".navbar-nav li a").css("color", "#141414");
		} else {
          $(".navbar-fixed-top").css("background-color", "transparent"); // if not, change it back to transparent
          $(".navbar-nav li a").css("color", "#ffffff");
          $(".dropdown-content a").css("color", "#333333");
        }
      });
    });
});
    
    
function displayTrips()
{
    $.ajax({
		url:"fetchtrips.php",
		method: "GET",
		dataType: "json",
		success: function(data){
			$(".tripboxcontainer").html("");
            var $i = 1;
			$(data).each(function(key,val){
                if($i%2 != 0){
                    var $content = $("<div class = 'tripbox slide' style ='padding-bottom:0px;'><div class = 'col-md-7' style = 'padding:0px;'><img class = 'tripboximg' src = 'imgs/tripimgs/"+val[4]+"'></div><div class = 'col-md-5' style = 'padding-top:7%;padding-left: 3%;padding-right:5%;'><p class = 'tripboxhead'>"+val[1]+"</p><p class = 'tripboxdef'>"+val[2]+"</p><br><p class = 'tripboxcontent'>"+val[6]+"</p><img src = 'img/postbox/locatico.png' class = 'tripboxico'><span class = 'triploc'>"+val[3]+"</span><br><br><br><a href = 'tripdetails.php?trip_id="+val[0]+"'><button class = 'btn tripbtn'>VIEW DETAILS</button></a></div></div><br><br>");  
				    $(".tripboxcontainer").append($content);
                }else{
                    var $content = $("<div class = 'tripbox slide' style ='padding-bottom:0px;'><div class = 'col-md-5' style = 'padding-top:7%;padding-left: 3%;padding-right:5%;'><p class = 'tripboxhead'>"+val[1]+"</p><p class = 'tripboxdef'>"+val[2]+"</p><br><p class = 'tripboxcontent'>"+val[6]+"</p><img src = 'img/postbox/locatico.png' class = 'tripboxico'><span class = 'triploc'>"+val[3]+"</span><br><br><br><a href = 'tripdetails.php?trip_id="+val[0]+"'><button class = 'btn tripbtn'>VIEW DETAILS</button></a></div><div class = 'col-md-7' style = 'padding:0px;'><img class = 'tripboximg' src = 'imgs/tripimgs/"+val[4]+"'></div></div><br><br>");  
				    $(".tripboxcontainer").append($content);
                }
                $i++;
			});
           
        }
	});
}
    
</script>
    
