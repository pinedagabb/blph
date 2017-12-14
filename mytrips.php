<?php
    include("logged_session.php");
	include("sql_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Trips</title>
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
    
    <!-- TRIPS -->
    <div style = "padding-top:5%">
        <div class = "cont"></div>
        
    <center><span></span><span style = "letter-spacing:3px;font-size:25px;"> MY TRIPS</span></span></center>
    <!-- inclusion of postbox -->    
    <div class = "container" style = 'padding-top:5%;'>
        <div class = "tripboxcontainer">
            <?php 
				$result = mysqli_query($mysqli, "SELECT * FROM buycnt WHERE username='".$_SESSION['username']."'");
				if(mysqli_num_rows($result)>0){
                    while( $row = mysqli_fetch_array($result) ){
                    $tmp = mysqli_query($mysqli, "SELECT * FROM trip WHERE trip_id='".$row[1]."'");
                    $data = mysqli_fetch_row($tmp);
					echo "<div class = 'tripbox' style ='padding-bottom:0px;'><div class = 'col-md-6' style = 'padding:0px;'>";
                    echo "<img class = 'tripboximg'src = 'imgs/tripimgs/".$data[4]."'>";
                    echo "</div><div class = 'col-md-6' style = 'padding-top:7%;padding-left: 12%;padding-right:8%;'>";
                    echo "<p class = 'tripboxhead'>".$data[1]."</p>";
                    echo "<p class = 'tripboxdef'>".$data[2]."</p><br>";
                    echo "<p class = 'tripboxcontent'>".$data[6]."</p>";
                    echo "<img src = 'img/postbox/locatico.png' class = 'tripboxico'>";
                    echo "<span class = 'triploc'>".$data[3]."</span><br><br><br>";
                    echo    "<a href = 'tripdetails.php?trip_id=".$data[0]."'><button class = 'btn tripbtn'>VIEW DETAILS</button></a>";
                    echo   "</div>";
                    echo "</div><br><br>";
                    
				}
                }else{
                    echo "<center><p class = 'emptypromptsmall' style = 'padding-top:50px;'>You have not bought any trips yet</p></center>";
                }
        ?>
        </div>
    </div>
</body>
	
</html>

<script src = "js/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/masonry.js"></script>
<script src = "js/myjs.js"></script>
<script>
</script>
