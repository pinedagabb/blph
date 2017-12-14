<?php
    include("logged_session.php");
	require("sql_connect.php");

	$id = $_GET['post_id'];
		
		$query = "DELETE from post 
				        WHERE post_id = '".$id."'";
		
	
        
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
        $bl = "DELETE from bucketlist WHERE post_id = '".$id."'";
        $blrs = mysqli_query($mysqli, $bl) or die ("Error in query: $query. ".mysqli_error());
        $checks = "DELETE from checks WHERE post_id = '".$id."'";
        $checksrs = mysqli_query($mysqli, $checks) or die ("Error in query: $query. ".mysqli_error());
        $likes = "DELETE from likes WHERE post_id = '".$id."'";
        $likesrs = mysqli_query($mysqli, $likes) or die ("Error in query: $query. ".mysqli_error());

        
		if($result){
			header("location: allposts.php");
		}else{
            //$error = mysql_error();
			//echo $error;
		}


?>