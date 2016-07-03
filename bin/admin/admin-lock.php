<?php
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    session_start();
    if(!isset($_SESSION['logged-in']) || $_SESSION['logged-in'] == 0) {
        header("Location: /");
    } else if($_SESSION['logged-in'] == 1) {
        $user = $_SESSION['username'];
        $result = runRoleCheck($user, 3);
        if($result == 1) {
            //Do nothing
        } else {
            header("Location: /");
        }
    }
?>