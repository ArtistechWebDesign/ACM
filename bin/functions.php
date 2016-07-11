<?php 
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/UserAPI.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/PageAPI.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/SiteAPI.php";

    function refreshTables() {
        createUserTable();
        createPageTable();
        createSiteTable();   
    }

    function installFeature($id) {
        
    }
    
    function uninstallFeature($id) {
        
    }
    
    function listFeatures() {
        
    }
    
    //Misc
    
    function returnHelp() {
        
    }
?>