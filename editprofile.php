<?php
    include("logged_session.php");
	include("sql_connect.php");
    $un = $_SESSION['username'];
    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '".$un."'");
    
    $data = mysqli_fetch_row($result);
    
?>
<html>
<head>
	<title>Edit Profile</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <!-- User navbar -->
	<?php 
		include("usernav.php");
	?>
    
        <div class="fill" style="background-color:">
		<div class="text-center" style = "padding-top :5%">
            <div style = "padding:8%;">
                    <form method = 'POST' action = 'updateprofile.php' enctype = "multipart/form-data" class = "form-inline">
                    <center>
                    <div class = "col-md-1"></div>
                    <div class = "col-md-3">
                        <?php if($data[6]!=NULL){
                                $img = $data[6];
                                echo "<img src= 'imgs/useraccounts/".$un."".$img."' class = 'profpic'><br>";
                            }
                        ?>
                        <input type = 'file' name = 'profpic' class = 'form-control form-control-gray inputbox' style = "width : 220px"><br>
                    </div>
                    </center>
                
                    <center>
                    <div class = "col-md-7">   
                        <input type = 'text' value = '<?php echo $un; ?>' name = 'username' class = 'form-control form-control-gray inputbox' style ="width:500px;" readonly><br>
                        <input type = 'text' value = '<?php echo $data[4]; ?>' name = 'last_name' placeholder='Last Name' class = 'form-control form-control-gray inputbox' style ="width:244px" required = 'required'>
                        <input type = 'text' value = '<?php echo $data[2]; ?>' name = 'first_name' placeholder='First Name' class = 'form-control form-control-gray inputbox' style ="width:244px"required = 'required'><br>
                        <textarea placeholder = "Brief description of yourself..." name = 'user_desc' class = 'form-control form-control-gray inputbox' style = " width : 500px; height: 80px"required = 'required'><?php echo $data[7];?></textarea><br>
                        <input type = 'text' value = '<?php echo $data[8];?>'name = 'location' placeholder='City/Province of residence' class = 'form-control form-control-gray inputbox' style ="width:244px">
                        <input type = 'text' value = '<?php if($data[5]!="0000-00-00"){echo $data[5];}?>'name = 'dob' placeholder='Birthday (YYYY-MM-DD)' class = 'form-control form-control-gray inputbox' style ="width:244px"><br>
                        <input type = 'text' value = '<?php echo $data[1];?>'name = 'email' placeholder='Email address' class = 'form-control form-control-gray inputbox' style ="width:500px"required = 'required'><br>
				        <input type = 'password' value = '<?php echo $data[3]; ?>'name = 'password' placeholder='Password' class = 'form-control form-control-gray inputbox' style ="width:500px"required = 'required'><br>
                        <button class = 'mybtn signupbtn inputbox' style = "margin-left:30%;">Edit</button>						
                    </div>
					</center>                        
                    </form>
			</div>
	</div>
    </div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>