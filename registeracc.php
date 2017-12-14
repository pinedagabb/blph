<?php

	require("sql_connect.php");
	
	if( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['last_name']) && isset($_POST['password']) ){
		$lname = $_POST['last_name'];
		$fname = $_POST['first_name'];
		$pass = $_POST['password'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		
		//UPLOAD A PICTURE
		if($_FILES['profpic']['error']==0){
			move_uploaded_file($_FILES['profpic']['tmp_name'], 'imgs/useraccounts/'.$username.''.$_FILES['profpic']['name']);
	
		}
		
		$query = "INSERT INTO user 
					   (username, email, first_name, password, last_name, profpic)
					   VALUES 
					   ('".$username. "', '".$email."','".$fname."', '".$pass."', '".$lname."','".$_FILES['profpic']['name']."') 
				";
		
		$result = mysqli_query($mysqli, $query);
		
		if($result){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $lname.", ".$fname;
                $_SESSION['logged'] = true;
                header("location: home.php");
		}else{
			echo '<script type="text/javascript">alert("Username already exists!");</script>';
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign up - BLPH</title>
	<meta charset = "utf-8">
	<link rel="icon" href = "img/icon.ico">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/style.css">
</head>

<body>

	
	</div>

	
	<div class="fill signupbox" style="background-color:">
		<div class="text-center">
			<div class = 'row'>
				
				<div>
						<!-- ENCTYPE = MULTIPART/FORM-DATA -->
						<center>
                            <div class = 'alert alert-danger animated shake'><p>Try again here</p></div>
						<form method = 'POST' action = 'registeracc.php' enctype = "multipart/form-data" class = "form-inline">
						
								<input type = 'text' name = 'first_name' placeholder='First Name' class = 'form-control form-control-gray inputbox' style ="width:320px">
								<input type = 'text' name = 'last_name' placeholder='Last Name' class = 'form-control form-control-gray inputbox' style ="width:320px"><br>
							<!-- input type = 'date' //OR// USE A DATEPICKER PLUG-IN -->
							<input type = 'text' name = 'username' placeholder='Username' class = 'form-control form-control-gray inputbox' style ="width:654px"><br>
							<input type = 'text' name = 'email' placeholder='Email address' class = 'form-control form-control-gray inputbox' style ="width:654px"><br>
							<input type = 'password' name = 'password' placeholder='Password' class = 'form-control form-control-gray inputbox' style ="width:654px"><br>
							<input type = 'file' name = 'profpic' class = 'form-control form-control-gray inputbox' style = "width : 654px"><br>
							<button class = 'mybtn signupbtn inputbox'>Sign up!</button>
						
						</form>
						</center>
				</div>
			</div>
		</div>
	</div>
</body>
	
</html>


<script src = "js/bootstrap.min.js"></script>
<script src = "js/jquery.min.js"></script>
<script src = "js/myjs.js"></script>
<script>
	$(document).ready(function(){
		$("#navsignup").css("color", "#1abc9c");
		
	});
</script>