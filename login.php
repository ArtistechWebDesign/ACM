<?php 
    session_start();
    
    if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == 1) {
        echo "You are already logged in!";
        echo "<br /><a href='/'>Back to Front Page</a>";
    } else {
        include "/login-form.php";
    }    
?>