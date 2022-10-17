<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Lecture de la session en cours pour vérification :
// var_dump($_SESSION);

// Les horaires et la map en iframe. 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Nous trouver ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "carte, trajet, horaires";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>


<div class="container bg-light text-center">
<h2>Notre boutique physique</h2>
<p>Retrouvez tous nos produits dans notre boutique, située au 3 rue des Trilobytes Hamilton Bermudes.</p>
<img src="./img/bgimg/locaux.JPG" class="w-50" alt="nos locaux">

<div class="row container mt-4">
    <div class="col">
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-65.35354614257814%2C31.99875937194732%2C-64.30160522460939%2C32.68099643258195&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=10/32.3405/-64.8276">Afficher une carte plus grande</a></small>
    </div>
    <div class="col">
    <h3>Nos horaires :</h3>
    <table class="w-100">
                 <tbody>
                     <tr><td class="impair">Lundi <span>13h - 21h</span></td></tr>
                     <tr><td class="pair">Mardi <span>13h - 21h</span></td></tr>
                     <tr><td class="impair">Mercredi <span>9h - 21h</span></td></tr>
                     <tr><td class="pair">Jeudi <span>13h - 21h</span></td></tr>
                     <tr><td class="impair">Vendredi <span>9h - 21h</span></td></tr>
                     <tr><td class="pair">Samedi <span>9h - 21h</span></td></tr>
                     <tr><td class="impair">Dimanche <span>Fermé</span></td></tr>
                 </tbody>
             </table>
            </div>
             </div>
             <br>
</div>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content si nécessaire (qui est une fonction écrite dans le fichier init.inc.php) -->
<!-- <?php 

echo $content; 

?> -->

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>