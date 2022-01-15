<?php

    require_once("credentials.php");

    date_default_timezone_set("America/Los_Angeles");

    # attempts to execute specified code
    try {
    
        # specifies information to connect to database
        $database = MYSQL_DATABASE;
        $host = MYSQL_HOST;
        $port = MYSQL_PORT;
        $charset = MYSQL_CHARSET;
        $user = MYSQL_USER;
        $password = MYSQL_PASSWORD;
        $options = array(
            #pdo_options_placeholder#
        );

        # connects to database
        $connection = new PDO("mysql:dbname=$database;host=$host;port=$port;charset=$charset", $user, $password, $options);
        $connection -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    # displays error messages that occur durring attempt
    } catch(PDOException $error) {
        echo "Connection Failed: " . $error -> getMessage();
    }

?>