<?php
    require_once('settings.php');

    $msg = null;
    $result = null;
    $execute = false;


    if(isset($_GET['id']) && !empty($_GET['id'])){


        $id = $_GET['id'];


        if(!is_object($conn)){            
            $msg = getMessage($conn, 'error');
        }else{
            

            $result = getArticleByIDDB($conn, $id);

            (isset($result) && is_array($result) && !empty($result))? $execute = true : $msg = getMessage('Il n\'y a pas d\'article à afficher', 'error');
        }       
        
    }else{
        $msg = getMessage('Il n\'y a pas d\'article à afficher', 'success');
    }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php displayHeadSection((isset($result['title'])?$result['title']:APP_NAME)); ?>
</head>
<body>
    <div class="container">
        <div id="header-logo">
        <h1><a href="index.php"><?php echo APP_NAME; ?></a></h1>
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
                    displayArticleByID($result); 
            ?>
                            
        </div>  
        <footer>
            <?php displayFooter(); ?>
        </footer>            
    </div>    
</body>
</html>