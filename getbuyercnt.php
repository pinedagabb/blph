<?php
    include("logged_session.php");
	require("sql_connect.php");
    
	if( isset($_GET['trip_id'])){
		$trip_id = $_GET['trip_id'];
        $qry = mysqli_query($mysqli,"SELECT * FROM trip WHERE trip_id='".$trip_id."'");
        $row = mysqli_fetch_row($qry);
        echo $row[5];
	}


?>