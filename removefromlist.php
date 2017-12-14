<?php
    include("logged_session.php");
	require("sql_connect.php");
    
	if( isset($_GET['post_id'])){
		$post_id = $_GET['post_id'];
        $un = $_SESSION['username'];
		
    	$stmt = "DELETE FROM bucketlist WHERE post_id = '".$post_id."' AND username = '".$un."'";
        
        $result = mysqli_query($mysqli, $stmt) or die ("Error in query: $query. ".mysqli_error());
        
		if($result){
			header("location: mylist.php");
		}else{
            $error = mysql_error();
			echo $error;
		}
	}


?>