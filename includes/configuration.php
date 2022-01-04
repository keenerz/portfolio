<?php

    date_default_timezone_set("America/Los_Angeles");

    # attempts to execute specified code
    try {
    
        # specifies information to connect to database
        $database = "#database_placeholder#";
        $host = "#host_placeholder#";
        $port = "3306";
        $character_set = "utf8";
        $user = "#user_placeholder#";
        $password = "#password_placeholder#";
        

        # connects to database
        $connection = new PDO("mysql:dbname=$database;host=$host;port=$port;charset=$character_set", $username, $password);
        $connection -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    # displays error messages that occur durring attempt
    } catch(PDOException $error) {
        echo "Connection Failed: " . $error -> getMessage();
    }

?>
