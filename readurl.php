<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "bin/functions.php";
    $ad = getActiveDesign();

    $url =  $_SERVER['REQUEST_URI'];
    
    $connect = connect();
    
    $rp = 0;
    
    $statement = "SELECT url FROM pages";
    if(mysqli_query($connect, $statement)) {
        $result = mysqli_query($connect, $statement);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($url === $row['url']) {
                    $rp = 1;
                }
            }
            if($rp == 1) {
                $statement = "SELECT id FROM pages WHERE url='$url'";
                if(mysqli_query($connect, $statement)) {
                    $result = mysqli_query($connect, $statement);
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            
                            $id = $row['id'];
                            
                            $statement = "SELECT custom FROM pages WHERE url='$url'";
                            if(mysqli_query($connect, $statement)) {
                                $result = mysqli_query($connect, $statement);
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $custom = $row['custom'];
                                        if($custom == 0) {
                                            include_once $_SERVER['DOCUMENT_ROOT'] . "designs/" . $ad . "/page.php";
                                        } else if($custom == 1) {
                                            include_once $_SERVER['DOCUMENT_ROOT'] . "designs/" . $ad . "/custom-page.php";
                                        }
                                    }
                                } else {
                                    header("Location: /404.php");
                                }
                            }
                        }
                    } else {
                        header("Location: /404.php");
                    }
                }
            } else {
                header("Location: /404.php");
            }
        } else {
            header("Location: /404.php");
        }
    } else {
        header("Location: /404.php");
    }
    
    mysqli_close($connect);
?>