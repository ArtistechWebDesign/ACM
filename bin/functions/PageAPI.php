<?php

    class PageAPI {
        function createPage($title, $url, $custom) {
            $connect = connect();
            
            $statement = "INSERT INTO pages (title, url, custom) VALUES ('$title', '$url', '$custom')";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function deletePage($id) {
            $connect = connect();
            
            $statement = "DELETE FROM pages WHERE id='$id'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function setPageContent($id, $content) {
            $connect = connect();
            
            $statement = "UPDATE pages SET content='$content' WHERE id='$id'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function getPageContent($id) {
            $connect = connect();
            
            $statement = "SELECT content FROM pages WHERE id='$id'"; 
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row["content"];
                }
            }
            } else {
                echo mysqli_error($connect);
            }
            
            mysqli_close($connect);
        }
        
        function setPageTitle($id, $title) {
            $connect = connect();
            
            $statement = "UPDATE pages SET title='$title' WHERE id='$id'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function getPageTitle($id) {
            $connect = connect();
            
            $statement = "SELECT title FROM pages WHERE id='$id'"; 
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row["title"];
                }
            }
            } else {
                echo mysqli_error($connect);
            }
            
            mysqli_close($connect);
        }
        
        function enablePage($id) {
            $connect = connect();
            
            $statement = "UPDATE pages SET enabled='1' WHERE id='$id'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
        }
        
        function disablePage($id) {
            $connect = connect();
            
            $statement = "UPDATE pages SET enabled='0' WHERE id='$id'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
        }
        
        function getPageStatus($id) {
            $connect = connect();
            
            $statement = "SELECT enabled FROM pages WHERE id='$id'"; 
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row["enabled"];
                }
            }
            } else {
                echo mysqli_error($connect);
            }
            
            mysqli_close($connect);
        }
        
        function listPages() {
            $connect = connect();
            
            $statement = "SELECT id, title, url, custom FROM pages";
            
            $toReturn = array();
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        array_push($toReturn, "[" . $row['id'] . "] " . $row['title'] . " (" . $row['url'] . ") {" . $row['custom'] . "}");
                    }
            }
            
            return $toReturn;
            
            mysqli_close($connect);
        }
    }
}