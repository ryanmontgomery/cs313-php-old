<?php
    //localhost
    $dsn = 'pgsql:host=localhost;dbname=library';
    $username = 'postgres';
    $password = 'monkeytoo2';
    
    //Remote host settings
    //$dsn = 'pgsql:host=localhost;dbname=rtmontgo_school';
    //$username = 'rtmontgo_cit336';
    //$password = 'monkey!too2';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }