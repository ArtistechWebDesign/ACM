<?php 
    $user = $_POST["username"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $name = $_POST["name"];
    $role = $_POST["role"];
    $website = $_POST["website"];
    
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    $connect = connect();
    
    $statement = "INSERT INTO users (username, email, password, name, role, website)
    VALUES ('$user', '$email', '$pass', '$name', '$role', '$website')";
    
    if(mysqli_query($connect, $statement)) {
        echo "The user \"" . $user . "\" was created successfully!";
    } else {
        echo "Error performing task: " . mysqli_error($connect);
    }
    
    mysqli_close($connect);
?>