<?php
    class SiteAPI {
        function setActiveDesign($url_key) {
            $connect = connect();
            
            $statement = "UPDATE site SET design='$url_key'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function getActiveDesign() {
            $connect = connect();
            
            $statement = "SELECT design FROM site";
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_feth_assoc($result)) {
                        return $row["design"];
                    }
                }
            }
            
            mysqli_close($connect);
        }
        
        function setRoleName($role, $name) {
            $connect = connect();
            
            $keyToEdit = "role" . $role;
            
            $statement = "UPDATE site SET $keyToEdit='$name'";
            
            if(mysql_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function getRoleName($role) {
            $connect = connect();
            
            $keyToGet = "role" . $role;
            
            $statement = "SELECT $keyToGet FROM site";
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        return $row[$keyToGet];
                    }
                }
            }
            
            mysqli_close($connect);
        }
        
        function setFrontPageEnabled($enabled) {
            $connect = connect();
            
            $statement = "UPDATE site SET frontpage='$enabled'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function getFrontPageEnabled() {
            $connect = connect();
            
            $statement = "SELECT frontpage FROM site";
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        return $row['frontpage'];
                    }
                }
            }
            
            mysqli_close($connect);
        }
        
        function setAuthor($author) {
            $connect = connect();
            
            $statement = "UPDATE site SET author='$author'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function getAuthor() {
            $connect = connect();
            
            $statement = "SELECT author FROM site";
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        return $row['author'];
                    }
                }
            }
            
            mysqli_close($connect);
        }
        
        function setAuthorHelp($authorHelp) {
            $connect = connect();
            
            $statement = "UPDATE site SET authorhelp='$authorHelp'";
            
            if(mysqli_query($connect, $statement)) {
                return 1;
            } else {
                return 0;
            }
            
            mysqli_close($connect);
        }
        
        function getAuthorHelp() {
            $connect = connect();
            
            $statement = "SELECT authorhelp FROM site";
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        return $row['authorhelp'];
                    }
                }
            }
            
            mysqli_close($connect);
        }
    }