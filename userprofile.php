<?php
    include("logged_session.php");
	include("sql_connect.php");
    $un = $_GET['user'];
    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '".$un."'");
    
    $data = mysqli_fetch_row($result);
?>
<html>
<head>
	<title><?php echo $data[0];?>'s Profile</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel = "stylesheet" href = "css/animate.min.css">
    <link rel = "stylesheet" href = "css/normalize.min.css">
</head>
<body>
    <!-- User navbar -->
	<?php 
		include("usernav.php");
	?>
    
    <div class="halffill" style="background-image:url('imgs/useraccounts/<?php echo $data[0]."".$data[6]?>');position:absolute;opacity:0.3">
	</div>
    <div class = "container" style = "padding-top: 6%;">
        <div class = "row" style = "padding-bottom:15%;">
            <center>
                <div class = "col-md-12 slide">
                    <img src = "imgs/useraccounts/<?php echo $data[0]."".$data[6]?>" class = "prof-img img-circle">
                </div>
                <div class = "col-md-12 slide" style = "padding-top:0%;">
                <span class = "profname"><?php echo $data[4].", ".$data[2]; ?></span><br>
                <span class = "profdesc"><?php echo $data[7];?></span><br>
                <img src = "img/postbox/locatico.png" style = "width: 16px; height: 16px;">
                <span class = "profdesc" style = "color : #e74c3c; font-size: 15px; font-family: Gotham;"><?php echo $data[8];?>
                <?php 
                    if($_SESSION['username'] == $un){
                        echo "<a href = 'editprofile.php' style = 'padding-right:20px'><button class = 'btn btn-warning' style = 'font-size:12px; font-family: Catam; letter-spacing: 2px;'>EDIT</button></a>";
                    }
                ?>    
                </span>
                
                </div>
            <center>
        </div>
        <div class = "row">
            <div class = "col-md-2"></div>
            <div class = "col-md-10">
                <div class = "col-md-10 slide">
                <ul class="nav nav-tabs" style = "padding-left: 24%;">
                    <li class = "listtext"><a data-toggle="tab" href="#posts">Posts</a></li>
                    <li class="active listtext"><a data-toggle="tab" href="#list">Bucketlist</a></li>
                    <li class = "listtext"><a data-toggle="tab" href="#completed">Completed</a></li>
                </ul>
                    
                <!-- TABS -->
                <div class="tab-content">
                    <div id="posts" class="tab-pane fade">
                        <p class = "proftabhead text-center" style = "color:#8e44ad;"><?php echo $data[2];?>'s posts
                        (<span id = "postcnt"></span>)
                        </p>
                        <div class = "container col-md-12">
                            <?php include("proftabs/posttab.php") ?>
                        </div>
                    </div>
                    <div id="list" class="tab-pane fade in active">
                        <p class = "proftabhead text-center" style = "color:#2ecc71;"><?php echo $data[2];?>'s bucket list
                        (<span id = "blcnt"></span>)
                        </p>
                        <div class = "container col-md-12">
                            <?php include("proftabs/bltab.php") ?>
                        </div>
                    </div>
                    <div id="completed" class="tab-pane fade">
                        <p class = "proftabhead text-center"><?php echo $data[2];?>'s completed goals
                        (<span id = "checkcnt"></span>)
                        </p>
                        <div class = "container col-md-12">
                            <?php include("proftabs/checktab.php") ?>
                        </div>
                    </div>
                    
                </div>
                </div>
                <div class = "col-md-2"></div>
            </div>
            <div class = "col-md-2"></div>
        </div>
    </div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
$(document).ready(function() {
	$("#blcnt").html(<?php echo $blcnt; ?>);
    $("#postcnt").html(<?php echo $postcnt; ?>);
    $("#checkcnt").html(<?php echo $ccnt; ?>);
    $('.captionfade').hover(
		function(){
			$(this).find('.caption').fadeIn(250);
		},
		function(){
			$(this).find('.caption').fadeOut(250);
		}
	);
});
</script>