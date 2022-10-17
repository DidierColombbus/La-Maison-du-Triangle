<?php

require_once("inc/init.inc.php");

// Sur cette page à lieu à la fois la connexion (et renvoie alors sur index.php), et l'echec de celle-ci, avec une invitation à revenir à la page de formcomptes.
// On commence par rappeler les variables $pseudo et $mot_de_passe

$pseudo = htmlspecialchars($_POST['pseudo']);
$mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitlogin" de la page formcomptes:

if (!empty($_POST['submitlogin'])) {
    extract($_POST);
    if (!empty($pseudo) && !empty($mot_de_passe)) {
        // Pour récupérer, en base de données, le compte dont le pseudo a été saisi dans le formulaire, on doit exécuter la requête SQL : "SELECT * FROM abonne WHERE pseudo = '$pseudo'"
        // La méthode "prepare()" de l'objet "$pdo" permet d'écrire une requête paramétrée (= au lieu de mettre directement la valeur du pseudo, on met un paramètre ":pseudo")

        $pdostatement = $pdo->prepare("SELECT * FROM membres WHERE pseudo = :pseudo");

        // La méthode "prepare()" retourne un objet $pdostatement qui va lier les paramètres de la requête à des valeurs associées.
        $pdostatement->bindValue(':pseudo', $pseudo);

        // Avec la méthode "execute()" de l'objet $pdostatement on va exécuter la requête SQL
        // La méthode "execute()" retourne un booléen (true si la requête s'est bien exécutée, false s'il y a eu une erreur)

        $resultat = $pdostatement->execute();

        // La méthode rowCount() retourne le nombre de lignes renvoyées par la requête SQL : ici soit 0 soit 1
        if ($resultat && $pdostatement->rowCount()) {
            // Les résultats de la requête sont dans l'objet $pdostatement. On peut les récupérer avec la méthode "fetch()" : pour récupérer un enregistrement la méthode et "fetchAll()" : pour récupérer un array de tous les enregistrements
            $membre = $pdostatement->fetch(PDO::FETCH_ASSOC);
            // vérification du fetch :
            // var_dump($membre);
            // Avec le if suivant on vérifie l'identité et le mot de passe haché du membre et on stocke via $membre les informations de la session. Les autres données seront aussi associées dans $membre à la session.
            if ($pseudo == $membre['pseudo'] && password_verify($mot_de_passe, $membre['mot_de_passe'])) {
                $_SESSION["membres"]["id_membre"] = $membre["id_membre"];
                $_SESSION["membres"]["pseudo"] = $membre["pseudo"];
                $_SESSION["membres"]["mot_de_passe"] = $membre["mot_de_passe"];
                $_SESSION["membres"]["mail_membre"] = $membre["mail_membre"];
                $_SESSION["membres"]["adresse_membre"] = $membre["adresse_membre"];
                $_SESSION["membres"]["nom_membre"] = $membre["nom_membre"];
                $_SESSION["membres"]["prenom_membre"] = $membre["prenom_membre"];
                $_SESSION["membres"]["avatar"] = $membre["avatar"];
                $_SESSION["membres"]["statut_membre"] = $membre["statut_membre"];
                $_SESSION["membres"]["telephone_membre"] = $membre["telephone_membre"];
                // Si je suis admin je suis redirigé directement vers le backoffice
                if ($_SESSION["membres"]["statut_membre"] == "admin") {
                    // Redirection vers la page back-office de l'administrateur
                    header("location:admin/index.php");
                    exit();
                }
                // Redirection vers la page index.php utilisateur si le membre n'est pas admin
                return header('location:index.php');
                exit;
            }
        } else {
            // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page formcomptes.php 
            $content .= '<div class="container">';
            $content .= '<p>Une erreur s\'est produite !</p>';
            $content .= '<p>Veuillez vous reconnecter ou vous inscrire</p>';
            $content .= '<button class="text-light"><a href="formcomptes.php">Suivre le lapin blanc</a></button>';
            $content .= '</div>';
        }
    }
}

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Erreur connexion ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "connexion, erreur, redirection";

require_once('inc/header.inc.php');
?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content si nécessaire (qui est une fonction écrite dans le fichier init.inc.php) -->
<?php

echo $content;

?>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>