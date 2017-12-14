<?php
    include("logged_session.php");
	require("sql_connect.php");

	if(isset($_POST['post_title']) && isset($_POST['post_content']) && isset($_POST['post_caption'])
       && isset($_POST['post_category']) && isset($_POST['post_tags']) ){
		$title = $_POST['post_title'];
        $caption = $_POST['post_caption'];
        $content = $_POST['post_content'];
		$category = $_POST['post_category'];
        $tags = $_POST['post_tags'];
        $date = $_POST['date_posted'];
        $author = $_SESSION['username'];
        $prov = mysqli_query($mysqli,"SELECT *FROM provinces WHERE province_name='".$category."'");
        $division = mysqli_fetch_row($prov);
        $div = $division[2];
        
        
		if($_FILES['post_img']['error']==0){
			move_uploaded_file($_FILES['post_img']['tmp_name'], 'imgs/postimgs/'.$_FILES['post_img']['name']);
		}else{
            console.log("erroruploadingfile");
        }
	
        $query = 'INSERT INTO post 
					   (post_id, pic1, date_posted, post_title, post_caption, post_content, post_author, post_category, post_tags,post_division)
					   VALUES 
					   (NULL,"'.$_FILES['post_img']['name'].'","'.$date.'", "'.$title.'","'.$caption.'","'.$content.'","'.$author.'"
                       ,"'.$category.'","'.$tags.'","'.$div.'")';
	
        
        $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
        
        
		if($result){
			header("location: allposts.php");
		}else{
            //$error = mysql_error();
			//echo $error;
		}
	}


?>