<?php

    $host = "127.0.0.1";
    $user = "root";
    $password = "MIGuel@2023";
    $dbname = "tarefas";
    $dsn = "mysql:host=$host;dbname=$dbname";

    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    define("dsn", $dsn);
    define("user", $user);
    define("password", $password);
    define("options", $options);
    
?>