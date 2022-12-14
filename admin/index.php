<?php
require_once("../inc/init.inc.php");

// Lecture de la session en cours pour vérification :
// var_dump($_SESSION);

// Index est la première page à s'afficher du site, c'est la page du back office d'où l'administrateur peut ensuite gérer une partie du contenu du site : ajouter, modifier ou supprimer un produit, autoriser l'inscription d'un concert. 

date_default_timezone_set('Europe/Paris');
$date = date('d m y');
$heure = date('H:i:s');
$reqcomptes = $pdo->query("SELECT * FROM membres");
$comptes = $reqcomptes->rowCount();
$reqconcerts = $pdo->query("SELECT * FROM spectacles");
$nbconcerts = $reqconcerts->rowCount();
$reqproduits = $pdo->query("SELECT id_produit FROM produits");
$nbproduits = $reqproduits->rowCount();

$contenu .= '<div class="bg-light text-center"><h2>Bienvenue dans le back-office de la Maison du Triangle.</h2>';
$contenu .= '<div>';
$contenu .= '<p>Bonjour ' . $_SESSION['membres']['pseudo'] . ', vous pourrez depuis cet espace contrôler les inscriptions de concert et ajouter, modifier ou supprimer un des produits du catalogue de la boutique.</p>';
$contenu .= '<p><img src="../img/icons/calendar.svg" alt="" "> Nous sommes le ' . $date . ' et il est (déjà !) ' . $heure . '.</p>';
$contenu .= '</div>';
$contenu .= '</div>';
$contenu .= '<div class="container">';
$contenu .= '<video src="../img/video/lamaisondutriangle.mp4"
        type="video/mp4" autoplay=1 muted controls width="75%">
</video>';
$contenu .= '</div>';
$contenu .= '<div class="bg-light text-center"><h2>Voici les statistiques de votre site :</h2>';
$contenu .= '<p><img src="../img/icons/hearts.svg" alt="" "> À ce jour nous avons ' . $comptes . ' membres.</p>';
$contenu .= '<p><img src="../img/icons/file-richtext.svg" alt="" "> Ces membres nous ont présenté ' . $nbconcerts . ' concerts.</p>';
$contenu .= '<p><img src="../img/icons/calculator.svg" alt="" "> Notre boutique compte à ce jour ' . $nbproduits . ' références d\'instruments et d\'accessoires.</p>';
$contenu .= '</div>';

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Back-office ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "gestion, validation, produits";

// Avec le require_once suivant nous allons pouvoir afficher le header propre au back-office : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
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

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>