<?php
    include("logged_session.php");
	require("sql_connect.php");

	$id = $_GET['trip_id'];
		
		$query = "DELETE from trip 
				        WHERE trip_id = '".$id."'";
		
	
        
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
        
		if($result){
			header("location: trips.php");
		}else{
            //$error = mysql_error();
			//echo $error;
		}


?>