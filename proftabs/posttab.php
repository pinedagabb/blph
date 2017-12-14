<?php 
				$postcnt = 0;
                $ptrs = mysqli_query($mysqli, "SELECT * FROM post WHERE post_author='".$un."'");
				if(mysqli_num_rows($ptrs)>0){
                    while( $ptrow = mysqli_fetch_array($ptrs) ){
					$postcnt = $postcnt+1;
                    echo "<div class = 'listbox col-md-4 slide'>";
                    echo "<div class = 'captionfade'>";
                    echo "<img src = 'imgs/postimgs/".$ptrow[1]."' style = 'height:200px; width:300px' alt = 'Post img'>";
                    
                    echo "<div class = 'caption text-center' style = 'background: url(img/postbox/trans.png);'>";
                    echo "<p class = 'postboxdate' style = 'padding-top: 15%;'>";
                    echo date("M j, Y", strtotime($ptrow[4]));
                    echo "</p>";
                    echo "<p>".$ptrow[6]."</p>";
                    echo "<img src= 'img/postbox/check.png' class = 'ico'><span class = 'icotxtlist'>".$ptrow[9]."</span>
                            <img src= 'img/postbox/heart.png' class = 'ico'><span class = 'icotxtlist'>".$ptrow[8]."</span>
                            <img src= 'img/postbox/whiteadd.png' class = 'ico check'>
                        </div>";
                    echo "</div>";
                    echo "<p class = 'listheader'><a href = 'posts.php?post_id=".$ptrow[0]."' style = 'color: #141414;'>".$ptrow[5]."</a></p>";
                    echo "</div>";
                    
				}
                }else{
                    echo "<p class = 'emptypromptsmall'>User has not posted anything yet.</p>";
                }
?>