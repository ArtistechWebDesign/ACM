<?php include "admin-lock.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Creation Tool</title>
    </head>
    
    <body>
        <form method="post" action="cut-process.php">
            <input type="text" name="username" placeholder="Username" required="required" />
            <input type="text" name="email" placeholder="Email" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <input type="text" name="name" placeholder="Name" />
            <select name="role">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <input type="text" name="website" placeholder="Website" />
            <input type="submit" value="Create" name="submit" />
        </form>
    </body>
</html>