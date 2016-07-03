<?php 
    function createUser($user, $email, $defaultPassword, $role) {
        
        $defaultPassword = password_hash($defaultPassword, PASSWORD_DEFAULT);
        $connect = connect();

        $statement = "INSERT INTO users (username, email, password, role)
        VALUES ('$user', '$email', '$defaultPassword', '$role')";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            echo mysqli_error($connect);
            return 0;
        }
        mysqli_close($connect);
    }
    
    function deleteUser($user) {
        $connect = connect();

        $statement = "DELETE FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            return 0;
        }
        
        mysqli_close($connect);
    }
    
    function removeAvatar($user) {
        $connect = connect();

        $statement = "UPDATE users SET avatar='/images/avatars/default.jpg' WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            return 0;
        }
        
        mysqli_close($connect);
    }
    
    function uploadAvatar($name, $avatar) {
        $id = 0;
        
        $connect = connect();
        
        $statement = "SELECT id FROM users WHERE username='$name'";
        
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
        
        mysqli_close($connect);

        $dir = "images/avatars/";
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . $dir;
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                return 10;
            }
        }

        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            $uploadOk = 0;
            return 20;
        }
        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
            return 30;
        }

        if ($uploadOk == 0) {
            //Error code has already been returned.
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $id . "." . $imageFileType)) {
                $connect = connect();
                
                $statement = "UPDATE users SET avatar='" . $dir . $id . "." . $imageFileType . "' WHERE username='$name'";
        
                if(mysqli_query($connect, $statement)) {
                    return 1;
                } else {
                    return 40;
                }
                            
                mysqli_close($connect);
                
                session_start();

                if($_SESSION["username"] == $name) {
                    $_SESSION["avatar"] == "/" . $dir . $id . "." . $imageFileType;
                }
            } else {
                return 0;
            }
        }
    }
    
    function getAvatar($user) {
        $connect = connect();
        
        $statement = "SELECT avatar FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['avatar'];
                }
            }
        }
        
        mysqli_close($connect);
    }
    
    function updateEmail($user, $email) {
        $connect = connect();
        
        $statement = "UPDATE users SET email='$email' WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            return 0;
        }
        
        mysqli_close($connect);
    }
    
    function getEmail($user) {
        $connect = connect();
        
        $statement = "SELECT email FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['email'];
                }
            }
        }
        
        mysqli_close($connect);
    }
    
    function updateName($user, $name) {
        $connect = connect();
        
        $statement = "UPDATE users SET name='$name' WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            return 0;
        }
        
        mysqli_close($connect);
    }
    
    function getName($user) {
        $connect = connect();
        
        $statement = "SELECT name FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['name'];
                }
            }
        }
        
        mysqli_close($connect);
    }
    
    function updateWebsite($user, $website) {
        $connect = connect();
        
        $statement = "UPDATE users SET website='$website' WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            return 0;
        }
        
        mysqli_close($connect);
    }
    
    function getWebsite($user) {
        $connect = connect();
        
        $statement = "SELECT website FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['website'];
                }
            }
        }
        
        mysqli_close($connect);
    }
    
    function updateUsername($id, $user) {
        $connect = connect();
        
        $statement = "UPDATE users SET username='$user' WHERE id='$id'";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            return 0;
        }
        
        mysqli_close($connect);
    }
    
    function getId($user) {
        $connect = connect();
        
        $statement = "SELECT id FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['id'];
                }
            }
        }
        
        mysqli_close($connect);
    }
    
    function updateRole($user, $role) {
        $connect = connect();
        
        $statement = "UPDATE users SET role='$role' WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            return 1;
        } else {
            return 0;
        }
        
        mysqli_close($connect);
    }
    
    function getRole($user) {
        $connect = connect();
        
        $statement = "SELECT role FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['role'];
                }
            }
        }
        
        mysqli_close($connect);
    }
    
    function listUsers() {
        $connect = connect();
        
        $statement = "SELECT id, username, name, email, role FROM users";
        
        $toReturn = array();
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    array_push($toReturn, "[" . $row['id'] . "] " . $row['username'] . " (" . $row['email'] . ") {" . $row['role'] . "}");
                }
        }
        
        return $toReturn;
        
        mysqli_close($connect);
    }
}
