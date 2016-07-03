<?php 
    $page = $_POST["page"];
    $new_content = $_POST["new_content"];
    
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    $connect = connect();
    
    $statement = "UPDATE pages
    SET content='$new_content' 
    WHERE name='$page'";
    
    if(mysqli_query($connect, $statement)) {
        echo "Values have been updated successfully!";
    } else {
        echo "Error performing task: " . mysqli_error($connect);
    }
    
    mysqli_close($connect);
?>