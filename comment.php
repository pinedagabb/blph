<?php
    include("logged_session.php");
	require("sql_connect.php");

    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d h:i:s', time());
	
    if( isset($_GET['comment'])){
        
		$un = $_SESSION['username'];
        $comment = $_GET['comment'];
        $post_id = $_GET['post_id'];
        $pic = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '".$un."'");
        $userpic = mysqli_fetch_row($pic);
        $userphoto = $userpic[6];
        $name = $userpic[4].", ".$userpic[2];
		$query = "INSERT INTO comments
					   (comment_id, post_id, username, comment, date, userprofpic, name_user)
					   VALUES 
					   (NULL,'".$post_id."','".$un."', '".$comment."','".$date."', '".$userphoto."','".$name."')";
		
	
        
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
        
        
        
		if($result){
			echo "<div class = 'alert alert-success'>SUCCESS!</div>";
		}else{
            //$error = mysql_error();
			//echo $error;
		}
	}


?>