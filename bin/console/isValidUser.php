<?php
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";

    $u = $_REQUEST['u'];
    $u = strtolower($u);
    
    $connect = connect();
    
    $statement = "SELECT username FROM users";
    
    $status = 0;
    
    if(mysqli_query($connect, $statement)) {
        $result = mysqli_query($connect, $statement);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $utc = strtolower($row['username']);
                if($utc == $u) {
                    $status = 1;
                }
            }
        } else {
            $status = 0;
        }
    }
    
    if($status == 1) {
        echo 1;
    } else {
        echo "0";
    }
?>