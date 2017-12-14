<?php
    include("logged_session.php");
	require("sql_connect.php");
        $id = $_POST['trip_id'];
		$title = $_POST['trip_name'];
        $desc = $_POST['trip_desc'];
        $content = $_POST['trip_content'];
		$location = $_POST['trip_location'];
        
		if($_FILES['trip_img']['error']==0){
			move_uploaded_file($_FILES['trip_img']['tmp_name'], 'imgs/tripimgs/'.$_FILES['trip_img']['name']);     
            $query = 'UPDATE trip 
					   SET trip_name ="'.$title.'",
                        trip_desc ="'.$desc.'",
                        trip_content ="'.$content.'",
                        trip_location ="'.$location.'",
                        trip_img ="'.$_FILES['trip_img']['name'].'"
                        
                       WHERE trip_id ="'.$id.'"
				';
            
		}else{
		
		      $query = 'UPDATE trip 
					   SET trip_name ="'.$title.'",
                        trip_desc ="'.$desc.'",
                        trip_content ="'.$content.'",
                        trip_location ="'.$location.'"
    
                       WHERE trip_id ="'.$id.'"
				';
		
        }
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
        
        
		if($result){
			header("location: tripdetails.php?trip_id=".$id);
		}else{
            //$error = mysql_error();
			//echo $error;
		}


?>