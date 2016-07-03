<!DOCTYPE html>
<html>
    <head>
        </title>Login</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "bin/global-header.php"; ?>
    </head>
    
    <body>
        <main>
            <form action="login-process.php" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="Login" />
            </form>
        </main>
    </body>
</html>