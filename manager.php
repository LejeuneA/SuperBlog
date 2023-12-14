<?php
require_once('settings.php');

/**
 * ICI VOUS ECRIVEZ LE CODE PHP QUI GERE LA LOGIQUE ET LES DONNEES DE l'APPLICATION
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php displayHeadSection('Gestion des articles'); ?>
</head>

<body>
<div class="container">
        <div id="header-logo">
            <h1><a href="index.php" title="Aller sur la page d'accueil du Blog"> <?php echo APP_NAME; ?></a></h1>
        </div>
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
        <h1>Gérer les articles</h1>
        <div id="message">
            <!-- Ici nous affichons les messages éventuels (CODE PHP)-->
        </div>
        <div id="content">
            <!-- 
                   Tout comme sur la page d'accueil on va ici lister les titres des articles et ce compris les non publiés.
                   avec en plus des liens pour modifier afficher, afficher et supprimer chaque article.
                   Vous devez créer une foncion d'affichage
                -->

        </div>
        <footer>
            <?php echo displayFooterSection(); ?>
        </footer>
    </div>
</body>

</html>