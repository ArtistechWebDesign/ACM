<?php include "admin-lock.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Creation Tool</title>
    </head>
    
    <body>
        <main>
            <form method="post" action="cpt-process.php">
                <input type="text" name="name" placeholder="Page Name" />
                <input type="text" name="url" placeholder="URL" />
                <input type="submit" value="Create" />
            </form>
        </main>
    </body>
</html>