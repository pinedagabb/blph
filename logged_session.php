<?php session_start();
    if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true){
        header("location: index.php");
}
?>