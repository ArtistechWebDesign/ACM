<!DOCTYPE html>
<html>
    <head>
        <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . "bin/head.php";
            include_once $_SERVER['DOCUMENT_ROOT'] . "designs/" . $ad . "/head.php";
        ?>
        <!-- Title -->
        <title><?php echo getPageTitle($id); ?></title>
    </head>
    
    <body>
        <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . "designs/" . $ad . "/custom/" . $id . ".php";
        ?>
    </body>
    
</html>