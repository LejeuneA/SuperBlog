<?php
require_once('settings.php');

/**
 * ICI VOUS ECRIVEZ LE CODE PHP QUI GERE LA LOGIQUE ET LES DONNEES DE l'APPLICATION
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php displayHeadSection('S\'identifier'); ?>
</head>

<body>

    <div class="container">
        <div id="header-logo">
            <h1><a href="index.php" title="Aller sur la page d'accueil du Blog"> <?php echo APP_NAME; ?></a></h1>
        </div>
    </div>
    <div class="container">
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
        <h1>S'identifier</h1>
        <div id="message">
            <!-- Ici nous affichons les messages éventuels (CODE PHP)-->
        </div>
        <div id="content">
            <!-- 
                    Créez ici un formulaire HTML s'identifier sur l'application
                    * Astuces :
                        - L'attribut "action" de votre balise form devra contenir "login.php"
                          C'est ici même dans login.php que nous traiterons l'identification
                        - L'attribut "method" devra contenir "post"                    
                -->

        </div>
        <footer>
            <?php echo displayFooterSection(); ?>
        </footer>
    </div>
</body>

</html>