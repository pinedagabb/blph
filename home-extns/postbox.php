<?php 
				$result = mysqli_query($mysqli, "SELECT * FROM post");
				while( $row = mysqli_fetch_array($result) ){
					echo "<div class = 'postbox slide col-md-4'>";
                    
                    echo "<img src = 'imgs/postimgs/".$row[1]."' class = 'img-responsive' alt = 'Post img'>";
                    //fade in capt
                    echo "<h3><a href = 'posts.php?post_id=".$row[0]."' style = 'color: #141414;'>".$row[5]."</a></h3>";
                    echo "<p class = 'postboxdate'>";
                    echo date("M j, Y", strtotime($row[4]));
                    echo "</p>";
                    echo "<p>".$row[6]."</p>";
                    echo "<div class = 'pull-right'>
                            <a href = 'check.php?post_id=".$row[0]."&link=".$link."'><img src= 'img/postbox/check.png' class = 'ico'></a><span class = 'icotxt'>".$row[9]."</span>
                            <a href = 'like.php?post_id=".$row[0]."&link=".$link."'><img src= 'img/postbox/heart.png' class = 'ico'></a><span class = 'icotxt'>".$row[8]."</span>";
                    echo    "<a href = 'addtolist.php?post_id=".$row[0]."' class = 'check'><img src= 'img/postbox/add.png' class = 'ico'></a>";
                    echo   "</div>";
                    echo "</div>";
				}
?>