<?php
    include("logged_session.php");
	require("sql_connect.php");
	
	if( isset($_POST['password']) && isset($_POST['email']) && isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['dob']) ){
		$lname = $_POST['last_name'];
		$fname = $_POST['first_name'];
		$dob = $_POST['dob'];
		$pass = $_POST['password'];
		$username = $_POST['username'];
		$email = $_POST['email'];
        $location = $_POST['location'];
        $desc = $_POST['user_desc'];
		
        if(!empty($_FILES['profpic']['error']==0)){
			move_uploaded_file($_FILES['profpic']['tmp_name'], 'imgs/useraccounts/'.$username.''.$_FILES['profpic']['name']);
		      $query = "UPDATE user 
					   SET first_name ='".$fname."',
                        last_name ='".$lname."',
                        dob ='".$dob."',
                        password ='".$pass."',
                        email ='".$email."',
                        user_desc = '".$desc."',
                        address = '".$location."',
                        profpic ='".$_FILES['profpic']['name']."'
                       
                        
                       WHERE username ='".$username."'
				";
        }else{
        
		$query = "UPDATE user 
					   SET first_name ='".$fname."',
                        last_name ='".$lname."',
                        dob ='".$dob."',
                        password ='".$pass."',
                        email ='".$email."',
                        user_desc = '".$desc."',
                        address = '".$location."'
                       WHERE username ='".$username."'
				";
        }
		$result = mysqli_query($mysqli, $query);
        
		if($result){
			header("location: userprofile.php?user=".$username);
		}else{
			echo "Insertion error! Please contact admin!";
			exit();
		}
	}


?>