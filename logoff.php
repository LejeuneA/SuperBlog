<?php
    require_once('settings.php');
    
    unset($_SESSION);
    setcookie(session_name(), '', time()-3600);
    session_destroy();

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

    $_SESSION['IDENTIFY'] = false;

    header('Location: index.php');