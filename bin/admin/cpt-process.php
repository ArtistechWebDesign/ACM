<?php 
    $name = $_POST["name"];
    $url = $_POST["url"];
    
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    $connect = connect();
    
    $statement = "INSERT INTO pages (name, content, url)
    VALUES ('$name', 'Default page content.', '$url')";
    
    if(mysqli_query($connect, $statement)) {
        
    } else {
        echo "Error performing task: " . mysqli_error($connect);
    }
    
    mysqli_close($connect);
    
    mkdir($_SERVER['DOCUMENT_ROOT'] . $url);
    $newfile = fopen($_SERVER['DOCUMENT_ROOT'] . $url . "/index.php", "w");
    fwrite($newfile, 
    "<?php
        include \$_SERVER['DOCUMENT_ROOT'] . 'settings/active-design.php';
        \$page_name = \"$name\";
        include \$_SERVER['DOCUMENT_ROOT'] . 'designs/' . \$active_design . '/page.php';
    ?>");
    fclose($newfile);
    
    echo "The page \"" . $name . "\" was created successfully!";
?>