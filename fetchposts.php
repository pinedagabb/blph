<?php
    $sql = mysqli_connect("localhost", "root", "","bucketlistph");
        $res = mysqli_query($sql, "SELECT * FROM post ORDER BY date_posted ASC");

    if($res){
	   //converted into javascript array
	   echo json_encode(mysqli_fetch_all($res));
	
    }

?>