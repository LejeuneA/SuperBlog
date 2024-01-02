<?php

    const APP_NAME = "SuperBlog";
    const APP_VERSION = 'v0.5.2';
    const APP_UPDATED = '01-01-2024 21:04';
    const APP_AUTHOR = 'Açelya Lejeune';
       

    const DEBUG = false;


    require_once('conf/conf-db.php');


    $name = session_name(str_replace(' ', '', APP_NAME).'_session');
    $domain = $_SERVER['HTTP_HOST'];
    $time = time() + 3600; 

    setcookie($name, APP_NAME, [
        'expires' => $time,
        'path' => '/',
        'domain' => $domain,
        'secure' => false,
        'httponly' => true,
        'samesite' => 'strict',
    ]);


    session_start();
    

    if (!isset($_SESSION['IDENTIFY'])) {
        $_SESSION['IDENTIFY'] = false;
    }
   

    require_once('app/functions/fct-db.php');
    require_once('app/functions/fct-ui.php');
    require_once('app/functions/fct-tools.php');

    $conn = connectDB(SERVER_NAME, USER_NAME, USER_PWD, DB_NAME);




    
    