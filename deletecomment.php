<?php
    include("logged_session.php");
	require("sql_connect.php");

	$id = $_GET['comment_id'];
		
		$query = "DELETE from comments 
				        WHERE comment_id = '".$id."'";
		
	
        
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());

        
		if($result){
            echo "SUCCESS";
            //header("location: posts.php?post_id=".$_GET['post_id']);
		}else{
            //$error = mysql_error();
			//echo $error;
		}


?>