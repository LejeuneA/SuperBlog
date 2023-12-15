<?php
require_once('settings.php');

/**
 * ICI VOUS ECRIVEZ LE CODE PHP QUI GERE LA LOGIQUE ET LES DONNEES DE l'APPLICATION
 */

if (isset($_GET['id'])) {
    // Get the article ID from the URL
    $articleId = $_GET['id'];

    // Retrieve the article based on its ID
    $article = getArticleByIDDB($conn, $articleId);

    // Check if the article exists
    if ($article) {
        // Set the page title to the article title
        $pageTitle = $article['title'];
    } else {
        // If the article does not exist, set a default title
        $pageTitle = 'Article Not Found';
    }
} else {
    // If 'id' parameter is not set, set a default title
    $pageTitle = 'Article Not Found';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php displayHeadSection($pageTitle); ?>
</head>

<body>
    <div class="container">
        <div id="header-logo">
            <h1><a href="index.php" title="Aller sur la page d'accueil du Blog"> <?php echo APP_NAME; ?></a></h1>
        </div>
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>

        <div id="message">
            <!-- Ici nous affichons les messages éventuels (CODE PHP) -->
        </div>
        <div id="content">

            <?php
            // Check if the article exists
            if ($article) {
                // Display the article title and content
                echo "<h2>{$article['title']}</h2>";
                echo "<p>{$article['content']}</p>";
            } else {
                // Display a message if the article does not exist
                echo "<p>Article not found.</p>";
            }
            ?>

        </div>
        <footer>
            <?php echo displayFooterSection(); ?>
        </footer>
    </div>
    </div>
</body>

</html>