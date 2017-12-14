<?php 
				$blcnt = 0;
                $rs = mysqli_query($mysqli, "SELECT * FROM bucketlist WHERE username='".$un."'");
				if(mysqli_num_rows($rs)>0){
                    while( $row = mysqli_fetch_array($rs) ){
                    $blcnt = $blcnt +1;
                    $tmp = mysqli_query($mysqli, "SELECT * FROM post WHERE post_id='".$row[1]."'");
                    $dt = mysqli_fetch_row($tmp);
                    echo "<div class = 'col-md-6 slide'>";
					echo "<div class = 'listbox'>";
                    echo "<div class = 'captionfade'>";
                    echo "<img src = 'imgs/postimgs/".$dt[1]."' style = 'height:200px; width:300px' alt = 'Post img'>";
                    
                    echo "<div class = 'caption text-center' style = 'background: url(img/postbox/trans.png);'>";
                    echo "<p class = 'postboxdate' style = 'padding-top: 15%;'>";
                    echo date("M j, Y", strtotime($dt[4]));
                    echo "</p>";
                    echo "<p>".$dt[6]."</p>";
                    echo "<img src= 'img/postbox/check.png' class = 'ico'><span class = 'icotxtlist'>".$dt[9]."</span>
                            <img src= 'img/postbox/heart.png' class = 'ico'><span class = 'icotxtlist'>".$dt[8]."</span>
                            <img src= 'img/postbox/whiteadd.png' class = 'ico check'>
                        </div>";
                    echo "</div>";
                    echo "<p class = 'listheader'><a href = 'posts.php?post_id=".$dt[0]."' style = 'color: #141414;'>".$dt[5]."</a></p>";
                    echo "</div>";
                    echo "</div>";
                    
				}
                }else{
                    echo "<p class = 'emptypromptsmall'>Not added anything in his/her bucketlist</p>";
                }
?>