<?php
    include("logged_session.php");
    include("sql_connect.php");
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add trip - BLPH</title>
	<meta charset = "utf-8">
	<link rel="icon" href = "img/icon.ico">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/animate.min.css">
    <link rel = "stylesheet" href = "css/normalize.min.css">
</head>

<body>
	<!-- Guest navbar -->
	<?php 
		include("usernav.php");
	?>
	
	</div>

	
	<div class="fill signupbox" style="background-color:">
		<div class="text-center">
			<div class = 'row'>
				
				<div>
						<!-- ENCTYPE = MULTIPART/FORM-DATA -->
						<center>
						<form method = 'POST' action = 'inserttrip.php' enctype = "multipart/form-data" class = "form-inline">
						    <!--trip_name -->
				            <input type = 'text' name = 'trip_name' placeholder='Trip name' class = 'form-control form-control-gray inputbox' style ="width:800px" required = 'required'><br>
                            <!--trip_desc -->
                            <input type = 'text' name = 'trip_desc' placeholder='Trip description' class = ' form-control form-control-gray inputbox' style ="width:576px" required = 'required'>
                            <!--trip_img -->
                            <input type = 'file' name = 'trip_img' class = 'form-control form-control-gray inputbox' style = "width : 210px" required = 'required'><br>
                            <!--trip_content -->
                            <textarea placeholder = "Give details of your trip here!"onkeyup="textAreaAdjust(this)" name = 'trip_content' class = 'form-control form-control-gray' style = " width : 800px; height: 300px" required = 'required'></textarea><br>
                            
                            <!--trip_location -->
                            <input type = 'text' name = 'trip_location' class = ' form-control form-control-gray inputbox' placeholder="Trip location(s)" style ="width:800px" required= 'required'><br>
                            <!--date_created -->
                            <input type = 'hidden' name = 'date_created' value = '<?php echo $date; ?>'>
                            <div style = "padding-right: 21%;">
							<!--submit button--> 
                            <input type = 'submit' value = 'S U B M I T' onclick = 'return btnClick();' class = 'mybtn signupbtn inputbox pull-right '>
						    </div>
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
	function textAreaAdjust(o) {
    o.style.height = "300px";
    o.style.height = (25+o.scrollHeight)+"px";
    }
</script>