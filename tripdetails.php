<?php
    include("logged_session.php");
	include("sql_connect.php");
    $id = $_GET['trip_id'];
    $result = mysqli_query($mysqli, "SELECT * FROM trip post WHERE trip_id = '".$id."'");
    $rs = mysqli_query($mysqli, "SELECT * FROM user WHERE username ='".$_SESSION['username']."'");

    $info = mysqli_fetch_row($rs);
    $data = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data[1]; ?></title>
	<meta charset = "utf-8">
	<link rel="icon" href = "img/icon.ico">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/animate.min.css">
    <link rel = "stylesheet" href = "css/normalize.min.css">
    <link rel = "stylesheet" href = "css/sweetalert.css">
    <style>
    </style>
</head>

<body>	
	<?php include("usernav.php") 
    ?>
    
    
    <div class = "container" style = "padding-top:8%;padding-bottom:5%">
        <center>
            
        <?php
            if($info[9] == true){
                echo "<a href = 'edittrip.php?trip_id=".$id."'><button class = 'btn btn-warning' style = 'margin-right:5px;'>EDIT TRIP</button></a><button class = 'btn btn-danger deletetripprompt' style = 'margin-right:0px;'>DELETE TRIP</button></a>";
            }
        ?>
        <div class = "buyercount"></div>
        <div class = "row" style = "width:800px;">
            <p class = "text-center triphead"><?php echo $data[1]?></p>
            <p class = "text-center tripdef"><?php echo $data[2]?></p>
            <img src = "imgs/tripimgs/<?php echo $data[4];?>" style = "width:90%;height:90%;"><br>
            <img src = 'img/postbox/locatico.png' class = 'tripboxico'>
            <span class = 'triploc' style = "font-size:20px;"><?php echo $data[3];?></span>
            <p class = "tripdet" style = "width:700px"><?php echo $data[6] ?></p>
            <?php 
                $existsqry = mysqli_query($mysqli, "SELECT * FROM buycnt
                                            WHERE trip_id='".$id."' 
                                            AND username='".$_SESSION['username']."'");
                if(mysqli_num_rows($existsqry) >0){   
                    echo "<button id= 'reservebtn'class = 'btn btn-success' style = 'letter-spacing:2px;' onclick = 'deleteslot(".$id.");'>RESERVED</button>";        
                }else{
                    echo "<button id= 'reservebtn'class = 'btn btn-success' style = 'letter-spacing:2px;' onclick = 'reserveslot(".$id.");'>RESERVE SLOT</button>";        
                }
            ?>
            
        </div>
        </center>
    </div>
</body>
	
</html>

<script src = "js/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/masonry.js"></script>
<script src = "js/myjs.js"></script>
<script src = "js/sweetalert.min.js"></script>
<script>
var id = <?php echo $id;?>;
$(document).ready(function(){
	setInterval(function(){  checkBuyers(id);}, 500);
});

function reserveslot(data){
    $.ajax({
		url:"buy.php",
		method: "GET",
        data: {
            trip_id :data
        },
		success: function(data){
			$("#reservebtn").html("");
            $("#reservebtn").append("RESERVED");
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}
function deleteslot(data){
    $.ajax({
		url:"unbuy.php",
		method: "GET",
        data: {
            trip_id :data
        },
		success: function(data){
			$("#reservebtn").html("");
            $("#reservebtn").append("RESERVE SLOT");
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}    
    
function checkBuyers(data)
{
	$.ajax({
		url:"getbuyercnt.php",
		method: "GET",
        data: {
            trip_id :data
        },
		success: function(data){
			$(".buyercount").html("");
            $(".buyercount").append("<p style = 'font-size:15px;width:200px;letter-spacing:2px;' class = 'btn-success'>(<strong>"+data+"</strong>) people have availed this package</p>");
		}
		
	});
	
}
    //delete trip prompt
    $(".deletetripprompt").on("click", function(){
        var x=0;
		swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this post!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, 
        function(isConfirm){   
            if (isConfirm) {     
                swal({
                    title:"Deleted!", 
                    text:"Your post has been deleted.", 
                    type: "success"   
                });
                x=1;
            } else {     
                swal("Cancelled", "Your post is safe :)", "error"); return false;
            } 
            if(x==1){
                setTimeout(deleteTrip, 2000);
            }
        });
        
	});

    function deleteTrip(){
        $(location).attr('href','deletetrip.php?trip_id=<?php echo $data[0]?>');
    }
</script>
