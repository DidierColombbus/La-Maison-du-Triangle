<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Accessoires est une page réunissant tous les accessoires pour instruments (triangles) de notre boutique.
// Nous allons trouver ici des housses, des supports pour percussionnistes. 

$requete_accessoires = $pdo->query('SELECT * FROM produits where type_produit = "accessoire"');
while($accessoire = $requete_accessoires->fetch(PDO::FETCH_ASSOC)) {

    $content.= '<div class="card border-dark w-75 container-fluid text-start">';

    $content.= '<div class="row g-0">';

    $content.= '<div class="col-sm-4">';
    $content.= '<img class="card-img-top img-thumbnail" src="./img/accessoires/' . $accessoire['photo_produit_1'] . '" alt="' . $accessoire['nom_produit'] . '">';
    $content.= '</div>';

    $content.= '<div class="col-sm-8">';
    $content.= '<div class="card-body">';
    $content.= '<h4 class="card-title">' . $accessoire['nom_produit'] . '</h4>';
    $content.= '<p class="card-text">' . $accessoire['description_produit'] . '</p>';
    $content.= '<p class="card-text">' . $accessoire['prix_produit'] . ' €</p>';
    $content.= '<a href="fiche.php?id=' . $accessoire['id_produit'] . '" class="justify-content-center btn btn-danger" target="_blank">Voir le produit</a>';
    $content.= '</div>';
    $content.= '</div>';

    $content.= '</div>';
    $content.= '</div>';
}


// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Accessoires";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "accessoires, vente, trépans";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content (qui est une fonction écrite dans le fichier init.inc.php) -->

<div class="row container-fluid g-1">
        <?php
            echo $content;         
        ?>  
    </div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

use PDO;

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>