<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("../inc/init.inc.php");

// Ici nous allons pouvoir valider le concert proposé par un membre

// Nous allons préremplir les champs du formulaire avec les informations récupérées en BDD.
if(isset($_GET['id'])){
    $requete = $pdo->prepare('SELECT * FROM spectacles_validation WHERE id_validation = :id_validation');
    $requete->execute(array(
        ':id_validation' => $_GET['id'] 
    ));
    $fiche = $requete->fetch(PDO::FETCH_ASSOC);
}

// vérification de la session :
// var_dump($_SESSION);

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Validation ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "valider, concert, admin";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<section class="container row bg-light text-center m-auto g-1">
    <h1>Ici vous allez pouvoir valider un concert ou un spectacle proposé par un membre.</h1>
    <p>Avec l'aide de la fiche remplie par l'utilisateur, vérifiez et récoltez les données nécessaires. Copiez directement l'image proposée dans le dossier concertsimg qui se trouve dans le dossier img.</p>
</section>
<!-- Formulaires : -->

<div class="container row bg-light text-center m-auto g-1">
<!-- Vérifier et ajouter : -->
<div class="">
  <h2>Ajouter ce spectacle proposé par le membre n° <?php echo $fiche['membre_id'] ?></h2>
    <form action="valid.php" method="POST" id="valid">
    <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="titre" placeholder="" name="titre" required>
                <label for="titre">Titre : <?php echo $fiche['titre']?></label>
            </div>
        </div>
        <p>Copier ce titre : <?php echo $fiche['titre']?></P>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="site" placeholder="" name="site" required>
                <label for="site">Site : <?php echo $fiche['site']?></label>
            </div>
        </div>
        <p>Copier ce lien : <?php echo $fiche['site']?></p>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="photo" placeholder="" name="photo" required>
                <label for="photo">Chemin absolu (forme "concertX.jpg")</label>
            </div>
        </div>
        <p>Rendez-vous ici : <a href="<?php echo $fiche['photo'] ?>" target="_blank" rel="noopener noreferrer">le lien de la photo proposée</a> pour enregistrer dans votre dossier img la photo proposée (dossier concertsimg dans le dossier img).</p>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="description" placeholder="" name="description" required>
                <label for="description">Description : <?php echo $fiche['description']?></label>
            </div>
        </div>
        <p>Copier : <?php echo $fiche['description']?></p>
       
       
        <div class="">
            <input class="btn btn-danger" type="submit" name="submitvalid" value="Valider"> 
        </div>
    </form>
</div>




<!-- Fin container formulaires : -->
</div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
 <?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>

