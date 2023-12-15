<?php
require_once('settings.php');


$res = getAllArticlesDB($conn, '1');


// DEBUG // Affichage brut des articles reçu de la DB // 
// disp_ar($res, 'ARTICLES');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php displayHeadSection('Accueil'); ?>
</head>

<body>
    <div class="container">
        <div id="header-logo">
            <h1><a href="index.php" title="Aller sur la page d'accueil du Blog"> <?php echo APP_NAME; ?></a></h1>
        </div>
    </div>
    <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
    <div class="container">
        <div id="content">
            <ul>
                <?php
                // Display each active article
                foreach ($res as $article) {
                    echo "<h2><li><a href='article.php?id={$article['id']}'>{$article['title']}</a></li></h2><hr>";
                }
                ?>
            </ul>
        </div>
    </div>

    <footer>
        <?php echo displayFooterSection(); ?>
    </footer>

</body>

</html>