<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "bin/global-header.php"; ?>
        
        <?php 
            createPageTable();
            createUserTable();
            
            include $_SERVER['DOCUMENT_ROOT'] . "settings/active-design.php";
            
            session_start();
        ?>

        <!-- Page Title -->
        <title>Custom Page</title>
        
        <!-- Theme head.php -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . "designs/" . $active_design . "/head.php" ?>
        <link rel="stylesheet" href="<?php echo $_SERVER['DOCUMENT_ROOT'] . "designs/" . $active_design . "/custom-pages/template.php" ?>" type="text/css" />
    </head>
    
    <body>
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "designs/" . $active_design . "/header.php" ?>
        <header>
        
        <main>
            <?php echo $page_content; ?>
        </main>
        
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "designs/" . $active_design . "/footer.php" ?>
        </footer> 
    </body>
</html>