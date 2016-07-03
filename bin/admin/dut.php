<?php include "admin-lock.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
    <body>
        <main>
            <form method="post" action="dut-process.php">
                <select name="username">
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

                <input type="submit" value="Delete" />
            </form>
        </main>
    </body>
</html>