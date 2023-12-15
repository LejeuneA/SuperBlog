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
        <!-- Display each active article -->
            <?php displayArticlesPublies($res); ?>
        </div>
    </div>

    <footer>
        <?php echo displayFooterSection(); ?>
    </footer>

</body>

</html>