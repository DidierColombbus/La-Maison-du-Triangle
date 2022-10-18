<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("../inc/init.inc.php");

// Accessoires est une page réunissant tous les accessoires pour instruments (triangles) de notre boutique.
// Nous allons voir tous les accessoires avec la possibilité de les modifier, de les supprimer voir d'en ajouter. 

$requete_accessoires = $pdo->query('SELECT * FROM produits where type_produit = "accessoire"');
while ($accessoire = $requete_accessoires->fetch(PDO::FETCH_ASSOC)) {

    $contenu .= '<div class="card border-dark w-50 container-fluid">';

    $contenu .= '<div class="row g-0">';

    $contenu .= '<div class="col-sm-4">';
    $contenu .= '<img class="card-img-top h-auto" src="../img/accessoires/' . $accessoire['photo_produit_1'] . '" alt="' . $accessoire['nom_produit'] . '">';
    $contenu .= '</div>';

    $contenu .= '<div class="col-sm-8">';
    $contenu .= '<div class="card-body">';
    $contenu .= '<h4 class="card-title">' . $accessoire['nom_produit'] . '</h4>';
    $contenu .= '<p class="card-text">' . $accessoire['description_produit'] . '</p>';
    $contenu .= '<p class="card-text">' . $accessoire['prix_produit'] . ' €</p>';
    $contenu .= '<a href="formproduit.php?id=' . $accessoire['id_produit'] . '" class="justify-contenu-center btn btn-danger" target="_blank">Voir le produit</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';

    $contenu .= '</div>';
    $contenu .= '</div>';
}

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Gestion accessoires";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "gestion, accessoires, admin";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $contenu (qui est une fonction écrite dans le fichier init.inc.php) -->

<div class="row container-fluid g-1">
    <?php
    echo $contenu;
    ?>
</div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>