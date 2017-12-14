<?php
    if(isset($_POST['un']) && isset($_POST['pw'])){
        include("sql_connect.php");
        $qry = mysqli_query($mysqli, "SELECT * FROM user
                                      WHERE username = '".$_POST['un']."'
                                      AND password = '".$_POST['pw']."'
                                      ");
        if(mysqli_num_rows($qry) == 1){
            session_start();
            $info = mysqli_fetch_row($qry);
            $_SESSION['username'] = $info[0];
            $_SESSION['name'] = $info[4].", ".$info[2];
            $_SESSION['logged'] = true;
            echo "1";
        }else{
            $invalid = true;
            echo "0";
        }
        
    }
?>