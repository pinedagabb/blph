<?php
    include("logged_session.php");
	include("sql_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>My posts</title>
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
    
    <!-- POSTS -->
    <div style = "padding-top:5%">
    <center><h1>MY POSTS</h1></center>
    <div class = "container postboxcontainer">
        <?php 
				$result = mysqli_query($mysqli, "SELECT * FROM post WHERE post_author='".$_SESSION['username']."'");
				if(mysqli_num_rows($result)>0){
                    while( $row = mysqli_fetch_array($result) ){
					echo "<div class = 'postbox col-md-4'>";
                    echo "<center><a href = 'editpost.php?post_id=".$row[0]."'><button class = 'btn btn-warning' style = 'font-size:12px; font-family: Catam; letter-spacing: 2px;'>EDIT POST</button></a> ";
                    echo "<a href = 'deletepost.php?post_id=".$row[0]."'><button class = 'btn btn-danger' style = 'font-size:12px; font-family: Catam; letter-spacing: 2px;'>DELETE POST</button></a><br></center><br>";
                    echo "<img src = 'imgs/postimgs/".$row[1]."' class = 'img-responsive' alt = 'Post img'>";
                    echo "<h3><a href = 'posts.php?post_id=".$row[0]."' style = 'color: #141414;'>".$row[5]."</a></h3>";
                    echo "<p class = 'postboxdate'>";
                    echo date("F j, Y", strtotime($row[4]));
                    echo "</p>";
                    echo "<p>".$row[6]."</p>";
                    echo "<div class = 'pull-right'>
                            <a href = '#'><img src= 'img/postbox/check.png' class = 'ico'></a><span class = 'icotxt'>".$row[9]."</span>
                            <a href = '#'><img src= 'img/postbox/heart.png' class = 'ico'></a><span class = 'icotxt'>".$row[8]."</span>
                            <a href = 'removefromlist.php?post_id=".$row[0]."'><img src= 'img/postbox/minus.png' class = 'ico check'></a>
                        </div>";
                    echo "</div>";
                    
				}
                }else{
                    echo "YOU HAVE NOT POSTED ANYTHING YET.";
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
<script>
$('div.postboxcontainer').masonry({
    columnWidth: 'div.postbox',
    itemSelector: 'div.postbox'
});
$(document).ready(function(){
	//confirm box
	$(".check").on("click", function(){
		return confirm("Remove from you bucketlist?");
	});
	
	
});
</script>