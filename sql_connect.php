<?php
	$mysqli = new mysqli("localhost", "root", "", "bucketlistph");

	/* check connection */
	if(!$mysqli){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>
