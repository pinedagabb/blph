<?php 
				$ccnt = 0;
                $crs = mysqli_query($mysqli, "SELECT * FROM checks WHERE username='".$un."'");
				if(mysqli_num_rows($crs)>0){
                    while( $crow = mysqli_fetch_array($crs) ){
                    $ccnt = $ccnt +1;
                    $ctmp = mysqli_query($mysqli, "SELECT * FROM post WHERE post_id='".$crow[1]."'");
                    $cdt = mysqli_fetch_row($ctmp);
                    echo "<div class = 'col-md-6 slide'>";
					echo "<div class = 'listbox'>";
                    echo "<div class = 'captionfade'>";
                    echo "<img src = 'imgs/postimgs/".$cdt[1]."' style = 'height:200px; width:300px' alt = 'Post img'>";
                    
                    echo "<div class = 'caption text-center' style = 'background: url(img/postbox/trans.png);'>";
                    echo "<p class = 'postboxdate' style = 'padding-top: 15%;'>";
                    echo date("M j, Y", strtotime($cdt[4]));
                    echo "</p>";
                    echo "<p>".$cdt[6]."</p>";
                    echo "<img src= 'img/postbox/check.png' class = 'ico'><span class = 'icotxtlist'>".$cdt[9]."</span>
                            <img src= 'img/postbox/heart.png' class = 'ico'><span class = 'icotxtlist'>".$cdt[8]."</span>
                            <img src= 'img/postbox/whiteadd.png' class = 'ico check'>
                        </div>";
                    echo "</div>";
                    echo "<p class = 'listheader'><a href = 'posts.php?post_id=".$cdt[0]."' style = 'color: #141414;'>".$cdt[5]."</a></p>";
                    echo "</div>";
                    echo "</div>";
                    
				}
                }else{
                    echo "<p class = 'emptypromptsmall'>Not yet checked anything of his/her list.</p>";
                }
?>