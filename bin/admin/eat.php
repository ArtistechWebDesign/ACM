<?php include "admin-lock.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Avatar Updating Tool</title>
    </head>
    
    <body>
        <main>
            <form method="post" action="eat-process.php" enctype="multipart/form-data">
                <select name="user">
                <?php
                    $connect = connect();
                    
                    $statement = "SELECT username FROM users"; 
                    
                    if(mysqli_query($connect, $statement)) {
                        $result = mysqli_query($connect, $statement);
                        if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["username"] . "'>" . $row["username"] . "</option>";
                        }
                    }
                    } else {
                        echo mysqli_error($connect);
                    }
                    
                    mysqli_close($connect);
                ?>
                </select>
                
                <input type="file" name="fileToUpload" id="fileToUpload" required="required">
                
                <input type="submit" value="Update Avatar" />
            </form>
        </main>
    </body>
</html>