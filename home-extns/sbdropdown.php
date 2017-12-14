<!-- PROVINCES DIV-->
<div class = " searchbox col-md-7" style = "border-right: 1px solid #f0f0f0; border-left: 1px solid #f0f0f0;margin-top: 4%; height: 400px; overflow:auto;">
                        <p class = "sbdrophead">by province</p>
                        <?php 
                           $result = mysqli_query($mysqli, "SELECT * FROM provinces");
                           
				                while( $row = mysqli_fetch_array($result) ){
                                    echo "<div class ='col-md-4' style = 'width:190px;margin:0px;'><input id = '".$row[1]."'name = 'province[]' type = 'checkbox' class = 'provcheck'value = '".$row[1]."'><label for = '".$row[1]."'><p class = 'sbcheck'> ".$row[1]."</p></label></div>";
                                
				                }
                        ?>
                    </div>
                    
<!-- DIVISION & TAGS DIV-->
                    <div class = "col-md-5 searchbox" style = "padding-left: 5%;border-right: 1px solid #f0f0f0; margin-top: 4%; height: 400px; overflow:auto;">
                            <p class = "sbdrophead">
                            <!-- X BTN -->    
                            <span id = "hidesbox"class = "btn-danger pull-right" style = "padding-left:10px;padding-right:10px;border:1px solid #f0f0f0">X</span>
                            <!-- CLEAR BTN -->
                            <span id = "clearcheck"class = "btn-warning pull-right" style = "padding-left:10px;padding-right:20px;border:1px solid #f0f0f0">CLEAR</span></p><br><br><br>
                        <div>
                            <div class = "col-md-6">
                            <p class = "sbdrophead">division</p>
                            <input class = 'divcheck' name = 'division[]' id = 'Luzon' type = 'checkbox' value = 'Luzon' style = "margin-left:0px;"><label for = 'Luzon'><p class = 'sbdiv'>LUZON</p></label><br>
                            <input class = 'divcheck' name = 'division[]' id = 'Visayas'type = 'checkbox' value = 'Visayas' style = "margin-left:0px;"><label for = 'Visayas'><p class = 'sbdiv'>VISAYAS</p></label><br>
                            <input class = 'divcheck' name = 'division[]'type = 'checkbox' id = 'Mindanao'value = 'Mindanao' style = "margin-left:0px;"><label for = 'Mindanao'><p class = 'sbdiv'>MINDANAO</p></label><br><br>
                            </div>
                            <div class ="col-md-6">
                                <p class = "sbdrophead">sort by</p>
                            <input class = 'postlikes' name = 'user[]' id = 'Likes' type = 'checkbox' value = 'Likes' style = "margin-left:0px;"><label for = 'Likes'><p class = 'sbdiv'>LIKES</p></label><br>
                            <input class = 'postchecks' name = 'user[]' id = 'Checks'type = 'checkbox' value = 'Checks' style = "margin-left:0px;"><label for = 'Checks'><p class = 'sbdiv'>CHECKS</p></label><br>
                                <p style = "padding-bottom:20px;"></p><br><br>
                            </div>
                            </div>
                        
                
                            <p class = "sbdrophead">popular tags</p>
                            <div class= "col-md-5">
                                <input class = 'tagcheck' id = 'Beach'name = 'tags[]'type = 'checkbox' value = 'Beach'><label for = 'Beach'><p class = 'sbdiv'>Beach</p></label><br>
                                <input class = 'tagcheck'  id = 'Hike'name = 'tags[]'type = 'checkbox' value = 'Hike'><label for = 'Hike'><p class = 'sbdiv'>Hike</p></label><br>
                                <input class = 'tagcheck' id = 'Waterfalls'name = 'tags[]'type = 'checkbox' value = 'Waterfalls'><label for = 'Waterfalls'><p class = 'sbdiv'>Waterfalls</p></label><br>
                                <input class = 'tagcheck'id = 'Corals' name = 'tags[]'type = 'checkbox' value = 'Corals'><label for = 'Corals'><p class = 'sbdiv'>Corals</p></label><br>    
                            </div>
                            <div class= "col-md-5">
                                <input class = 'tagcheck'  id = 'Cave'name = 'tags[]'type = 'checkbox' value = 'Cave'><label for = 'Cave'><p class = 'sbdiv'>Caves</p></label><br>
                                <input class = 'tagcheck'  id = 'Scenery'name = 'tags[]'type = 'checkbox' value = 'Scenery'><label for = 'Scenery'><p class = 'sbdiv'>Scenery</p></label><br>
                                <input class = 'tagcheck' id = 'Off-road'name = 'tags[]' type = 'checkbox' value = 'Off-road'><label for = 'Off-road'><p class = 'sbdiv'>Off-road</p></label><br>
                                <input class = 'tagcheck' id = 'Surf'name = 'tags[]' type = 'checkbox' value = 'Surf'><label for = 'Surf'><p class = 'sbdiv'>Surf</p></label><br>
                            </div>
                    </div>