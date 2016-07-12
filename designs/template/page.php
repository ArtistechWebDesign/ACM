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
        
        <header>
            <section>
                <div id="logo-section">
                    <img id="logo" src="/images/logo.png" alt="Logo" />
                </div>
            </section>
            
            <section>
                <div id="nav-section">
                    <!-- Main Nav Menu Here -->
                </div>
            </section>
            
            <section>
                <div id="acc-section">
                    <!-- Account Info Here -->
                </div>
            </section>
        </header>
        
        <main>
            <div id="page-content">
                <p id="content-p">
                    <?php
                        echo getPageContent($id);
                    ?>
                </p>
            </div> 
        </main>
        
        <footer>
            <p id="footer-p">Powered by ACM; developed by Joe Furfaro</p>
        </footer>
    </body>
    
</html>