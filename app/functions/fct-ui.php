<?php
// Fonctions qui sont liées à l'interface utilisateur

/**
 * Affichage de la navigation
 * 
 * @return void 
 */
function displayNavigation()
{
    $navigation = '
    <nav>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="manager.php">Gérer</a></li>
            <li><a href="add.php">Ajouter</a></li>
            <li><a href="login.php">Se connecter</a></li>
                        
        </ul>
    <nav>';

    echo $navigation;
}

/**
 * Affichage de la section head d'une page
 * 
 * @param string $title 
 * @return void 
 */
function displayHeadSection($title = '')
{

    $head = '
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/2.0.0/modern-normalize.min.css" integrity="sha512-4xo8blKMVCiXpTaLzQSLSw3KFOVPWhm/TRtuPVc4WG6kUgjH6J03IBuG7JZPkcWMxJ5huwaBpOpnwYElP/m6wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
        <link rel="stylesheet" href="assets/css/styles.css">
        
        <title>' . $title . '</title>
    ';

    echo $head;
}



/**
 * 
 * Affichage des articles publiés.
 * 
 * 
 */
function displayArticlesPublies()
{

    $articlesPublies = '
        <p><a href="article.php?id=xx" class="titre-article">Titre du premier article</a></p>
        <p><a href="article.php?id=xx" class="titre-article">Titre du second article</a></p>
        <p><a href="article.php?id=xx" class="titre-article">Titre du troisième article</a></p>
    
';

    echo $articlesPublies;
}




/**
 * 
 * Affichage du footer de page
 * 
 * @param string $footer
 */

function displayFooterSection()
{
    $footer = '
        <p>SuperBlog - v0.0.1 - 14-12-2023 16:15 by Açelya Lejeune<p>
    ';

    echo $footer;
}
