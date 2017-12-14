<?php
    $sql = mysqli_connect("localhost", "root", "","bucketlistph");
    $qry = $_GET['query'];
    $res = mysqli_query($sql, "$qry");
    if($res){
	   //converted into javascript array
	   echo json_encode(mysqli_fetch_all($res));
	
    }

?>