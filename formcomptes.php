<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Connexion proposera au visiteur du site de se connecter ou de s'inscrire.
// Utiliser la même page pour 2 formulaires et deux boutons submits qui renvoient chacun à une page propre.
// Input submitlogin pour se connecter renvoie à la page connexion.php qui elle-même va renvoyer à index.php tout en créant une session avec tous les paramètres du compte.
// Inpout submitinscript pour s'inscrire renvoie à la page inscription.php qui elle-même va renvoyer à index.php tout en injectant les informations du compte créé dans la BDD.

// vérification de la session :
// var_dump($_SESSION);

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Rejoindre ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "connexion, inscription, formulaire";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<section class="container row bg-light text-center m-auto g-1">
    <h1>Veuillez-vous connecter ou vous inscrire.</h1>
    <p>Chaque donnée fournie est nécessaire au fonctionnement de votre compte, merci de respecter les consignes indiquées afin que votre inscription soit complète.</p>
</section>
<!-- Formulaires : -->

<div class="container row bg-light text-center m-auto g-1">
    <!-- Connexion : -->
    <div class="col-6">
        <h2>Je me connecte</h2>
        <form action="connexion.php" method="POST" id="login">
            <div class="input-group has-validation">
                <span class="input-group-text"><img src="./img/icons/person-workspace.svg" alt="" srcset=""></span>
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" id="pseudo" placeholder="" name="pseudo" pattern="[A-Za-z0-9]+{5,25}" required>
                    <label for="pseudo">Pseudo</label>
                </div>
                <div class="invalid-feedback">
                    Veuillez entrer votre pseudo.
                </div>
            </div>
            <div class="input-group has-validation">
                <span class="input-group-text"><img src="./img/icons/keyboard.svg" alt="" srcset=""></span>
                <div class="form-floating is-invalid">
                    <input type="password" class="form-control is-invalid" placeholder="" name="mot_de_passe" id="mot_de_passe" pattern="[A-Za-z0-9]+" required>
                    <label for="mot_de_passe">Mot de passe</label>
                </div>
                <div class="invalid-feedback">
                    Veuillez entrer votre mot de passe.
                </div>
            </div>
            <div class="">
                <input class="btn btn-danger" type="submit" name="submitlogin" value="Se connecter">
            </div>
        </form>
    </div>


    <!-- Inscription : -->
    <div class="col-6">
        <h2>Je m'inscris</h2>
        <form action="inscription.php" method="POST" id="inscript">
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" id="pseudo" placeholder="" name="pseudo" pattern="[A-Za-z0-9]+{5,25}" required>
                    <label for="pseudo">Pseudo</label>
                </div>
                <div class="invalid-feedback">
                    Votre pseudo doit contenir de 5 à 25 caractères: lettres et chiffres autorisés.
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="password" class="form-control is-invalid" placeholder="" name="mot_de_passe" id="mot_de_passe" pattern="[A-Za-z0-9]+{5,50}" required>
                    <label for="mot_de_passe">Mot de passe</label>
                </div>
                <div class="invalid-feedback">
                    Votre mot de passe peut contenir jusqu'à 50 caractères: lettres et chiffres autorisés.
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" placeholder="" name="nom_membre" id="nom_membre" pattern="[A-Za-z]+" required>
                    <label for="nom_membre">Votre nom.</label>
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" placeholder="" name="prenom_membre" id="prenom_membre" pattern="[a-zA-Z][a-zA-Z .,'-]+" required>
                    <label for="nom_membre">Votre prénom.</label>
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="email" class="form-control is-invalid" placeholder="" name="mail_membre" id="mail_membre" required>
                    <label for="mail_membre">Votre adresse de courriel.</label>
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" placeholder="" name="telephone_membre" id="telephone_membre" pattern="[0-9]+{10}" required>
                    <label for="telephone_membre">Votre numéro de téléphone (France).</label>
                </div>
            </div>
            <div class="input-group has-validation">
                <div class="form-floating is-invalid">
                    <input type="text" class="form-control is-invalid" placeholder="" name="adresse_membre" id="adresse_membre" pattern="[a-zA-Z0-9\s]+(\.)? [a-zA-Z]+(\,)? [A-Z]{2} [0-9]{5,6}" required>
                    <label for="adresse_membre">Votre adresse</label>
                </div>
            </div>
            <div class="">
                <input class="btn btn-danger" type="submit" name="submitinscript" value="S'inscrire">
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