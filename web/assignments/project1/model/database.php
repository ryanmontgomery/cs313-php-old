<?php
    //localhost
    //$dsn = 'mysql:host=localhost;dbname=school';
    //$username = 'school_user';
    //$password = 'pa55word';
    
    //Remote host settings
    $dsn = 'pgsql:host=localhost;dbname=rtmontgo_school';
    $username = 'rtmontgo_cit336';
    $password = 'monkey!too2';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }