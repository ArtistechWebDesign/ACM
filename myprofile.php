<?php
    include "/settings/role-names.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "bin/global-header.php"; ?>
    </head>
    
    <body>
        <main>
            
            <?php             
                session_start();
                if($_SESSION['logged-in'] == 1) {
                $user = $_SESSION['username'];
                
                include "/bin/sql_lib.php";
                $connect = connect();

                $statement = "SELECT username, name, role, website, avatar FROM users 
                WHERE username='$user'"; 
                
                if(mysqli_query($connect, $statement)) {
                    $result = mysqli_query($connect, $statement);
                    if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        $role = $row["role"];
                        if($role == 0) {
                            $role = $role_0;
                        } else if($role == 1) {
                            $role = $role_1;
                        } else if($role == 2) {
                            $role = $role_2;
                        } else if($role == 3) {
                            $role = $role_3;
                        }
                        
                        if(file_exists($row["avatar"])) {
                            echo "<img alt='Profile Image' src='" . "/" . $row["avatar"] . "' />";
                        } else {
                            echo "<img alt='Profile Image' src='/images/avatars/default.jpg' />";
                        }
                        echo "<strong>" . $row["username"] . "</strong><br />";
                        echo $row['name'] . "<br />";
                        echo "Role: " . $role . "<br />";
                        echo "<a href='" . $row["website"] . "'>" . $row["website"] . "<a/>";
                    }
                } else {
                    echo "User not found.";
                }
                } else {
                    echo mysqli_error($connect);
                }
                
                mysqli_close($connect);
            }
            ?>
        </main>
    </body>
</html>