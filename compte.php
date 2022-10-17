<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Lecture de la session en cours pour vérification :
// var_dump($_SESSION['membres']);

// Compte est la page profil du membre.
// Nous récupérons ici les informations stockées durant la connexion (voir connexion : la vérification) et nous allons les distribuer dans une fiche qui apparaîtra grâce à $content.
// Nous allons aussi y trouver la possibilité d'envoyer une fiche concert pour alimenter la BDD et la possibilité de mettre un avatar.
// À terme il y aura aussi un indicateur correspondant au cours auquel le membre se sera inscrit.

$avatar = $_SESSION['membres']['avatar'];

$content .= '<div class="card border-dark w-75 container-fluid">';
$content .= '<div class="row g-0">';
$content .= '<div class="col-sm-12 p-1">';
$content .= '<div class="card-body p-1">';
$content .= '<h4 class="card-title"> Bonjour ' . $_SESSION['membres']['pseudo'] . '</h4>';
$content .= '<p class="card-text text-start">Nom : ' . $_SESSION['membres']['nom_membre'] . '</p>';
$content .= '<p class="card-text text-start">Prénom : ' . $_SESSION['membres']['prenom_membre'] . '</p>';
$content .= '<p class="card-text text-start">Mail : ' . $_SESSION['membres']['mail_membre'] . '</p>';
$content .= '<p class="card-text text-start">Adresse : ' . $_SESSION['membres']['adresse_membre'] . '</p>';
$content .= '<p class="card-text text-start">Numéro de téléphone : ' . $_SESSION['membres']['telephone_membre'] . '</p>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Mon compte ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "compte, commande, concerts";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<section class="container row bg-light text-center m-auto g-1">
    <h1>Bienvenue sur votre compte <?php echo $_SESSION['membres']['pseudo'] ?>.</h1>
    <p>Si vous le souhaitez nous vous proposons de publier votre concert ou spectacle sur notre site.</p>
</section>

<div class="container row bg-light text-center m-auto g-1">
    <!-- Ici nous allons afficher le body et tout ce qui est permis par $content (qui est une fonction écrite dans le fichier init.inc.php) -->
    <div class="row container-fluid g-1 col-6">
        <?php
        if (!empty($avatar)) {
            echo '<div class="container w-50"><img src="' . $_SESSION['membres']['avatar'] . '" alt="" class="w-100 rounded-circle"></div>
            <form action="avatar.php" method="POST" id="login">
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" id="avatar" placeholder="" name="avatar" pattern="[A-Za-z0-9]+{5,25}" value="' . $_SESSION['membres']['avatar'] . '"  required>
                    <label for="avatar">Vous pouvez charger ou changer l\'URl de votre avatar ici :</label>
                </div>               
            </div>
            <div class="">
                <input class="btn btn-danger" type="submit" name="submitmodifavatar" value="Je souhaite changer d\'avatar">
            </div>
        </form>';
        } else {
            echo '<p>Si vous souhaitez ajouter un avatar à votre profil c\'est ici. </p> <form action="avatar.php" method="POST" id="login">
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" id="avatar" placeholder="" name="avatar" pattern="[A-Za-z0-9]+{5,25}" required>
                    <label for="avatar">Vous pouvez charger l\'URl de votre avatar ici :</label>
                </div>
            </div>
            <div class="">
                <input class="btn btn-danger" type="submit" name="submitavatar" value="Je souhaite charger cet avatar">
            </div>
        </form>';
        }
        echo $content;
        ?>
    </div>

    <!-- Formulaire : -->

    <!-- Insertion de spectacle : -->
    <div class="col-6">
        <h2>Mon prochain spectacle</h2>
        <form action="insertshow.php" method="POST" id="show">
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" id="titre" placeholder="" name="titre" pattern="[A-Za-z0-9]+{5,25}" required>
                    <label for="titre">Titre</label>
                </div>
                <div class="invalid-feedback">
                    Votre titre doit contenir de 5 à 25 caractères: lettres et des chiffres autorisés.
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" placeholder="" name="description" id="description" required>
                    <label for="description">Description de votre spectacle</label>
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="url" class="form-control is-invalid" placeholder="" name="site" id="site" required>
                    <label for="site">Le site du spectacle</label>
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="url" class="form-control is-invalid" placeholder="" name="photo" id="photo" required>
                    <label for="photo">L'URL de l'affiche de votre spectacle</label>
                </div>
            </div>
            <div class="">
                <input class="btn btn-danger" type="submit" name="submitshow" value="Présentez votre spectacle">
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