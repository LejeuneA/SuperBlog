<?php
    require_once('settings.php');


    if (!$_SESSION['IDENTIFY']) {
        header('Location: login.php');
    }

    $msg = null;
    $result = null;
    $tinyMCE = true;
    $article = null;

    if(!is_object($conn)){
        $msg = getMessage($conn, 'error');
    } else {

        if (isset($_GET['id'])) {

            $articleId = $_GET['id'];


            $article = getArticleByIDDB($conn, $articleId);


            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form']) && $_POST['form'] === 'update') {

                $updateData = [
                    'id' => $articleId,
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'published_article' => isset($_POST['published_article']) ? 1 : 0, 
                ];


                $updateResult = updateArticleDB($conn, $updateData);

                if ($updateResult === true) {

                    $msg = getMessage('L\'article a été modifié avec succès.', 'success');

                    $article = getArticleByIDDB($conn, $articleId);
                } else {

                    $msg = getMessage('Erreur lors de la modification de l\'article. Veuillez réessayer.', 'error');
                }
            }
        } else {

            header('Location: manager.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php displayHeadSection('Editer un article'); ?>
    <?php displayJSSection($tinyMCE); ?>
</head>
<body>
    <div class="container">
        <div id="header-logo">
            <h1><a href="index.php"><?php echo APP_NAME; ?></a></h1>
        </div>
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
        <div id="content-edit">
            <?php echo $msg; // Affiche le message de succès ou d'erreur ?>

            <form action="edit.php?id=<?php echo $article['id']; ?>" method="post">     
                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">               
                <div class="form-ctrl">
                    <label for="title" class="form-ctrl">Titre</label>
                    <input type="text" class="form-ctrl" id="title" name="title" value="<?php echo $article['title']; ?>" required>
                </div>
                <div class="form-ctrl">                                          
                    <label for="published_article" class="form-ctrl">Status de l'article <small>(publication)</small></label> 
                    <?php displayFormRadioBtnArticlePublished($article['active'], 'EDIT'); ?>                  
                </div>   
                <div class="form-ctrl">
                    <label for="content" class="form-ctrl">Contenu</label>
                    <textarea class="" id="content" name="content" rows="5"><?php echo $article['content']; ?></textarea>
                </div>
                <input type="hidden" id="form" name="form" value="update">
                <button type="submit" class="btn-manager">Modifier</button>
            </form> 
        </div>  
        <footer>
            <?php displayFooter(); ?>
        </footer>             
    </div>   
    <?php displayJSSection($tinyMCE); ?>
</body>
</html>
