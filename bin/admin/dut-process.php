<?php 
    $user = $_POST["username"];
    
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    $connect = connect();
    
    $statement = "DELETE FROM users 
    WHERE username='$user'";
    
    if(mysqli_query($connect, $statement)) {
        echo "The user \"" . $user . "\" was deleted successfully!";
    } else {
        echo "Error performing task: " . mysqli_error($connect);
    }
    
    mysqli_close($connect);
    
    session_start();
   
    if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == 1) {
        if($_SESSION["username"] == $user) {
            echo "Your account has been deleted. You are now logged out.";
            $_SESSION["logged-in"] = 0;
            $_SESSION["username"] = "";
            $_SESSION["avatar"] = "";
        }
    }
?>

