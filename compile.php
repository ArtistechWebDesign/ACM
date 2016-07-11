<?php
    include $_SERVER['DOCUMENT_ROOT'] . "bin/head.php";
    
    echo createUser("joe", "joe@artistech.net", "password", "2");
?>