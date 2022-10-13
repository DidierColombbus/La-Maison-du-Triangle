<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Lecture de la session en cours :
var_dump($_SESSION);

// La page contact du site. 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Contact ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "contact, mail, téléphone";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<div class="container bg-light text-start">

<br>

<!-- Ici nous trouverons des articles car il y a un titre à chacun d'entre eux. -->
<article>
    <h1 class="h4"><img src="./img/icons/telephone.svg" alt="" srcset="" class="col-1"> Nous téléphoner : </h1>
    <p class="text-center fs-2">+1 441-552-663</p>
</article>
<br>
<article>
    <h2 class="h4"><img src="./img/icons/postage-fill.svg" alt="" srcset="" class="col-1">  Notre adresse postale :</h2>
    <p class="text-center fs-2">3 rue des Trilobytes Hamilton Bermudes</p>
</article>
<br>
<article>
    <h2 class="h4"><img src="./img/icons/envelope-open.svg" alt="" srcset="" class="col-1"> Nous envoyer un mail :</h2>
    <p class="text-center fs-2">lamaisondutriangle@gmail.com</p>
</article>
<br>
</div>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content (qui est une fonction écrite dans le fichier init.inc.php) -->
<!-- <?php 

// Avec l'echo, $content va afficher la présentation du triangle, le carroussel dynamique et la présentation du site.
echo $content; 

?> -->

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>