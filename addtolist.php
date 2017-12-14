<?php
    include("logged_session.php");
	require("sql_connect.php");
    $x;

	if( isset($_GET['post_id'])){
		$post_id = $_GET['post_id'];
        $un = $_SESSION['username'];
        $existsqry = mysqli_query($mysqli, "SELECT * FROM bucketlist
                                            WHERE post_id='".$post_id."' 
                                            AND username='".$un."'");
        
        if(mysqli_num_rows($existsqry) >0){   
            $stmt = "DELETE FROM bucketlist WHERE post_id = '".$post_id."' AND username = '".$un."'";

            $result = mysqli_query($mysqli, $stmt) or die ("Error in query: $query. ".mysqli_error());
            $x = "0";
        }else{
            $query = "INSERT INTO bucketlist 
					   (bl_id, post_id, username)
					   VALUES 
					   (NULL,'".$post_id."','".$un."')";
		
	
        
            $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
            $x = "1";
        }
        
        
        
        echo $x;
	}


?>