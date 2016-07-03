<section>
    <div id="title-section">
        <?php 
            $title = include "header-title.php";
            $title = str_replace("TITLE-TARGET", "_self", $title);
            $title = str_replace("TITLE-HREF", "/", $title);
            $title = str_replace("TITLE-CONTENT", "This is a title!", $title);
            echo $title;
        ?>
    </div>
    
    <div id="banner-section">
        <?php 
            $banner = include "header-banner.php";
            $banner = str_replace("BANNER-TARGET", "_self", $banner);
            $banner = str_replace("BANNER-HREF", "/", $banner);
            $banner = str_replace("BANNER-SRC", "/", $banner);
            echo $banner;
        ?>
    </div>
</section>

<nav>
    <?php
        $nav_item = include "nav-item.php";
        $nav_item = str_replace("LINK", "/home", $nav_item);
        $nav_item = str_replace("CONTENT", "Home", $nav_item);
        $nav_item = str_replace("TARGET", "_self", $nav_item);
        echo $nav_item;
        
        $nav_item = include "nav-item.php";
        $nav_item = str_replace("LINK", "/about", $nav_item);
        $nav_item = str_replace("CONTENT", "About", $nav_item);
        $nav_item = str_replace("TARGET", "_self", $nav_item);
        echo $nav_item;
        
        $nav_item = include "nav-item.php";
        $nav_item = str_replace("LINK", "/products", $nav_item);
        $nav_item = str_replace("CONTENT", "Products", $nav_item);
        $nav_item = str_replace("TARGET", "_self", $nav_item);
        echo $nav_item;
    ?>
</nav>

<section>
    <?php
        if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == 1) {
            if(file_exists($_SESSION["avatar"])) {
                echo "<img alt='Profile Image' src='" . "/" . $_SESSION["avatar"] . "' />";
            } else {
                echo "<img alt='Profile Image' src='/images/avatars/default.jpg' />";
            }
            echo "Logged in as " . $_SESSION["username"];
            echo "<a href='/logout.php'>Logout<a/>";
        } else {
            echo "<a href='/login.php'>Login</a>";
        }    
    ?>
</section>