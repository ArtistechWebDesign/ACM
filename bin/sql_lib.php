<?php  
    function connect() {
        $db = "acms";
        $host = "localhost";
        $username = "root";
        $password = "";
        
        $connect = mysqli_connect($host, $username, $password, $db);
        if(!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        return $connect;
    }

    function createPageTable() {
        $connect = connect();
        
        $statement = "CREATE TABLE IF NOT EXISTS pages (
            id INT(0) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            url VARCHAR(200) NOT NULL,
            custom INT(1) NOT NULL,
            content LONGTEXT,
            enabled INT(1) NOT NULL DEFAULT 1
        )";
        
        if(mysqli_query($connect, $statement)) {
            //Table created successfully.
        } else {
            echo "Error creating table: " . mysqli_error($connect);
        }
        
        mysqli_close($connect);
    }
    
    function createSiteTable() {
        $connect = connect();
        
        $statement = "CREATE TABLE IF NOT EXISTS site (
            id INT(0) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            design VARCHAR(50) NOT NULL DEFAULT 'template',
            role0 VARCHAR(30) NOT NULL DEFAULT 'User',
            role1 VARCHAR(30) NOT NULL DEFAULT 'Moderator',
            role2 VARCHAR(30) NOT NULL DEFAULT 'Site Manager',
            role3 VARCHAR(30) NOT NULL DEFAULT 'Administrator',
            author VARCHAR(30) NOT NULL DEFAULT 'Unknown',
            authorhelp VARCHAR(50) NOT NULL DEFAULT 'Contact Unknown'
        )";
        
        if(mysqli_query($connect, $statement)) {
            //Table created successfully.
        } else {
            echo "Error creating table: " . mysqli_error($connect);
        }
        
        mysqli_close($connect);
        
        $connect = connect();
        
        $statement = "INSERT INTO site (design) VALUES ('template')";
        
        if(mysqli_query($connect, $statement)) {
            //Success
        } else {
            //Error
        }
        
        mysqli_close($connect);
    }
    
    function createUserTable() {
        $connect = connect();
        
        $statement = "CREATE TABLE IF NOT EXISTS users (
            id INT(0) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            email VARCHAR(60) NOT NULL,
            password VARCHAR(300) NOT NULL,
            name VARCHAR(50),
            role INT(3) NOT NULL DEFAULT 0,
            website VARCHAR(100),
            avatar VARCHAR(100) DEFAULT '/images/avatars/default.jpg',
            bio VARCHAR(500)
        )";
        
        if(mysqli_query($connect, $statement)) {
            //Table created successfully.
        } else {
            echo "Error creating table: " . mysqli_error($connect);
        }
        
        mysqli_close($connect);
    }
?>