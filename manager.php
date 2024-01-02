<?php
require_once('settings.php');

// Redirection vers la page de login si l'utilisateur n'est pas connecté
if (!isset($_SESSION['IDENTIFY']) || !$_SESSION['IDENTIFY']) {
    header('Location: login.php');
    exit();
}

$msg = null;
$result = null;
$execute = false;

// On vérifie l'objet de connexion $conn
if (!is_object($conn)) {
    $msg = getMessage($conn, 'error');
} else {
    // Récupérer tous les articles de la table articles et les stocker dans un tableau nommé $result
    $result = getAllArticlesDB($conn);

    // On vérifie le retour de la fonction : si c'est un tableau, on continue, sinon on affiche le message d'erreur
    if (is_array($result) && !empty($result)) {
        $execute = true;
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
                window.location.href = 'delete.php?id=' + articleId;
            }
        }
    </script>
</body>

</html>