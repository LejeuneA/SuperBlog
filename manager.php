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
                foreach ($result as $article) {
            ?>
                    <div class="article">
                        <h3><?= htmlspecialchars($article['title']); ?></h3>
                        <p><?= htmlspecialchars($article['content']); ?></p>
                        <button onclick="modifierArticle(<?= $article['id']; ?>)">Modifier</button>
                        <button onclick="afficherArticle(<?= $article['id']; ?>)">Afficher</button>
                        <button onclick="supprimerArticle(<?= $article['id']; ?>)">Supprimer</button>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <footer>
            <?php displayFooter(); ?>
        </footer>
    </div>
    <script>
        function modifierArticle(articleId) {
            // Burada "Modifier" düğmesine tıklanınca yapılacak işlemleri tanımlayabilirsiniz
            // Örneğin, bir düzenleme formunu açabilirsiniz.
            window.location.href = 'edit.php?id=' + articleId;
        }

        function afficherArticle(articleId) {
            // Burada "Afficher" düğmesine tıklanınca yapılacak işlemleri tanımlayabilirsiniz
            // Örneğin, bir ayrıntı sayfasına yönlendirebilirsiniz.
            window.location.href = 'article.php?id=' + articleId;
        }

        function supprimerArticle(articleId) {
            // Burada "Supprimer" düğmesine tıklanınca yapılacak işlemleri tanımlayabilirsiniz
            // Örneğin, bir onay kutusu gösterebilir ve ardından makaleyi silebilirsiniz.
            if (confirm('Bu makaleyi silmek istediğinizden emin misiniz?')) {
                window.location.href = 'delete.php?id=' + articleId;
            }
        }
    </script>
</body>

</html>
