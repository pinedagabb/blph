<div class="se-pre-con"></div>
<nav class="navbar navbar-default navbar-fixed-top" style = "">
	<div class="container">
	
    <div class="navbar-header" style = "padding-bottom:10px;">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
      <a class="navbar-brand" href="home.php" style= "padding-left:50px;"><img id = "navimg" src = 'img/nav/navlogo.png' style = "width:25%;height:150%;"></a>
    </div>
		<div class="collapse navbar-collapse" id="myNavbar" style = "padding-top:4px;">
		<ul class="nav navbar-nav navbar-right">
            <li class = "dropdown"><a id = "allposts" href="allposts.php" class = "dropbtn">Posts</a>
            <div class="dropdown-content">
                <a href="allposts.php">All posts</a>
                <a href="addpost.php">Add post</a>
                <a href="myposts.php">My posts</a>
            </div>
            </li>
            <li class = "dropdown"><a id = "trips" href="trips.php" class = "dropbtn">Trips</a>
            <div class="dropdown-content">
                <a href="trips.php">All trips</a>
                <a href="mytrips.php">My trips</a>
            </div>
            </li>
            <li class = "dropdown"><a id = "welcname" href="#" class = "dropbtn"><?php echo $_SESSION['username']; ?><span class="caret"></span></a>
            <div class="dropdown-content">
                <a href="userprofile.php?user=<?php echo $_SESSION['username']?>">My Profile</a>
                <a href="mylist.php">My bucketlist</a>
                <a href="mylikes.php">My likes</a>
                <a id = "editprof" href="editprofile.php">Edit Profile</a>
            </div>
            </li>
            <li><a id = "logout" href="logout.php">Log out</a></li>
		</ul>
	</div>
	
	</div>
</nav>