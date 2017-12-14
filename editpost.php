<?php
    include("logged_session.php");
	include("sql_connect.php");
    $id = $_GET['post_id'];
    $result = mysqli_query($mysqli, "SELECT * FROM post WHERE post_id = '".$id."'");
    $data = mysqli_fetch_row($result);
    
?>
<html>
<head>
	<title>Edit Profile</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel = "stylesheet" href = "css/animate.min.css">
    <link rel = "stylesheet" href = "css/normalize.min.css">
</head>
<body>
    <!-- User navbar -->
	<?php 
		include("usernav.php");
	?>
    
        <div class="fill signupbox" style="background-color:">
		<div class="text-center">
            <div class = 'row'>
				
				<div>
						<!-- ENCTYPE = MULTIPART/FORM-DATA -->
						<center>
						<form method = 'POST' action = 'updatepost.php' enctype = "multipart/form-data" class = "form-inline">
						    <input type = 'hidden' name = 'post_id' value = '<?php echo $data[0]; ?>'>
                            <!--post_title -->
				            <input type = 'text' name = 'post_title' placeholder='Title' value = '<?php echo $data[5]; ?>'class = ' form-control form-control-gray inputbox' style ="width:800px" required = 'required'><br>
                            <!--post_caption -->
                            <input type = 'text' name = 'post_caption' placeholder='Caption'value = '<?php echo $data[6]; ?>' class = ' form-control form-control-gray inputbox' style ="width:576px" required = 'required'>
                            <!--post_img -->
                            <input type = 'file' name = 'post_img' class = 'form-control form-control-gray inputbox' style = "width : 210px"><br>
                            <!--post_content -->
                            <textarea placeholder = "Share your experience here!"onkeyup="textAreaAdjust(this)" name = 'post_content' class = 'form-control form-control-gray' style = " width : 800px; height: 300px" required = 'required'><?php echo $data[7];?></textarea><br>
                            <!--post_category -->
                            <select name = "post_category"class = 'form-control form-control-gray inputbox' style = "width : 210px" required = 'required' id = "prov_select">
                                <option value = '<?php echo $data[11]; ?>'><?php echo $data[11]; ?></option>
                                <option value="1">(!) I don't know</option>
                                <?php
                                    
                                    $result = mysqli_query($mysqli, "SELECT * FROM provinces");
				                        while( $row = mysqli_fetch_array($result) ){
                                            echo "<option value = '".$row[1]."'>".$row[1]."</option>";
				                        }
                                ?>
                            </select>
                            <!--post_tags -->
                            <input type = 'text' name = 'post_tags' value = '<?php echo $data[12]; ?>' class = ' form-control form-control-gray inputbox' placeholder="Tags e.g.(Beach, Waterfalls, Hike, Swim, etc.)" style ="width:576px"><br>
                            <!--date_posted -->
                            <input type = 'hidden' name = 'date_posted' value = '<?php echo $date; ?>'>
                            <div style = "padding-right: 21%;">
							<!--submit button--> 
                            <input type = 'submit' value = "Submit post"class = 'mybtn signupbtn inputbox pull-right' onclick = "return btnClick();" >
						    </div>
						</form>
						</center>
				</div>
			</div>
	</div>
    </div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
   function btnClick(){
        x = $("#prov_select option:selected").val();
            if(x!="1"){
                return confirm("Submit post?");
            }else{
                alert("Please enter valid province");
                return false;
            }
    }
    $(document).ready(function(){
        //idk select province    
        $('select').change(function() {
            x = $("#prov_select option:selected").val();
            if(x == "1"){
                var rd = prompt("Enter name of place here:", "");
                if(rd!=null){
                    var win = window.open("http://google.com.ph/search?q=What+province+is+"+rd,"_blank")
                    if(win){
                        win.focus();
                    }else{
                        alert('Please allow popups for this website');
                    }
                }
            }
        });
        
        
    });
</script>