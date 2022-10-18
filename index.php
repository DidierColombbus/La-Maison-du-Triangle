<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Lecture de la session en cours pour vérification :
// var_dump($_SESSION);

// Index est la première page à s'afficher du site, c'est la page d'accueil.
// Nous allons y trouver une présentation (succinte) de l'instrument triangle, un carroussel avec des photos des concerts (récupérés de façon dynamique), ainsi qu'une présentation du concept du site : une boutique, une communauté, des cours, ceci avec des liens vers les différentes pages correspondantes. 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Bienvenue ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "présentation, triangle, boutique";

// Récupération des images, et liens des concerts de façon dynamique, du plus récent au plus ancien.

$requete = $pdo->query('SELECT * FROM spectacles ORDER by id_spectacle desc limit 0,3');
$photos = $requete->fetchAll(PDO::FETCH_ASSOC);
foreach ($photos as $photo) :
  $contenu .= '<div><a href="' . $photo['site_spectacle'] . '" target="_blank"><img src="./img/concertsimg/' . $photo['photo_spectacle'] . '" class="w-100" alt="' . $photo['titre_spectacle'] . '"></a></div>';
endforeach;

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- La div class container qui doit gérer la présentation du triangle et le carroussel latéral -->
<div class="container-fluid row text-start">

  <!-- La présentation du triangle dans une section latérale, 8/12 col -->

  <article class="col-lg-8 col-md-6 col-sm-12 p-1 bg-light text-dark mt-1">
    <h1 class="h2">Le triangle : un instrument pas comme les autres !</h1>
    <p>Depuis l'aube de l'humanité, les sons font partis de nos vies. Il y en a des beaux, des moins beaux, des très laids, des discrets, des forts, des gentils, des qui cassent les oreilles et d'autres qu'on n'oubliera pas si facilement. Parmi tous ces sons, on en retrouvera certains avec plaisir, ou avec crainte, et ils ne nous laisseront jamais indifférents. Pour se jouer de ses dieux l'homme a toujours chercher à les imiter. Il inventa l'art pour s'en souvenir, en sourire, en pleurer : s'emerveiller.</p>
    <p>Le paradoxe d'un triangle réside dans sa singulière évocation du vide, car c'est un élément tout de métal dont les notes naissent dans un creux tracé par des extrémités qui n'oseront jamais se toucher. Il est aussi amusant pour un enfant qu'un cerceau filant au bout du baton. Il est aussi ridicule pour un adulte qu'un théorème à demi oublié. Mais c'est pour le percussionniste un challenge infini, tout vibrant de pureté. Le triangle tinte en gouttes cristallines, recluses, ceintes au gré des lignes fines.</p>
    <section>
      <div id="notresite">
        <h2>Notre site : une communauté et sa <a href="map.php" target="_blank" class="text-decoration-none">boutique</a>.</h2>
      </div>
      <p>Depuis que nous nous sommes installés, nous avons à coeur de proposer à nos clients un lieu où se retrouver, partager et échanger. Une boutique conviviale où vous trouverez des <a href="../lamaisondutriangle/accessoires.php" target="_blank" rel="noopener noreferrer">accessoires</a> originaux pour vos <a href="../lamaisondutriangle/instruments.php" target="_blank" rel="noopener noreferrer">instruments</a> de qualité.</p>
      <p>En plus de réunir en un même lieu tout le nécessaire pour s'exercer, nos clients vous proposent ici-même leurs <a href="../lamaisondutriangle/concerts.php" target="_blank" rel="noopener noreferrer">concerts</a>.</p>
      <p>Enfin nous ouvrirons bientôt des sessions de <a href="../lamaisondutriangle/cours.php" target="_blank" rel="noopener noreferrer">cours</a> pour tous les âges et niveaux (veuillez bien lire les descriptions).</p>
    </section>
  </article>

  <!-- Le carroussel en JS pour avoir une base dynamique, utilisation de $conten pour l'affichage -->
  <div id="carouseljs" class="col-lg-4 col-md-6 col-sm-12 p-1">
    <?php
    echo $contenu;
    ?>
  </div>

</div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>