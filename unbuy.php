<?php
    include("logged_session.php");
	require("sql_connect.php");
    
	if( isset($_GET['trip_id'])){
		$trip_id = $_GET['trip_id'];
        $un = $_SESSION['username'];
        $qry = mysqli_query($mysqli,"SELECT * FROM trip WHERE trip_id='".$trip_id."'");
        $row = mysqli_fetch_row($qry);
          
        $stmt = "DELETE FROM buycnt WHERE trip_id = '".$trip_id."' AND username = '".$un."'";

        $result = mysqli_query($mysqli, $stmt) or die ("Error in query: $query. ".mysqli_error());
        $buys = $row[5] - 1;
        
        
        
        $qry2 = mysqli_query($mysqli,"UPDATE trip SET buyer_cnt= '".$buys."' WHERE trip_id='".$trip_id."'");
        
		if($qry2){
             header("location: tripdetails.php?trip_id=".$trip_id);
            
		}
	}


?>