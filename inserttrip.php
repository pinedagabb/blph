<?php
    include("logged_session.php");
	require("sql_connect.php");

	if(isset($_POST['trip_name']) && isset($_POST['trip_desc']) && isset($_POST['trip_content'])
       && isset($_POST['trip_location']) ){
		$title = $_POST['trip_name'];
        $desc = $_POST['trip_desc'];
        $content = $_POST['trip_content'];
		$location = $_POST['trip_location'];
        $date = $_POST['date_created'];
                
		if($_FILES['trip_img']['error']==0){
			move_uploaded_file($_FILES['trip_img']['tmp_name'], 'imgs/tripimgs/'.$_FILES['trip_img']['name']);
		}else{
            console.log("erroruploadingfile");
        }
		
		$query = "INSERT INTO trip(trip_id, trip_name, trip_desc, trip_location, trip_img, trip_content,date_created) VALUES(NULL,'".$title."','".$desc."','".$location."','".$_FILES['trip_img']['name']."','".$content."', '".$date."')";
		
	
        
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
        
        
		if($result){
			header("location: trips.php");
		}else{
            //$error = mysql_error();
			//echo $error;
		}
	}


?>