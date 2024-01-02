<?php
    require_once('settings.php');

    if (!$_SESSION['IDENTIFY']) {
        header('Location: login.php');
    }
    
    $msg = null;
    $tinyMCE = true;
    $execute = false;
    

    if(!is_object($conn)){
        $msg = getMessage($conn, 'error');
    } else {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'add') {

            $addData = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'published_article' => isset($_POST['published_article']) ? 1 : 0, 
            ];


            $addResult = addArticleDB($conn, $addData);

            if ($addResult === true) {

                $msg = getMessage('L\'article a été ajouté avec succès.', 'success');
            } else {

                $msg = getMessage('Erreur lors de l\'ajout de l\'article. Veuillez réessayer.', 'error');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php displayHeadSection('Ajouter un article'); ?>
</head>
<body>
    <div class="container">
        <div id="header-logo">
            <h1><a href="index.php"><?php echo APP_NAME; ?></a></h1>
        </div>
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
        <h2 class="title">Ajouter un article<h2>
        <div id="message">               
            <?php echo $msg; ?>
        </div>
        <div id="content-add">

            <form action="add.php" method="post">          
                <div class="form-ctrl">
                    <label for="title" class="form-ctrl">Titre</label>
                    <input type="text" class="form-ctrl" id="title" name="title" value="" required>
                </div>
                <div class="form-ctrl">                                          
                    <label for="published_article" class="form-ctrl">Status de l'article <small>(publication)</small></label> 
                    <?php displayFormRadioBtnArticlePublished(false, 'ADD'); ?>                  
                </div>   
                <div class="form-ctrl">
                    <label for="content" class="form-ctrl">Contenu</label>
                    <textarea class="" id="content" name="content" rows="8"></textarea>
                </div>
                <input type="hidden" id="form" name="form" value="add">
                <button type="submit" class="btn-manager">Ajouter</button>
            </form>
                            
        </div>  
        <footer>
            <?php displayFooter(); ?>
        </footer>             
    </div>  
    <?php displayJSSection($tinyMCE); ?>    
</body>
</html>
