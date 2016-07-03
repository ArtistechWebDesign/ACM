<?php 
    $user = $_POST["username"];
    echo $user;
    header("Location: /profile.php?u=" . $user);
?>