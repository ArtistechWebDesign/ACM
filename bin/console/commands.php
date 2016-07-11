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
    
    if($c == "p_create") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        $arg3 = $_REQUEST['arg3'];
        echo p_create($arg1, $arg2, $arg3);
    }
    
    if($c == "p_delete") {
        $arg1 = $_REQUEST['arg1'];
        echo p_delete($arg1);
    }
    
    if($c == "p_setcontent") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo p_setcontent($arg1, $arg2);
    }
    
    if($c == "p_content") {
        $arg1 = $_REQUEST['arg1'];
        echo p_content($arg1);
    }
    
    if($c == "p_settitle") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo p_settitle($arg1, $arg2);
    }
    
    if($c == "p_title") {
        $arg1 = $_REQUEST['arg1'];
        echo p_title($arg1);
    }
    
    if($c == "p_enable") {
        $arg1 = $_REQUEST['arg1'];
        echo p_enable($arg1);
    }
    
    if($c == "p_disable") {
        $arg1 = $_REQUEST['arg1'];
        echo p_disable($arg1);
    }
    
    if($c == "p_custom") {
        $arg1 = $_REQUEST['arg1'];
        echo p_custom($arg1);
    }
    
    if($c == "p_status") {
        $arg1 = $_REQUEST['arg1'];
        echo p_status($arg1);
    }
    
    if($c == "s_setactivedesign") {
        $arg1 = $_REQUEST['arg1'];
        echo s_setactivedesign($arg1);
    }
    
    if($c == "s_activedesign") {
        echo s_activedesign();
    }
    
    if($c == "s_setrolename") {
        $arg1 = $_REQUEST['arg1'];
        $arg2 = $_REQUEST['arg2'];
        echo s_setrolename($arg1, $arg2);
    }
    
    if($c == "s_rolename") {
        $arg1 = $_REQUEST['arg1'];
        echo s_rolename($arg1);
    }
    
    if($c == "s_setfrontpage") {
        $arg1 = $_REQUEST['arg1'];
        echo s_setfrontpage($arg1);
    }
    
    if($c == "s_frontpage") {
        echo s_frontpage();
    }
    
    if($c == "s_setauthor") {
        $arg1 = $_REQUEST['arg1'];
        echo s_setauthor($arg1);
    }
    
    if($c == "s_author") {
        echo s_author();
    }
    
    if($c == "s_setauthorhelp") {
        $arg1 = $_REQUEST['arg1'];
        echo s_setauthorhelp($arg1);
    }
    
    if($c == "s_authorhelp") {
        echo s_authorhelp();
    }
    
    /******************* COMMANDS BEGIN HERE *******************/
    
    //USERS
    
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
    
    //PAGES
    
    function p_create($arg1, $arg2, $arg3) {
        if(createPage($arg1, $arg2, $arg3)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function p_delete($arg1) {
        if(deletePage($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function p_setcontent($arg1, $arg2) {
        if(setPageContent($arg1, str_replace("\%20", " ", $arg2))) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function p_content($arg1) {
        return getPageContent($arg1);
    }
    
    function p_settitle($arg1, $arg2) {
        if(setPageTitle($arg1, str_replace("\%20", " ", $arg2))) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function p_title($arg1) {
        return getPageTitle($arg1);
    }
    
    function p_enable($arg1) {
        if(enablePage($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function p_disable($arg1) {
        if(disablePage($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function p_status($arg1) {
        return getPageStatus($arg1);
    }
    
    function p_custom($arg1) {
        return getCustom($arg1);
    }
    
    //SITE SETTINGS
    
    function s_setactivedesign($arg1) {
        if(setActiveDesign($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function s_activedesign() {
        return getActiveDesign();
    }
    
    function s_setrolename($arg1, $arg2) {
        if(setRoleName($arg1, $arg2)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function s_rolename($arg1) {
        return getRoleName($arg1);
    }
    
    function s_setfrontpage($arg1) {
        if(setFrontPageEnabled($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function s_frontpage() {
        return getFrontPageEnabled();
    }
    
    function s_setauthor($arg1) {
        if(setAuthor(str_replace("%20", " ", $arg1))) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function s_author() {
        return getAuthor();
    }
    
    function s_setauthorhelp($arg1) {
        if(setAuthorHelp($arg1)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    function s_authorhelp() {
        return getAuthorHelp();
    }
?>