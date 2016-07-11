<?php
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions.php";
    
    $c = $_REQUEST['command'];
    
    if($c == "u_create") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        $arg3 = $_REQUEST['arg3'];
        $arg4 = $_REQUEST['arg4'];
        echo u_create($arg1, $arg2, $arg3, $arg4);
    }
    
    if($c == "u_delete") {
        $arg1 = $_REQUEST['arg1'];
        echo u_delete($arg1);
    }
    
    if($c == "u_removeavatar") {
        $arg1 = $_REQUEST['arg1'];
        echo u_removeavatar($arg1);
    }
    
    if($c == "u_avatar") {
        $arg1 = $_REQUEST['arg1'];
        echo u_avatar($arg1);
    }
    
    if($c == "u_setemail") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo u_setemail($arg1, $arg2);
    }
    
    if($c == "u_email") {
        $arg1 = $_REQUEST['arg1'];
        echo u_email($arg1);
    }
    
    if($c == "u_setname") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo u_setname($arg1, $arg2);
    }
    
    if($c == "u_name") {
        $arg1 = $_REQUEST['arg1'];
        echo u_name($arg1);
    }
    
    if($c == "u_setwebsite") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo u_setwebsite($arg1, $arg2);
    }
    
    if($c == "u_website") {
        $arg1 = $_REQUEST['arg1'];
        echo u_website($arg1);
    }
    
    if($c == "u_setusername") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo u_setusername($arg1, $arg2);
    }
    
    if($c == "u_id") {
        $arg1 = $_REQUEST['arg1'];
        echo u_id($arg1);
    }
    
    if($c == "u_setrole") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo u_setrole($arg1, $arg2);
    }
    
    if($c == "u_role") {
        $arg1 = $_REQUEST['arg1'];
        echo u_role($arg1);
    }
    
    if($c == "u_setbio") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo u_setbio($arg1, $arg2);
    }
    
    if($c == "u_bio") {
        $arg1 = $_REQUEST['arg1'];
        echo u_bio($arg1);
    }
    
    /******************* COMMANDS BEGIN HERE *******************/
    function u_create($arg1, $arg2, $arg3, $arg4) {
        if(createUser($arg1, $arg2, $arg3, $arg4)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_delete($arg1) {
        if(deleteUser($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_removeavatar($arg1) {
        if(removeAvatar($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_avatar($arg1) {
        return getAvatar($arg1);
    }
    
    function u_setemail($arg1, $arg2) {
        if(updateEmail($arg1, $arg2)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_email($arg1) {
        return getEmail($arg1);
    }
    
    function u_setname($arg1, $arg2) {
        if(updateName($arg1, str_replace("\%20", " ", $arg2))) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_name($arg1) {
        return getName($arg1);
    }
    
    function u_setwebsite($arg1, $arg2) {
        if(updateWebsite($arg1, $arg2)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_website($arg1) {
        return getWebsite($arg1);
    }
    
    function u_setusername($arg1, $arg2) {
        if(updateUsername($arg1, $arg2)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_id($arg1) {
        return getId($arg1);
    }
    
    function u_setrole($arg1, $arg2) {
        if(updateRole($arg1, $arg2)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_role($arg1) {
        return getRole($arg1);
    }
    
    function u_setbio($arg1, $arg2) {
        if(updateBio($arg1, str_replace("\%20", " ", $arg2))) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function u_bio($arg1) {
        return getBio($arg1);
    }
?>