<?php
$sql = mysqli_connect("localhost", "root", "","bucketlistph");

$res = mysqli_query($sql, "SELECT * FROM comments WHERE post_id='".$_GET['post_id']."'");

if($res){
	//converted into javascript array
	echo json_encode(mysqli_fetch_all($res));
	
}

?>