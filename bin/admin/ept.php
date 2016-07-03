<?php include "admin-lock.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Edit Tool</title>
    </head>
    
    <body>
        <main>
            <form method="post" action="ept-process.php">
                <select name="page">
                <?php
                    $connect = connect();
                    
                    $statement = "SELECT name FROM pages"; 
                    
                    if(mysqli_query($connect, $statement)) {
                        $result = mysqli_query($connect, $statement);
                        if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                    }
                    } else {
                        echo mysqli_error($connect);
                    }
                    
                    mysqli_close($connect);
                ?>
                </select>
                
                <textarea name="new_content" placeholder="New Content"></textarea>
                
                <input type="submit" value="Edit Content" />
            </form>
        </main>
    </body>
</html>