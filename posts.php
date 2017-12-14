<?php
    include("logged_session.php");
	include("sql_connect.php");
    $id = $_GET['post_id'];
    $result = mysqli_query($mysqli, "SELECT * FROM post WHERE post_id = '".$id."'");
    
    $data = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data[5]; ?></title>
	<meta charset = "utf-8">
	<link rel="icon" href = "img/icon.ico">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/animate.min.css">
    <link rel = "stylesheet" href = "css/normalize.min.css">
    <link rel = "stylesheet" href = "css/sweetalert.css">
    <style>
        background-color: black;
    </style>
</head>

<body>	
	<?php include("usernav.php") 
    ?>
    
    <!-- Banner of page-->
    <div class="fill headdiv parallax" style="background-image:url('imgs/postimgs/<?php echo $data[1];?>');">
        <center>
        <div class = "postlabel" style = "padding-top: 15%; margin:0px;">
            <div class = "innerpostlabel" style = "background:rgba(0,0, 0, 0.3)">
            <span class = "posthead text-center"><?php echo $data[5];?></span>
                <img src = "img/postbox/line.png"><br>
            <span class = "captionhead text-center"><?php echo $data[6];?></span>
            </div>
            
		</div>
        </center>
        <div id = "blackOverlay"></div>
    </div>
    <?php 
        if($_SESSION['username'] == $data[10]){
            echo "<center><br><a href = 'editpost.php?post_id=".$data[0]."'><button class = 'btn btn-warning' style = 'font-size:12px; font-family: Catam; letter-spacing: 2px;'>EDIT POST</button></a> ";
            echo "<a><button class = 'btn btn-danger deletepostprompt' style = 'font-size:12px; font-family: Catam; letter-spacing: 2px;'>DELETE POST</button></a></center><br>";
        }
    ?>    
    <!-- CHECK , LIKE, AND ADD. CONTENT. AUTHOR-->
    <div class = "container" style = "padding-top: 5%;">
        
        <div class ="text-left" style ="padding-left: 30%; padding-bottom:2%;">
            <span class = "bigico-text"><a onclick = 'checkPost(<?php echo $id; ?>)' style = 'cursor:pointer'><img id = 'check<?php echo $id; ?>'src = "img/postbox/check.png" class = "bigico"></a><span id = 'checkcnt<?php echo $id; ?>'><?php echo $data[9];?></span> people have checked this off their list!</span><br>
            

            <span class = "bigico-text"><a onclick = 'likePost(<?php echo $id;?>)' style = 'cursor:pointer'><img id = 'like<?php echo $id;?>' src = "img/postbox/heart.png" class = "bigico"></a><span id = 'likecnt<?php echo $id; ?>'><?php echo $data[8];?></span> people like this</span><br>

            <span class = "bigico-text"><a onclick = 'addPost(<?php echo $id; ?>)' style = 'cursor:pointer'><img id = 'add<?php echo $id; ?>'src = "img/postbox/add.png" class = "bigico"></a><span id = 'added'>Add this to your list!</span></span><br>
        </div>
        <div class="panel panel-default text-left">
                <p class = "contentpost"><?php echo $data[7];?></p>
        </div>
        <!-- author -->
        <div class = "pull-right">
            <p class = "contentpost">Posted by: <a href = "userprofile.php?user=<?php echo $data[10];?>"><?php echo $data[10];?></a></p><br>
        </div>
    </div>
    
    <!-- COMMENTS & INFO -->
    <div class = "container">
        <div class = "col-md-7">
            <span class = "contentpost"><strong>COMMENTS</strong></span><br>
            <div class="panel panel-default text-left">
                <br>
                <div class= "cont"></div>
                
                <div class = "form-inline">
                    <input type = 'hidden' id = "username"name = 'username' value = '<?php echo $_SESSION['username']; ?>'>
                    <input type = "hidden" id = "post_id" name = 'post_id' value = '<?php echo $id; ?>'>
                    <input type = 'text' id  = "comment" name = 'my_comment' required = 'required' placeholder='Leave a comment here!' class = 'form-control form-control-gray inputbox' style ="width:70%;">
                    <button class = 'mybtn inputbox' onclick="callAjax();" style = "width:25%">Submit</button>			<span id = "success"></span>
                    <span id = "deleted"></span>
                </div>
            </div>
        </div>
        <div class = "col-md-5">
            <span class = "contentpost"><strong>INFO</strong></span><br>
            <div class="panel panel-default text-left" style = "padding: 5%;">
               <div class = "infobox"><img src = "img/postbox/location.png" style = "width: 20px; height: 20px;"> LOCATION: 
                   <a href = "#" style = "color : #26A65B;" class = "infotxt"><?php echo $data[11]; ?></a>
               </div>
                <div class = "infobox"><img src = "img/postbox/earth.png" style = "width: 20px; height: 20px;"> DIVISION: 
                   <a href = "#" style = "color : #26A65B;" class = "infotxt"><?php echo $data[13]; ?></a>
               </div>
               <div class = "infobox"><img src = "img/postbox/author.png" style = "width: 20px; height: 20px;"> AUTHOR: 
                   <a href = "userprofile.php?user=<?php echo $data[10];?>" style = "color : #26A65B;" class = "infotxt"><?php echo $data[10]; ?></a>
               </div>
               <div class = "infobox"><img src = "img/postbox/clock.png" style = "width: 20px; height: 20px;"> DATE POSTED: 
                   <a href = "#" style = "color : #26A65B;" class = "infotxt"><?php echo date("M j, Y", strtotime($data[4])); ?></a>
               </div>
            </div>    
        </div>
    </div>
</body>
	
</html>

<script src = "js/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/masonry.js"></script>
<script src = "js/myjs.js"></script>
<script src = "js/sweetalert.min.js"></script>
<script>
    
    var username = "<?php echo $_SESSION['username']; ?>";
    $(document).ready(function(){
    checkIfLiked(<?php echo $id?>);
    checkIfAdded(<?php echo $id; ?>);   
    checkIfChecked(<?php echo $id; ?>);
	   setInterval(function(){  checkMessage();}, 500);
    });

    function checkMessage()
    {
        $.ajax({
		url:"getcomment.php",
		method: "GET",
		data:{
			post_id: $("#post_id").val()
		},
		dataType: "json",
		success: function(data){
			$(".cont").html("");
			$(data).each(function(key,val){
                // Split timestamp into [ Y, M, D, h, m, s ]
                var t = val[4].split(/[- :]/);
                // Apply each element to the Date function
                var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
                var ds = d.toString();
                var date = ds.split(' ')[1];
                date +=" "+ds.split(' ')[2];
                date+= " "+ds.split(' ')[3];
                var time = ds.split(' ')[4];
                if(username == val[2]){
                    $(".cont").append
                ("<div class = 'contentpost2 cmntbx'><button id = 'btncmnt' value = '"+val[0]+"' onclick = 'deleteComment(this);' class = 'cmnt' style = 'background: none;'><img src = 'img/postbox/x.png' style = 'width:10px;height:15px;'></button><img src = 'imgs/useraccounts/"+val[2]+""+val[5]+"' class = 'commentico'><a href='userprofile.php?user="+val[2]+"'> "+val[6]+"</a><span class = 'pull-right postboxdate comment-time'>"+date+"<br>"+time+"</span><p style = 'padding-top:4px;width:580px;overflow:auto;'>"+val[3]+"</p><hr></div>");    
                }else{
				$(".cont").append
                ("<div class = 'contentpost2'><img src = 'imgs/useraccounts/"+val[2]+""+val[5]+"' class = 'commentico'><a href='userprofile.php?user="+val[2]+"'> "+val[6]+"</a><span class = 'pull-right postboxdate comment-time'>"+date+"<br>"+time+"</span><p style = 'padding-top:4px;width:580px;overflow:auto;'>"+val[3]+"</p><hr></div>");
                }
			});
            
            
		}
		
	   });
	
    }
    function callAjax()
    {
	   //array
	   //url -> in background
	   //e sud ni data ang method get
	   //alert whatever is given by the server
       if($("#comment").val()!=""){ 
	   $.ajax({
           
		  url:"comment.php",
		  method: "GET",
           
		  data:{
              uname: $("#username").val(),
			  comment: $("#comment").val(),
              post_id: $("#post_id").val()
		  },
		  success: function(data){
			 $("#comment").val("");
		  },
		  error: function(data){
              console.log(err);
		  }
	   });
       }else{
           alert("You can not comment nothing.");
       }
    }
    function deleteComment(objButton){
        check = confirm("Delete this comment?");
        if(check == true){
            $.ajax({
                url:"deletecomment.php",
                method: "GET",
           
                data:{
                comment_id : objButton.value
            },
            success: function(data){
            
            }
            });
        }else{
            return false;
        }
    }
    /*
    $(window).scroll(function(){
    $(".fill").css("opacity", 1 - $(window).scrollTop() / 700);
    });
    */
    
    $(document).ready(function(){
       $(window).scroll(function () {
           var currentScrollTop = $(window).scrollTop();
            $('#blackOverlay').css('opacity',currentScrollTop/$('#blackOverlay').height());
       }); 
        
    });
    
        
function checkIfLiked(data){
    var x=data;
    $.ajax({
		url:"checkifliked.php",
		method: "GET",
        data: {
            post_id : data
        },
		success: function(data){
            if(data == "1"){
                   $("#like"+x).attr("src","img/postbox/redheart.png");
            }
        },
        error: function(data){
            console.log("ERROR");
        }
	});
}
    
function likePost(postid){
    var x = postid;
    $.ajax({
		url:"like.php",
		method: "GET",
        data: {
            post_id : postid
        },
		success: function(data){
			if(data == "1"){
                $("#like"+x).attr("src","img/postbox/redheart.png");
                $("#like"+x).removeClass("animated rubberBand");
                $("#like"+x).addClass("animated bounce");
                $("#likecnt"+x).text(parseInt($("#likecnt"+x).text())+1);
            }else{
                $("#like"+x).attr("src","img/postbox/heart.png");
                $("#like"+x).removeClass("animated bounce");
                $("#like"+x).addClass("animated rubberBand");
                $("#likecnt"+x).text(parseInt($("#likecnt"+x).text())-1);
            }
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}
function addPost(postid){
    var x = postid;
    $.ajax({
		url:"addtolist.php",
		method: "GET",
        data: {
            post_id : postid
        },
		success: function(data){
            //console.log(data);
			if(data == "1"){
                $("#add"+x).attr("src","img/postbox/minus.png");
                $("#add"+x).removeClass("animated rubberBand");
                $("#add"+x).addClass("animated bounce");
                $("#added").html("Added to your list!");
            }else{
                $("#add"+x).attr("src","img/postbox/add.png");
                $("#add"+x).removeClass("animated bounce");
                $("#add"+x).addClass("animated rubberBand");
                $("#added").html("Add this to your list!");
            }
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}  
    
function checkIfAdded(data){
    var x=data;
    $.ajax({
		url:"checkifadded.php",
		method: "GET",
        data: {
            post_id : data
        },
		success: function(data){
            if(data == "1"){
                   $("#add"+x).attr("src","img/postbox/minus.png");
                   $("#added").html("Added to your list!");
            }
        },
        error: function(data){
            console.log("ERROR");
        }
	});
}
    function checkPost(postid){
    var x = postid;
    $.ajax({
		url:"check.php",
		method: "GET",
        data: {
            post_id : postid
        },
		success: function(data){
			if(data == "1"){
                $("#check"+x).attr("src","img/postbox/bluecheck.png");
                $("#check"+x).removeClass("animated rubberBand");
                $("#check"+x).addClass("animated bounce");
                $("#checkcnt"+x).text(parseInt($("#checkcnt"+x).text())+1);
            }else{
                $("#check"+x).attr("src","img/postbox/check.png");
                $("#check"+x).removeClass("animated bounce");
                $("#check"+x).addClass("animated rubberBand");
                $("#checkcnt"+x).text(parseInt($("#checkcnt"+x).text())-1);
            }
        },
        error: function(data){
                console.log("ERROR");
        }
	});
}
function checkIfChecked(data){
    var x=data;
    $.ajax({
		url:"checkifchecked.php",
		method: "GET",
        data: {
            post_id : data
        },
		success: function(data){
            if(data == "1"){
                   $("#check"+x).attr("src","img/postbox/bluecheck.png");
            }
        },
        error: function(data){
            console.log("ERROR");
        }
	});
}

//delete post prompt
    $(".deletepostprompt").on("click", function(){
        var x=0;
		swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this post!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, 
        function(isConfirm){   
            if (isConfirm) {     
                swal({
                    title:"Deleted!", 
                    text:"Your post has been deleted.", 
                    type: "success"   
                });
                x=1;
            } else {     
                swal("Cancelled", "Your post is safe :)", "error"); return false;
            } 
            if(x==1){
                setTimeout(deletePost, 2000);
            }
        });
        
	});

    function deletePost(){
        $(location).attr('href','deletepost.php?post_id=<?php echo $data[0]?>');
    }
</script>
