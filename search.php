<?php
    //$str = "SELECT * FROM post WHERE ";
    
    
    //province and division and tags
    if(isset($_POST['provopt']) && isset($_POST['dopt']) && isset($_POST['tagopt'])){
        $str = "SELECT * FROM post WHERE (";
        foreach($_POST['provopt'] as $check){
            $str .= " post_category = '";
            $str .= "$check" ;
            $str .= "' OR  ";
        }
        foreach($_POST['dopt'] as $ck){
            $str .= " post_division = '";
            $str .= "$ck" ;
            $str .= "' OR";
        }
        $str = substr($str, 0,-3);
        $str .=") AND(";
        foreach($_POST['tagopt'] as $check){
            $str .= " post_tags LIKE '%";
            $str .= "$check" ;
            $str .= "%' OR";
        }
        $string = substr($str, 0, -3);
        $string .=")";
        if(isset($_POST['userinput'])){
            $string .= "AND (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
        }
        if(isset($_POST['pchecks'])){
            $string .= "ORDER BY post_checks ASC";
        }else if(isset($_POST['plikes'])){
            $string .= "ORDER BY post_likes ASC";
        }
        echo("$string");
    
    //province and division
    }else if(isset($_POST['provopt']) && isset($_POST['dopt']) && !isset($_POST['tagopt'])){
        $str = "SELECT * FROM post WHERE";
        foreach($_POST['provopt'] as $check){
            $str .= " post_category = '";
            $str .= "$check" ;
            $str .= "' OR ";
        }
        foreach($_POST['dopt'] as $ck){
            $str .= " post_division = '";
            $str .= "$ck" ;
            $str .= "' OR ";
        }
        $string = substr($str, 0, -3);
        if(isset($_POST['userinput'])){
            $string .= "AND (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
        }
        if(isset($_POST['pchecks'])){
            $string .= "ORDER BY post_checks ASC";
        }else if(isset($_POST['plikes'])){
            $string .= "ORDER BY post_likes ASC";
        }
        echo("$string");
    
    //division and tag
    }else if(!isset($_POST['provopt']) && isset($_POST['dopt']) && isset($_POST['tagopt'])){
        $str = "SELECT * FROM post WHERE(";
        foreach($_POST['dopt'] as $check){
            $str .= " post_division = '";
            $str .= "$check" ;
            $str .= "' OR ";
        }
        $str = substr($str, 0,-3);
        $str .=") AND (";
        foreach($_POST['tagopt'] as $check){
            $str .= " post_tags LIKE '%";
            $str .= "$check" ;
            $str .= "%' OR ";
        }
        $string = substr($str, 0, -3);
        $string .=") ";
        if(isset($_POST['userinput'])){
            $string .= "AND (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
        }
        if(isset($_POST['pchecks'])){
            $string .= "ORDER BY post_checks ASC";
        }else if(isset($_POST['plikes'])){
            $string .= "ORDER BY post_likes ASC";
        }
        echo("$string");
    
    //province and tag
    }else if(isset($_POST['provopt']) && !isset($_POST['dopt']) && isset($_POST['tagopt'])){
        $str = "SELECT * FROM post WHERE(";
        foreach($_POST['provopt'] as $check){
            $str .= " post_category = '";
            $str .= "$check" ;
            $str .= "' OR ";
        }
        $str = substr($str, 0,-3);
        $str .=") AND (";
        foreach($_POST['tagopt'] as $ck){
            $str .= " post_tags LIKE '%";
            $str .= "$ck" ;
            $str .= "%' OR ";
        }
        $string = substr($str, 0, -3);
        $string .=") ";
        if(isset($_POST['userinput'])){
            $string .= "AND (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
        }
        if(isset($_POST['pchecks'])){
            $string .= "ORDER BY post_checks ASC";
        }else if(isset($_POST['plikes'])){
            $string .= "ORDER BY post_likes ASC";
        }
        echo("$string");
        
    //only province
    }else if(isset($_POST['provopt']) && !isset($_POST['dopts']) && !isset($_POST['tagopt'])){
        $str = "SELECT * FROM post WHERE";
        foreach($_POST['provopt'] as $check){
            $str .= " post_category = '";
            $str .= "$check" ;
            $str .= "' OR";
        }
        $string = substr($str, 0, -3);
        if(isset($_POST['userinput'])){
            $string .= "AND (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
        }
        if(isset($_POST['pchecks'])){
            $string .= "ORDER BY post_checks ASC";
        }else if(isset($_POST['plikes'])){
            $string .= "ORDER BY post_likes ASC";
        }
        echo("$string");
        
    //onlydivision
    }else if(!isset($_POST['provopt']) && isset($_POST['dopt']) && !isset($_POST['tagopt'])){
        $str = "SELECT * FROM post WHERE";
        foreach($_POST['dopt'] as $check){
            $str .= " post_division = '";
            $str .= "$check" ;
            $str .= "' OR";
        }
        $string = substr($str, 0, -3);
        if(isset($_POST['userinput'])){
            $string .= "AND (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
        }
        if(isset($_POST['pchecks'])){
            $string .= "ORDER BY post_checks ASC";
        }else if(isset($_POST['plikes'])){
            $string .= "ORDER BY post_likes ASC";
        }
        echo("$string");
    //only tags
    }else if(!isset($_POST['provopt']) && !isset($_POST['dopt']) && isset($_POST['tagopt'])){
        $str = "SELECT * FROM post WHERE";
        foreach($_POST['tagopt'] as $check){
            $str .= " post_tags LIKE '%";
            $str .= "$check" ;
            $str .= "%' OR";
        }
        $string = substr($str, 0, -3);
        if(isset($_POST['userinput'])){
            $string .= "AND (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
        }
        if(isset($_POST['pchecks'])){
            $string .= "ORDER BY post_checks ASC";
        }else if(isset($_POST['plikes'])){
            $string .= "ORDER BY post_likes ASC";
        }
        echo("$string");
    //none
    }else{
        if(isset($_POST['userinput'])){
            $str = "SELECT * FROM post WHERE (post_title LIKE '%".$_POST['userinput']."%' OR post_caption LIKE '%".$_POST['userinput']."%' OR post_category LIKE '%".$_POST['userinput']."%' OR post_division LIKE '%".$_POST['userinput']."%' OR post_tags LIKE '%".$_POST['userinput']."%')";
                    if(isset($_POST['pchecks'])){
                            $str .= "ORDER BY post_checks ASC";
                    }else if(isset($_POST['plikes'])){
                            $str .= "ORDER BY post_likes ASC";
                    }
            echo("$str");
        }else{
            $str = "SELECT * FROM post";
                    if(isset($_POST['pchecks'])){
                            $str .= " ORDER BY post_checks ASC";
                    }else if(isset($_POST['plikes'])){
                            $str .= " ORDER BY post_likes ASC";
                    }
            echo("$str");
        }
    }
    
?>