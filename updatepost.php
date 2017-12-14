<?php
    include("logged_session.php");
	require("sql_connect.php");

	if( isset($_POST['post_title']) && isset($_POST['post_content']) && isset($_POST['post_caption'])
       && isset($_POST['post_category']) && isset($_POST['post_tags']) ){
		$title = $_POST['post_title'];
        $caption = $_POST['post_caption'];
        $content = $_POST['post_content'];
		$category = $_POST['post_category'];
        $tags = $_POST['post_tags'];
        $date = $_POST['date_posted'];
        $author = $_SESSION['username'];
        $id = $_POST['post_id'];
        $prov = mysqli_query($mysqli,"SELECT * FROM provinces WHERE province_name='".$category."'");
        $division = mysqli_fetch_row($prov);
        $div = $division[2];
        
		if($_FILES['post_img']['error']==0){
			move_uploaded_file($_FILES['post_img']['tmp_name'], 'imgs/postimgs/'.$_FILES['post_img']['name']);     
            $query = 'UPDATE post 
					   SET post_title ="'.$title.'",
                        post_caption ="'.$caption.'",
                        post_content ="'.$content.'",
                        post_category ="'.$category.'",
                        post_tags ="'.$tags.'",
                        pic1 ="'.$_FILES['post_img']['name'].'",
                        post_division="'.$div.'"
                       
                        
                       WHERE post_id ="'.$id.'"
				';
            
		}else{
		
		      $query = 'UPDATE post 
					   SET post_title ="'.$title.'",
                        post_caption ="'.$caption.'",
                        post_content ="'.$content.'",
                        post_category ="'.$category.'",
                        post_division="'.$div.'",
                        post_tags ="'.$tags.'"
                       
                        
                       WHERE post_id ="'.$id.'"
				';
		
        }
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
        
        
		if($result){
			header("location: posts.php?post_id=".$id);
		}else{
            //$error = mysql_error();
			//echo $error;
		}
	}


?>