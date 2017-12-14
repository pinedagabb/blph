<?php
    include("logged_session.php");
	include("sql_connect.php");
    $link = 0;
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
    <link rel = "stylesheet" href = "css/normalize.min.css">
    <link rel = "stylesheet" href = "css/sweetalert.css">
</head>

<body>	
    <div id ="loading" class = "fill" style = "background-color:#ffffff">
        <center><img src = 'img/postbox/loader.gif' style = "padding-top:20%;"></center>
    </div>
	<?php include("usernav.php") 
    ?>
    <!-- HEADER BANNER -->
    
	<div class="fill" style="background-image:url('img/headers/jumppp.jpg');">
        <div class = 'pull-right bannerlogout'onclick="window.location='logout.php'">LOG OUT</div>
        <center>
		<div>
            <a href = 'home.php'><img src="img/nav/lol.png" class = "logo animated bounceInUp" style = "width:430px; height:450px;margin-left:14%;-webkit-animation-delay: .5s;"></a>
		</div>
        <div style = 'padding-top:7%;'>
            <a class = 'nava' href = "home.php"><img id = 'navhome' src = "img/nav/hoverhome.png" class ='navopts animated fadeInLeft' style = "-webkit-animation-delay: 1s;"></a>
            <a class = 'nava' href = "allposts.php"><img id = 'navposts'src = "img/nav/hoverposts.png" class ='navopts animated fadeInLeft' style = "-webkit-animation-delay: 1s;"></a>
            <a class = 'nava' href = "trips.php"><img id = 'navtrips' src = "img/nav/hovertrips.png" class ='navopts animated fadeInRight' style = "-webkit-animation-delay: 1s;"></a>
            <a class = 'nava' href = "userprofile.php?user=<?php echo $_SESSION['username'];?>"><img id = 'navprofile'src = "img/nav/hoverprofile.png" class ='navopts animated fadeInRight' style = "-webkit-animation-delay: 1s;"></a>
        </div>
        </center>
        <div class="boverlay"></div>
	</div>
    
    <!--BACK TO TOP -->
    <a href="#" class="back-to-top">Back to Top</a>
    
     <!-- POSTSbackground-image:url('img/mtfade.jpg')-->
    <div class = ''style = "padding-top:5%;" >
        <div class = 'homeposts'>
            <center>
                <p class = 'homeposthead slideanim'>Most liked posts</p>
                <p class = 'homepostdef slideanim'>Out of 300+ posts, these are the favorites</p>
            </center>
        </div>
        <div class = "cont"></div>
        
        <!-- inclusion of postbox -->    
        <div class = "container">
            <div class = " postboxcontainer" >
            </div>
        </div>
        <br><br><center><a href = 'allposts.php'><button class = 'btn homebtn' >VIEW ALL POSTS</button></a></center><br><br>
    </div>
    
    
    <!-- TRIPS style="background-image:url('img/blackislands.jpg');"-->
    <div class = "homeposts" style = "background-color: #f8f8f8;padding-top:5%">
        <div class = 'homeposts'>
            <center>
                <p class = 'homeposthead'>Round trip packages</p>
                <p class = 'homepostdef'>Most bought round trip packages: </p>
            </center>
        </div>
        <div class = "cont"></div>
        
        <!-- inclusion of postbox -->    
        <div class = "container">
            <div class = " tripboxcontainer">
            </div>
        </div>
        <br><br><center><a href = 'trips.php'><button class = 'btn homebtn' >VIEW ALL TRIPS</button></a></center><br><br>
    </div>
    
   
    <!-- FOOTER -->
    <?php
        include("footer.php");
    ?>
</body>
	
</html>


<script src = "js/bootstrap.min.js"></script>
<script src = "js/jquery.min.js"></script>
<script src = "js/masonry.js"></script>
<script src = "js/myjs.js"></script>
<script src = "js/sweetalert.min.js"></script>
<script>

    
// GLOBAL VARIABLES
$(".navbar").hide();
var qry = "SELECT * FROM post ORDER BY post_likes DESC"
mostlikedPosts(qry);
displayTrips();
$(document).ready(function(){
    
    
    jQuery(window).on('load', function(){    
        $('div.postboxcontainer').masonry({
        columnWidth: 'div.postbox',
        itemSelector: 'div.postbox'
        });
        
        $("#loading").fadeOut(500);
    });

    
    //navbar jquery
    // hide .navbar first
    $(".navbar").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 500) {
                $('.navbar').fadeIn();
                if($(this).scrollTop() > 1500){
                    $(".navbar-default").css('background-color', '#ffffff');
                }else{
                    $(".navbar-default").css('background-color', '#141414');
                }
                
            } else {
                $('.navbar').fadeOut();
            }
        });
    });
    
    //confirm box
    $(".check").on("click", function(){
	   return confirm("Add to your bucketlist?");
    }); 

});    

function mostlikedPosts(data)
{
	$.ajax({
		url:"filterpost.php",
		method: "GET",
		dataType: "json",
        data: {
            query :data
        },
		success: function(data){
			$(".postboxcontainer").html("");
            if(jQuery.isEmptyObject(data)){
                $(".postboxcontainer").append("<hr><center><div class = 'container'><p class = 'emptyprompt'>No result found :-(</p><a href = 'addpost.php'><button class = 'btn btn-default emptyp'>Be the first one to post about this place!</button></a></div></center>");
                
                
            }
                var i =0;
                $(data).each(function(key,val){
                    if(i<6){
                var $content = $("<div class = 'postbox col-md-4'><img src = 'imgs/postimgs/"+val[1]+"' class = 'img-responsive' alt = 'Post img'><h3><a class = 'postboxheading' href = 'posts.php?post_id="+val[0]+"' style = 'color: #141414;'>"+val[5]+"</a></h3><p class = 'postboxdate'>"+val[4]+"</p><p>"+val[6]+"</p><span class = 'pull-right'><a onclick= 'checkPost("+val[0]+")' style = 'cursor:pointer'><img id = 'check"+val[0]+"'src = 'img/postbox/check.png' class = 'ico'></a><span id = 'checkcnt"+val[0]+"' class = 'icotxt'>"+val[9]+"</span><a onclick = 'likePost("+val[0]+")' style = 'cursor:pointer'><img id = 'like"+val[0]+"' src = 'img/postbox/heart.png' class = 'ico'></a><span id = 'likecnt"+val[0]+"' class = 'icotxt'>"+val[8]+"</span><a onclick = 'addPost("+val[0]+")' style = 'cursor:pointer'><img id = 'add"+val[0]+"' src = 'img/postbox/add.png' class = 'ico'></a></span></div>");
                checkIfLiked(val[0]);
                checkIfChecked(val[0]);
                checkIfAdded(val[0]);
                $(".postboxcontainer").append($content).masonry("reloadItems").masonry("layout");       
                //$(".postboxcontainer").masonry('prepended', $content, true);
                    }
                    i++;
			});
        },
        error: function(data){  
                console.log("ERROR");
        }
	});
	
}
function addPost(postid){
    var x = postid;
    $.ajax({
		url:"addtolist.php",
		method: "GET",
        data: {
            post_id : postid
        },
		success: function(data){
            //console.log(data);
			if(data == "1"){
                $("#add"+x).attr("src","img/postbox/minus.png");
                $("#add"+x).removeClass("animated rubberBand");
                $("#add"+x).addClass("animated bounce");
                swal("Added!", "Added to your bucketlist!")
            }else{
                $("#add"+x).attr("src","img/postbox/add.png");
                $("#add"+x).removeClass("animated bounce");
                $("#add"+x).addClass("animated rubberBand");
                swal("Removed!", "Removed from your bucketlist!")
            }
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}    
    
    
function checkIfAdded(data){
    var x=data;
    $.ajax({
		url:"checkifadded.php",
		method: "GET",
        data: {
            post_id : data
        },
		success: function(data){
            if(data == "1"){
                   $("#add"+x).attr("src","img/postbox/minus.png");
            }
        },
        error: function(data){
            console.log("ERROR");
        }
	});
}
    
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
                if($i<5){
                    var $content = $("<div class = 'col-md-6'><div class = 'hometripbox slideanim' style ='padding-bottom:0px;'><div class = 'col-md-7' style = 'padding:0px;'><img class = 'hometripboximg' src = 'imgs/tripimgs/"+val[4]+"'></div><div class = 'col-md-5' style = 'padding-top:7%;padding-left: 3%;padding-right:5%;'><p class = 'hometripboxhead'>"+val[1]+"</p><p class = 'hometripboxdef'>"+val[2]+"</p><img src = 'img/postbox/locatico.png' class = 'hometripboxico'><span class = 'triploc'>"+val[3]+"</span><br><br><a href = 'tripdetails.php?trip_id="+val[0]+"'><button class = 'btn hometripbtn'>VIEW DETAILS</button></a></div></div><br><br></div>");  
				    $(".tripboxcontainer").append($content);
                }
                $i++;
                
			});
           
        }
	});
} 
    
    
    
function checkIfLiked(data){
    var x=data;
    $.ajax({
		url:"checkifliked.php",
		method: "GET",
        data: {
            post_id : data
        },
		success: function(data){
            if(data == "1"){
                   $("#like"+x).attr("src","img/postbox/redheart.png");
            }
        },
        error: function(data){
            console.log("ERROR");
        }
	});
}

    
function checkPost(postid){
    var x = postid;
    $.ajax({
		url:"check.php",
		method: "GET",
        data: {
            post_id : postid
        },
		success: function(data){
			if(data == "1"){
                $("#check"+x).attr("src","img/postbox/bluecheck.png");
                $("#check"+x).removeClass("animated rubberBand");
                $("#check"+x).addClass("animated bounce");
                $("#checkcnt"+x).text(parseInt($("#checkcnt"+x).text())+1);
                swal("Good job!", "Congrats on checking this off your list!", "success");
            }else{
                $("#check"+x).attr("src","img/postbox/check.png");
                $("#check"+x).removeClass("animated bounce");
                $("#check"+x).addClass("animated rubberBand");
                $("#checkcnt"+x).text(parseInt($("#checkcnt"+x).text())-1);
            }
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}
    
function checkIfChecked(data){
    var x=data;
    $.ajax({
		url:"checkifchecked.php",
		method: "GET",
        data: {
            post_id : data
        },
		success: function(data){
            if(data == "1"){
                   $("#check"+x).attr("src","img/postbox/bluecheck.png");
            }
        },
        error: function(data){
            console.log("ERROR");
        }
	});
}

function likePost(postid){
    var x = postid;
    $.ajax({
		url:"like.php",
		method: "GET",
        data: {
            post_id : postid
        },
		success: function(data){
			if(data == "1"){
                $("#like"+x).attr("src","img/postbox/redheart.png");
                $("#like"+x).removeClass("animated rubberBand");
                $("#like"+x).addClass("animated bounce");
                $("#likecnt"+x).text(parseInt($("#likecnt"+x).text())+1);
            }else{
                $("#like"+x).attr("src","img/postbox/heart.png");
                $("#like"+x).removeClass("animated bounce");
                $("#like"+x).addClass("animated rubberBand");
                $("#likecnt"+x).text(parseInt($("#likecnt"+x).text())-1);
            }
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}
</script>
    
