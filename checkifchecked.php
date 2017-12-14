<?php 
    include("logged_session.php");
	require("sql_connect.php");
    $existsqry = mysqli_query($mysqli, "SELECT * FROM checks
                        WHERE post_id='".$_GET['post_id']."' 
                        AND username='".$_SESSION['username']."'");
    if(mysqli_num_rows($existsqry) >0){   
        echo "1";
    }else{
        echo "0";
    }
?>