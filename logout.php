<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "bin/global-header.php"; ?>
        <title>Logged out</title>
    </head>
    
    <body>
<?php   
    session_start();
    if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] == 0) {
        echo "No valid account is currently logged in.";
    } else {
        $_SESSION["logged-in"] = "0";
        unset($_SESSION["username"]);
        echo "You have been successfully logged out!";
        echo "<br /><a href='/'>Back to Front Page</a>";
    }
?>
    </body>
    
</html>
