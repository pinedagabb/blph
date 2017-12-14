<?php
    include("logged_session.php");
	include("sql_connect.php");
    $link = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>My bucketlist</title>
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
    
    <!-- POSTS -->
    <div style = "padding-top:5%">
    <center><span></span><img src = 'img/postbox/heart.png' style = 'width:3%;height:3%;'><span style = "letter-spacing:3px;font-size:25px;"> MY LIKES</span></span></center>
    <div class = "container postboxcontainer">
        <?php 
				$result = mysqli_query($mysqli, "SELECT * FROM likes WHERE username='".$_SESSION['username']."'");
				if(mysqli_num_rows($result)>0){
                    while( $row = mysqli_fetch_array($result) ){
                    $tmp = mysqli_query($mysqli, "SELECT * FROM post WHERE post_id='".$row[1]."'");
                    $data = mysqli_fetch_row($tmp);
					echo "<div class = 'postbox col-md-4'>";
                    echo "<img src = 'imgs/postimgs/".$data[1]."' class = 'img-responsive' alt = 'Post img'>";
                    echo "<h3><a href = 'posts.php?post_id=".$data[0]."' style = 'color: #141414;'>".$data[5]."</a></h3>";
                    echo "<p class = 'postboxdate'>";
                    echo date("F j, Y", strtotime($data[4]));
                    echo "</p>";
                    echo "<p>".$data[6]."</p>";
                    echo "<div class = 'pull-right'>
                            <a onclick = 'checkPost(".$data[0].")' style = 'cursor:pointer;'><img id = 'check".$data[0]."'src= 'img/postbox/check.png' class = 'ico'></a><span id = 'checkcnt".$data[0]."'class = 'icotxt'>".$data[9]."</span>
                            <a onclick = 'likePost(".$data[0].")' style = 'cursor:pointer;'><img id = 'like".$data[0]."'src= 'img/postbox/redheart.png' class = 'ico'></a><span id = 'likecnt".$data[0]."'class = 'icotxt'>".$data[8]."</span>";
                    echo    "<a onclick = 'addPost(".$data[0].")' style = 'cursor:pointer;'><img id = 'add".$data[0]."'src= 'img/postbox/add.png' class = 'ico'></a>";
                    echo   "</div>";
                    echo "</div>";
                    
				}
                }else{
                    echo "<center><p class = 'emptypromptsmall' style = 'padding-top:50px;'>You have not liked any post yet. :-( </p></center>";
                }
        ?>
    </div>
    </div>
</body>
	
</html>


<script src = "js/bootstrap.min.js"></script>
<script src = "js/jquery.min.js"></script>
<script src = "js/masonry.js"></script>
<script src = "js/myjs.js"></script>
<script src = "js/sweetalert.min.js"></script>
<script>

$('div.postboxcontainer').masonry({
    columnWidth: 'div.postbox',
    itemSelector: 'div.postbox'
});
$(document).ready(function(){
	
});
    

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
    
</script>