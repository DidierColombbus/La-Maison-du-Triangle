<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Lecture de la session en cours pour vérification :
// var_dump($_SESSION);

// Le storytelling. 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Qui sommes-nous ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "informations, histoire, projet";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>
<div class="container bg-light text-start">

    <!-- Ici nous trouverons des articles car il y a un titre à chacun d'entre eux. -->
    <article>
        <h1 class="h2"><img src="./img/icons/person-hearts.svg" alt="" srcset="" class="col-1"> Qui sommes-nous :</h1>
        <ul>
            <li>Installés depuis 1999, nous avons la passion des triangles chevillée au corps.</li>
            <li>Tous deux caristes de formation nous avons patiemment appris les rudiments de l'art du triangle au cours d'un voyage initiatique dans le Gers, près du plus grand artiste qui soit : Amédée De la Sierra. En moins de 8 ans passés dans les collines, à nous nourrir de racines et à nous abreuver aux sources locales, nous avons pu apprendre tous ses secrets.</li>
            <li>Revenus dans le "grand monde", nous avons décidé de partager avec vous ce que nous avions appris.</li>
        </ul>
    </article>
    <br>
    <article>
        <h2><img src="./img/icons/people-fill.svg" alt="" srcset="" class="col-1"> Notre communauté :</h2>
        <ul>
            <li>C'est d'abord au sein de la fanfare de la ville que nous avons rencontré d'autres passionnés du triangle. L'idée nous est venue alors de faire lien avec d'autres percussionnistes à travers le monde.</li>
            <li>Au travers de leurs concerts, leurs spectacles, nos membres font sans cesse découvrir de nouvelles sonorités et naître des vocations inébranlables parmi les plus jeunes.</li>
            <li>Nous avons ouvert un partenariat avec <a href="harmonika_accueil.php" target="_blank">harmonika.com</a> qui vous fera bénéficer d'une réduction de 5% si vous venez de notre part.</li>
        </ul>
    </article>
    <br>
    <article>
        <h2><img src="./img/icons/shop-window.svg" alt="" srcset="" class="col-1"> Notre équipe :</h2>
        <ul>
            <li>Autour du solide noyau que nous formons avec ma femme nous avons le plaisir de compter avec nous une troisième personne qui s'occupe de la clientèle sur place, des emballages, de la livraison, de la maintenance du site, du nettoyage des locaux et des repas.</li>
            <li>En sus de ses fonctions, il lui faut aussi prodiguer les cours (une fois par mois) que nous proposons à tous : petits et grands, débutants ou confirmés.</li>
            <li>C'est donc dans la joie et la bonne humeur, sur une note claire de triangle, que nous vous attendons dans notre boutique chaque jour de la semaine et le samedi (cf <a href="map.php">nos horaires</a>).</li>
        </ul>
    </article>
    <div class="container text-end">
        <quotes class="display-8">"On a dit fort bien que, si les triangles faisaient un dieu, ils lui donneraient trois côtés." <em>Montesquieu, Lettres persanes</em> </quotes>
    </div>
</div>


<!-- Ici nous allons afficher le body et tout ce qui est permis par $contenu si nécessaire (qui est une fonction écrite dans le fichier init.inc.php) -->
<?php

echo $contenu;

?>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>