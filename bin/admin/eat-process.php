<?php

    $name = $_POST["user"];
    $id = 0;
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    $connect = connect();
    
    $statement = "SELECT id
    FROM users
    WHERE username='$name'";
    
    if(mysqli_query($connect, $statement)) {
        $result = mysqli_query($connect, $statement);
        if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
        }
    }
    } else {
        echo mysqli_error($connect);
    }

    $dir = "images/avatars/";
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . $dir;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded due to an unknown error.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $id . "." . $imageFileType)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    $statement = "UPDATE users
    SET avatar='" . $dir . $id . "." . $imageFileType . "' 
    WHERE username='$name'";
    
    if(mysqli_query($connect, $statement)) {
        echo "<br />Avatar was updated successfully.";
    } else {
        echo "Error performing task: " . mysqli_error($connect);
    }
                
    mysqli_close($connect);
    
    session_start();

    if($_SESSION["username"] == $name) {
        $_SESSION["avatar"] == "/" . $dir . $id . "." . $imageFileType;
    }
?>