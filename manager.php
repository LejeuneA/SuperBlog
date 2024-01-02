<?php
require_once('settings.php');


if (!isset($_SESSION['IDENTIFY']) || !$_SESSION['IDENTIFY']) {
    header('Location: login.php');
    exit();
}

$msg = null;
$result = null;
$execute = false;


if (!is_object($conn)) {
    $msg = getMessage($conn, 'error');
} else {

    $result = getAllArticlesDB($conn);


    if (is_array($result) && !empty($result)) {
        $execute = true;


        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $articleIdToDelete = $_GET['id'];


            $deleteResult = deleteArticleDB($conn, $articleIdToDelete);


            if ($deleteResult === true) {
                $msg = getMessage('Article supprimé avec succès.', 'success');
            } else {
                $msg = getMessage('Erreur lors de la suppression de l\'article. ' . $deleteResult, 'error');
            }
        }
    } else {
        $msg = getMessage('Il n\'y a pas d\'article à afficher actuellement', 'error');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    displayHeadSection('Gestion des articles');
    displayJSSection();
    ?>
</head>

<body>
    <div class="container">
        <div id="header-logo">
            <h1><a href="index.php"><?= APP_NAME; ?></a></h1>
        </div>
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
        <h2 class="title">Gérer les articles</h2>
        <div id="message">
            <?= isset($msg) ? $msg : ''; ?>
        </div>

        <div id="content">
            <?php
            if ($execute) {
                displayArticlesWithButtons($result);
            }
            ?>
        </div>

    </div>
    <footer>
        <?php displayFooter(); ?>
    </footer>
    </div>

    <script>
        function modifierArticle(articleId) {
            window.location.href = 'edit.php?id=' + articleId;
        }

        function afficherArticle(articleId) {
            window.location.href = 'article.php?id=' + articleId;
        }

        function supprimerArticle(articleId) {
            if (confirm('Êtes-vous certain de vouloir supprimer l\'article ci-dessous ?')) {
                window.location.href = 'manager.php?id=' + articleId; 
            }
        }
    </script>
</body>

</html>
