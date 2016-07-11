<?php
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";

    $id = $_REQUEST['id'];
    
    $connect = connect();
    
    $statement = "SELECT id FROM users";
    
    $status = 0;
    
    if(mysqli_query($connect, $statement)) {
        $result = mysqli_query($connect, $statement);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $idtc = strtolower($row['id']);
                if($idtc == $id) {
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