<?php
    include("logged_session.php");
	require("sql_connect.php");
    
	if( isset($_GET['trip_id'])){
		$trip_id = $_GET['trip_id'];
        $un = $_SESSION['username'];
        $existsqry = mysqli_query($mysqli, "SELECT * FROM buycnt
                                            WHERE trip_id='".$trip_id."' 
                                            AND username='".$un."'");
        $qry = mysqli_query($mysqli,"SELECT * FROM trip WHERE trip_id='".$trip_id."'");
        $row = mysqli_fetch_row($qry);
        
        if(mysqli_num_rows($existsqry) >0){   
            
        }else{
            $query = "INSERT INTO buycnt 
					   (buy_id, trip_id, username)
					   VALUES 
					   (NULL,'".$trip_id."','".$un."')";
		
	
        
            $result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error());
            $buys = $row[5] + 1;
            
            $qry2 = mysqli_query($mysqli,"UPDATE trip SET buyer_cnt= '".$buys."' WHERE trip_id='".$trip_id."'");
        
		      if($qry2){
                  header("location: tripdetails.php?trip_id=".$trip_id);
            
		  }
        }
        
        
        
	}


?>