<?php
    $sql = mysqli_connect("localhost", "root", "","bucketlistph");
        $res = mysqli_query($sql, "SELECT * FROM trip ORDER BY buyer_cnt DESC");

    if($res){
	   //converted into javascript array
	   echo json_encode(mysqli_fetch_all($res));
    }

?>