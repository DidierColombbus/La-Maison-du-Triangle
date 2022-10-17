<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// La page fiche présente le produit (en stocks), affichés latéralement, avec un carroussel de choix de photos (1 à 5) et un bouton d'achat.

if (isset($_GET['id'])) {
    $requete = $pdo->prepare('SELECT * FROM produits WHERE id_produit = :id_produit');
    $requete->execute(array(
        ':id_produit' => $_GET['id'],
    ));
    $fiche = $requete->fetch(PDO::FETCH_ASSOC);
    $content .= '<div class="card border-dark w-75 container-fluid  text-start">';
    $content .= '<div class="row g-0">';
    $content .= '<div class="col-sm-12 p-1">';
    $content .= '<div class="card-body p-1">';
    $content .= '<h4 class="card-title">' . $fiche['nom_produit'] . ' - ' . $fiche['reference_fournisseur'] . '</h4>';
    $content .= '<p class="card-text">Description : ' . $fiche['description_produit'] . '</p>';
    $content .= '<p class="card-text">Matériaux : ' . $fiche['materiau'] . '</p>';
    $content .= '<p class="card-text">Fabricant : ' . $fiche['fournisseur'] . '</p>';
    $content .= '<p class="card-text">Catégorie : ' . $fiche['type_produit'] . '</p>';
    $content .= '<p class="card-text">Prix : ' . $fiche['prix_produit'] . ' €</p>';
    $content .= '<div class="row container-fluid">';
    $content .= '<div class="col-4"><img class="card-img-top img-thumbnail w-100 h-auto" src="./img/' . $fiche['type_produit'] . 's/' . $fiche['photo_produit_1'] . '" alt="' . $fiche['nom_produit'] . '"></div>';
    $content .= '<div class="col-4"><img class="card-img-top img-thumbnail w-100 h-auto" src="./img/' . $fiche['type_produit'] . 's/' . $fiche['photo_produit_2'] . '" alt="' . $fiche['nom_produit'] . '"></div>';
    $content .= '<div class="col-4"><img class="card-img-top img-thumbnail w-100 h-auto" src="./img/' . $fiche['type_produit'] . 's/' . $fiche['photo_produit_3'] . '" alt="' . $fiche['nom_produit'] . '"></div>';
    $content .= '</div>';
    $content .= '<p class="card-text">Disponibilité : ' . $fiche['stock'] . '</p>';
    $content .= '</div>';
    $content .= '</div>';
    $content .= '</div>';
    $content .= '</div>';
}

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Votre produit ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "détails, vente, produit";

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

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>