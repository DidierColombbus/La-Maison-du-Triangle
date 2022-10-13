<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("../inc/init.inc.php");

// Accessoires est une page réunissant tous les accessoires pour instruments (triangles) de notre boutique.
// Nous allons trouver ici des housses, des supports pour percussionnistes. 

$requete_spectacles = $pdo->query('SELECT * FROM spectacles');
while($spectacle = $requete_spectacles->fetch(PDO::FETCH_ASSOC)) {

    $content.= '<div class="card border-dark opacity-75 col-lg-6 col-md-6 col-sm-10 container-fluid">';

    $content.= '<div class="row g-0">';

    $content.= '<div class="col-sm-4">';
    $content.= '<img class="card-img-top" src="../img/concertsimg/' . $spectacle['photo_spectacle'] . '" alt="' . $spectacle['titre_spectacle'] . '">';
    $content.= '</div>';

    $content.= '<div class="col-sm-8">';
    $content.= '<div class="card-body">';
    $content.= '<h4 class="card-title">' . $spectacle['titre_spectacle'] . '</h4>';
    $content.= '<p class="card-text">' . $spectacle['description_spectacle'] . '</p>';
    $content.= '<a href=' . $spectacle['site_spectacle'] . ' class="justify-content-center btn btn-danger" target="_blank">Voir le site</a>';
    $content.= '</div>';
    $content.= '</div>';

    $content.= '</div>';
    $content.= '</div>';
}

$requete_validspectacles = $pdo->query('SELECT * FROM spectacles_validation');
while($validspectacle = $requete_validspectacles->fetch(PDO::FETCH_ASSOC)) {

    $content.= '<div class="card border-dark col-lg-6 col-md-6 col-sm-10 container-fluid">';

    $content.= '<div class="row g-0">';

    $content.= '<div class="col-sm-4">';
    $content.= '<img class="card-img-top" src="' . $validspectacle['photo'] . '" alt="' . $validspectacle['titre'] . '">';
    $content.= '</div>';

    $content.= '<div class="col-sm-8">';
    $content.= '<div class="card-body">';
    $content.= '<h4 class="card-title">' . $validspectacle['titre'] . '</h4>';
    $content.= '<p class="card-text">' . $validspectacle['description'] . '</p>';
    $content.= '<a href=' . $validspectacle['site'] . ' class="justify-content-center btn btn-danger" target="_blank">Voir le site</a>';
    $content.= '<a href="validconcert.php?id=' . $validspectacle['id_validation'] . ' " class="justify-content-center btn btn-danger" target="_blank">Valider ce concert</a>';
    $content.= '</div>';
    $content.= '</div>';

    $content.= '</div>';
    $content.= '</div>';
}



// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Les spectacles";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "gestion, spectacles, admin";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content (qui est une fonction écrite dans le fichier init.inc.php) -->

<div class="row container-fluid g-1 px-5">
        <?php
            echo $content;         
        ?>
    </div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>