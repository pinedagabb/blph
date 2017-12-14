<?php
    include("logged_session.php");
	require("sql_connect.php");
    $x;

	if( isset($_GET['post_id'])){
		$post_id = $_GET['post_id'];
        $un = $_SESSION['username'];
        $existsqry = mysqli_query($mysqli, "SELECT * FROM checks
                                            WHERE post_id='".$post_id."' 
                                            AND username='".$un."'");
        $qry = mysqli_query($mysqli,"SELECT * FROM post WHERE post_id='".$post_id."'");
        $row = mysqli_fetch_row($qry);
        
        if(mysqli_num_rows($existsqry) >0){   
            $stmt = "DELETE FROM checks WHERE post_id = '".$post_id."' AND username = '".$un."'";

            $result = mysqli_query($mysqli, $stmt) or die ("Error in query: $query. ".mysqli_error());
            $checks = $row[9] - 1;
            $x = "0";
        }else{
            $query = "INSERT INTO checks 
					   (check_id, post_id, username)
					   VALUES 
					   (NULL,'".$post_id."','".$un."')";
		
	
        
            $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
            $checks = $row[9] + 1;
            $x = "1";
        }
        
        
        $qry2 = mysqli_query($mysqli,"UPDATE post SET post_checks = '".$checks."' WHERE post_id='".$post_id."'");
        
		$qry3 = mysqli_query($mysqli,"DELETE FROM bucketlist WHERE post_id ='".$post_id."' AND username = '".$un."'");
        
        echo $x;
	}


?>