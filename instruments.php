<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// La page instruments regroupe tous les triangles disponibles (en stocks), affichés latéralement, à raison d'un produit par ligne. Chaque produit permettra l'affichage d'une fiche produit/achat. 

$requete_instruments = $pdo->query('SELECT * FROM produits where type_produit = "triangle"');
while ($instrument = $requete_instruments->fetch(PDO::FETCH_ASSOC)) {

    $contenu .= '<div class="card border-dark w-75 container-fluid text-start">';

    $contenu .= '<div class="row g-0">';

    $contenu .= '<div class="col-sm-4">';
    $contenu .= '<img class="card-img-top img-thumbnail h-auto" src="./img/triangles/' . $instrument['photo_produit_1'] . '" alt="' . $instrument['nom_produit'] . '">';
    $contenu .= '</div>';

    $contenu .= '<div class="col-sm-8">';
    $contenu .= '<div class="card-body">';
    $contenu .= '<h4 class="card-title">' . $instrument['nom_produit'] . '</h4>';
    $contenu .= '<p class="card-text">' . $instrument['description_produit'] . '</p>';
    $contenu .= '<p class="card-text">' . $instrument['prix_produit'] . ' €</p>';
    $contenu .= '<a href="fiche.php?id=' . $instrument['id_produit'] . '" class="justify-contenu-center btn btn-danger" target="_blank">Voir le produit</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';

    $contenu .= '</div>';
    $contenu .= '</div>';
}

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Instruments ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "triangles, vente, instruments";

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