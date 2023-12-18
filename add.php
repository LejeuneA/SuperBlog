<?php
require_once('settings.php');

/**
 * ICI VOUS ECRIVEZ LE CODE PHP QUI GERE LA LOGIQUE ET LES DONNEES DE l'APPLICATION
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php displayHeadSection('Ajouter un article'); ?>
</head>

<body>
    <div class="container">
        <div class="container">
            <?php echo displayHeaderLogo(); ?>
        </div>
        <div id="main-menu">
            <?php displayNavigation(); ?>
        </div>
        <h1>Ajouter un article<h1>
                <div id="content">
                    <!-- 
                    Créez ici un formulaire HTML pour ajouter un nouvel article
                    * Astuces :
                        - L'attribut "action" de votre balise form devra contenir "manager.php"
                          C'est dans le fichier manager.php que l'on va traiter les donées du formulaire
                        - L'attribut "method" devra contenir "post"                    
                -->
                </div>

    </div>
    <footer>
        <?php echo displayFooterSection(); ?>
    </footer>
</body>

</html>