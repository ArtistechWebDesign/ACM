<?php 
    include $_SERVER['DOCUMENT_ROOT'] . "bin/sql_lib.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/UserAPI.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/PageAPI.php";
    include $_SERVER['DOCUMENT_ROOT'] . "bin/functions/SiteAPI.php";

    function runRoleCheck($user, $required) {
        $connect = connect();
        $role = "";
        
        $statement = "SELECT role FROM users WHERE username='$user'";
        
        if(mysqli_query($connect, $statement)) {
            $result = mysqli_query($connect, $statement);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $role = $row["role"];
                }
        }
        } else {
            echo mysqli_error($connect);
        }
        
        if($role >= $required) {
            return 1;
        } else if($role < $required) {
            return 0;
        }
        
        mysqli_close($connect);
    }

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