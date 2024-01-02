<?php
    require_once('settings.php');


    $msg = null;
    $result = null;
    $execute = false;

    if(!is_object($conn)){       
        $msg = getMessage($conn, 'error');
    }else{

        $result = getAllArticlesDB($conn, 1);

        (isset($result) && is_array($result))? $execute = true : $msg = getMessage($result, 'error');            
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php displayHeadSection('Accueil'); ?>
</head>
<body>
    <div class="container">
        <div id="header-logo">
        <h1><a href="index.php"><?= APP_NAME; ?></a></h1>
        </div>
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
        <div id="message">               
            <?php if(isset($msg)) echo $msg; ?>
        </div>
        <div id="content">
            <?php               
                if($execute)
                    displayArticles($result);
            ?>           
        </div>  
        <footer>                
            <?php displayFooter(); ?>
        </footer>             
    </div>    
</body>
</html>