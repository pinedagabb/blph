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
	<?php include("usernav.php") 
    ?>
    <!-- HEADER BANNER -->
    
	<div class="halffill" style="background-image:url('img/headers/backpack.jpg');">
		<div style = "padding-top:7%;padding-left:39%">
            <img class = "animated fadeInRight" src = 'img/allposts/city.png' style = "width:30%;height:30%;padding-bottom:20px;opacity:0.8;-webkit-animation-delay : .5s"><br>
            <img class = "animated fadeInRight" src = 'img/allposts/prov.png' style = "width:40%;height:40%;padding-bottom:20px;opacity:0.8;-webkit-animation-delay : 1s"><br>
            <img class = "animated fadeInRight" src = 'img/allposts/island.png'  style = "width:40%;height:40%;padding-bottom:20px;opacity:0.8;-webkit-animation-delay : 1.5s"><br>
            <img class = "animated fadeInRight" src = 'img/allposts/line.png'  style = "width:40%;height:40%;padding-bottom:20px;opacity:0.8;-webkit-animation-delay : 2s"><br>
		</div>
        <img class = "animated bounceInRight"src = 'img/allposts/saying.png'  style = "width:90%;height:8%;padding-left:39%;opacity:0.9;-webkit-animation-delay : 2.5s"><br>
	</div>
    
    <!-- POSTS -->
    <div style = "padding-top:0%">
        <div class = "cont"></div>
    <!-- search bar -->    
   <div class="container" style = "padding-top:2%">
	<div class="row">
        <div class="" style = "width: 1132px;padding-left:1.5%;">
            <div id="searchbar">
                <div class="input-group col-md-12">    
                        <input id = "searchinput" type="text" class="form-control" placeholder="SEARCH"  style = "font-size: 30px;height:50px;font-family: Catam; letter-spacing: 2px;"/>
                        <span class="input-group-btn">
                            <a id = "searchbtn">
                                <img id = "arrow"src = "img/postbox/down.png" style = "wdith:50px; height:50px;">
                            </a>
                        </span>
                        
                </div>
                <span id ="hr"></span>
                <!-- DROPDWN "-->   
                <div class="sbdrop" style="display:none;">
                    <?php include("home-extns/sbdropdown.php")?>
                </div>
            </div>
        </div>
	</div>
</div>  
    <!-- inclusion of postbox -->    
    <div class = "container">
        <div class = "postboxcontainer">
        </div>
    </div>
</body>
	
</html>

<script src = "js/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/masonry.js"></script>
<script src = "js/myjs.js"></script>
<script src = "js/sweetalert.min.js"></script>
<script>

    
// GLOBAL VARIABLES
var $checkboxes = $("input:checkbox");
var prov, d ,tag,postlikes,postchecks;
var globalinput;
var ifliked;
displayPosts();
    
$(document).ready(function(){
    $(".navbar-fixed-top").css("background-color", "transparent"); //transparent nav
    $(".navbar-nav li a").css("color", "#ffffff");
    $(".dropdown-content a").css("color", "#333333");
    
    $('div.postboxcontainer').masonry({
        columnWidth: 'div.postbox',
        itemSelector: 'div.postbox'
        });
    jQuery(window).on('load', function(){    
        $('div.postboxcontainer').masonry({
        columnWidth: 'div.postbox',
        itemSelector: 'div.postbox'
        });
    });
    
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
    
    var $checkboxes = $("input:checkbox");

    
    $("#searchinput").dblclick(function(){
        $(".sbdrop").show(1000);
    });
    
    $("#searchbtn").click(function(){
        if ($(".sbdrop").css('display') != 'none'){
            $(".sbdrop").slideUp(1000);
            $("#arrow").attr("src","img/postbox/down.png");
        }else{
            $(".sbdrop").show(1000);              
            $("#arrow").attr("src","img/postbox/up.png");
        }
    });
    
    //hides the box
    $("#hidesbox").click(function(){
        $(".sbdrop").slideUp(1000);
    });
    //clear checkfields
    $("#clearcheck").click(function(){
       $('input:checkbox').removeAttr('checked');
        $("#searchinput").val("");
        displayPosts();
        
    });
    //confirm box
    $(".check").on("click", function(){
	   return confirm("Add to your bucketlist?");
    }); 
    
    $checkboxes.on("click", function(){
        prov = getProv();
        d = getDiv();
        tag = getTag();
        postchecks = getUserchecks();
        postlikes = getUserexp();
        updatePost(prov,d ,tag, globalinput, postchecks,postlikes);
    });
    
    $("#searchinput").keyup(function(){
       globalinput = $("#searchinput").val();
       updatePost(prov, d, tag, globalinput, postchecks,postlikes);
    
    });
});
    
function getProv(){
    var opts = [];
    $(".provcheck").each(function(){
      if(this.checked){
        opts.push(this.id);
      }
    });
    return opts;
}    

function getDiv(){
    var opts = [];
    $(".divcheck").each(function(){
      if(this.checked){
        opts.push(this.id);
      }
    });
    return opts;    
}
    
function getTag(){
    var opts = [];
    $(".tagcheck").each(function(){
      if(this.checked){
        opts.push(this.id);
      }
    });
    return opts;    
}
    
function getUserexp(){
    var opts = [];
    $(".postlikes").each(function(){
      if(this.checked){
        opts.push(this.id);
      }
    });
    return opts; 
    
}
    
    
function getUserchecks(){
    var opts = [];
    $(".postchecks").each(function(){
      if(this.checked){
        opts.push(this.id);
      }
    });
    return opts; 
    
}


function displayPosts()
{
	$.ajax({
		url:"fetchposts.php",
		method: "GET",
		dataType: "json",
		success: function(data){
			$(".postboxcontainer").html("");
			$(data).each(function(key,val){
                    var $content = $("<div class = 'postbox col-md-4'><img src = 'imgs/postimgs/"+val[1]+"' class = 'img-responsive' alt = 'Post img'><h3><a class = 'postboxheading' href = 'posts.php?post_id="+val[0]+"' style = 'color: #141414;'>"+val[5]+"</a></h3><p class = 'postboxdate'>"+val[4]+"</p><p>"+val[6]+"</p><span class = 'pull-right'><a onclick= 'checkPost("+val[0]+")' style = 'cursor:pointer'><img id = 'check"+val[0]+"'src = 'img/postbox/check.png' class = 'ico'></a><span id = 'checkcnt"+val[0]+"' class = 'icotxt'>"+val[9]+"</span><a onclick = 'likePost("+val[0]+")' style = 'cursor:pointer'><img id = 'like"+val[0]+"' src = 'img/postbox/heart.png' class = 'ico'></a><span id = 'likecnt"+val[0]+"' class = 'icotxt'>"+val[8]+"</span><a onclick = 'addPost("+val[0]+")' style = 'cursor:pointer'><img id = 'add"+val[0]+"' src = 'img/postbox/add.png' class = 'ico'></a></span></div>");
                checkIfLiked(val[0]);
                checkIfChecked(val[0]);
                checkIfAdded(val[0]);
				$(".postboxcontainer").append($content);
                $(".postboxcontainer").masonry('prepended', $content, true);
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
    
function filterPosts(data)
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
                $(data).each(function(key,val){
                var $content = $("<div class = 'postbox col-md-4'><img src = 'imgs/postimgs/"+val[1]+"' class = 'img-responsive' alt = 'Post img'><h3><a class = 'postboxheading' href = 'posts.php?post_id="+val[0]+"' style = 'color: #141414;'>"+val[5]+"</a></h3><p class = 'postboxdate'>"+val[4]+"</p><p>"+val[6]+"</p><span class = 'pull-right'><a onclick= 'checkPost("+val[0]+")' style = 'cursor:pointer'><img id = 'check"+val[0]+"'src = 'img/postbox/check.png' class = 'ico'></a><span id = 'checkcnt"+val[0]+"' class = 'icotxt'>"+val[9]+"</span><a onclick = 'likePost("+val[0]+")' style = 'cursor:pointer'><img id = 'like"+val[0]+"' src = 'img/postbox/heart.png' class = 'ico'></a><span id = 'likecnt"+val[0]+"' class = 'icotxt'>"+val[8]+"</span><a onclick = 'addPost("+val[0]+")' style = 'cursor:pointer'><img id = 'add"+val[0]+"' src = 'img/postbox/add.png' class = 'ico'></a></span></div>");
                checkIfLiked(val[0]);
                checkIfChecked(val[0]);
                checkIfAdded(val[0]);
                $(".postboxcontainer").append($content);
                $(".postboxcontainer").masonry('prepended', $content, true);    
            
			});
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
function updatePost(prov, d, tag, globalinput,postchecks,postlikes){
    $.ajax({
          url: "search.php",
          method: "POST",
          //dataType : 'json',
          data: {provopt: prov,
                dopt: d,
                tagopt: tag,
                userinput: globalinput,
                 pchecks : postchecks,
                 plikes: postlikes
                },
          success: function(data){
            //alert(data);
            filterPosts(data);
          },
          error: function(data){
                console.log("ERROR");
		  }

    });
}

 
    
</script>
    
