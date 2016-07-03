<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "bin/global-header.php"; ?>
    </head>

    <body>
               
        <?php

            include "/bin/sql_lib.php";
            $connect = connect();

            $user = $_POST["username"];
            $pass = $_POST["password"];
            
            $statement = "SELECT password, avatar FROM users
            WHERE username='$user'"; 
            
            if(mysqli_query($connect, $statement)) {
                $result = mysqli_query($connect, $statement);
                if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if(password_verify($pass, $row["password"])) {
                        session_start();
                        $_SESSION["logged-in"] = 1;
                        $_SESSION["username"] = $user;
                        $_SESSION["avatar"] = $row["avatar"];
                        echo "You have been logged in!";
                        echo "<br /><a href='/'>Back to Front Page</a>";
                        //Add successful login actions here
                    } else {
                        echo "Incorrect username or password. <a href='/login.php'>Please try again.</a>";
                    }
                } 
            } else {
                    echo "Incorrect username or password. <a href='/login.php'>Please try again.</a>";
                }
            } else {
                echo mysqli_error($connect);
            }
            
            mysqli_close($connect);
        ?>

    </body>
</html>