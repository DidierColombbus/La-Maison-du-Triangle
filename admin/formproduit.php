<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("../inc/init.inc.php");

// Avec le formproduit nous allons soit modifier (UPDATE) soit ajouter (INSERT) soit supprimer (DELETE) un produit.

// Pour supprimer le produit on rappelle son id ici avec $_GET.

// Nous allons préremplir les champs du formulaire avec les informations récupérées en BDD.
if(isset($_GET['id'])){
    $requete = $pdo->prepare('SELECT * FROM produits WHERE id_produit = :id_produit');
    $requete->execute(array(
        ':id_produit' => $_GET['id'], 
    ));
    $fiche = $requete->fetch(PDO::FETCH_ASSOC);
}

// vérification de la session pour vérification :
// var_dump($_SESSION);

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Outil de gestion ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "ajouter, updater, supprimer";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<section class="container row bg-light text-center m-auto g-1">
    <h1>Ici vous allez pouvoir ajouter, modifier ou supprimer un produit.</h1>
</section>
<!-- Formulaires : -->

<div class="container row bg-light text-center m-auto g-1">
<!-- Ajouter : -->
<div class="col-6">
  <h2>Ajouter un produit :</h2>
    <form action="ajout.php" method="POST" id="ajout">
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="nom_produit" placeholder="" name="nom_produit" required>
                <label for="nom_produit">Nom du produit</label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="reference_fournisseur" placeholder="" name="reference_fournisseur" required>
                <label for="reference_fournisseur">Référence donnée par le fournisseur</label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="fournisseur" placeholder="" name="fournisseur" required>
                <label for="fournisseur">Fournisseur</label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="description_produit" placeholder="" name="description_produit" required>
                <label for="description_produit">Description du produit</label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="materiau" placeholder="" name="materiau" required>
                <label for="materiau">Matériau</label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" placeholder="" name="prix_produit" id="prix_produit" required>
                <label for="prix_produit">Prix</label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" placeholder="" name="type_produit" id="type_produit" value="<?php echo $fiche['type_produit']?>" required>
                <label for="type_produit">Type de produit : <?php echo $fiche['type_produit']?></label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" placeholder="" name="stock" id="stock" required>
                <label for="stock">Stock</label>
            </div>
        </div>
        
        <div class="">
            <input class="btn btn-danger" type="submit" name="submitajout" value="Ajouter"> 
        </div>
    </form>
</div>

<!-- Modifier avec un formulaire prérempli : -->
<div class="col-6">
  <h2>Modifier ce produit :</h2>
    <form action="modif.php" method="POST" id="modif">
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="number" class="form-control is-invalid" id="id_produit" placeholder="" name="id_produit" value="<?php echo $fiche['id_produit']?>" required>
                <label for="id_produit">Id BDD : <?php echo $fiche['id_produit']?></label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="nom_produit" placeholder="" name="nom_produit" value="<?php echo $fiche['nom_produit']?>" required>
                <label for="nom_produit">Nom : <?php echo $fiche['nom_produit']?></label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="reference_fournisseur" placeholder="" name="reference_fournisseur" value="<?php echo $fiche['reference_fournisseur']?>">
                <label for="reference_fournisseur">Référence: <?php echo $fiche['reference_fournisseur']?></label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="fournisseur" placeholder="" name="fournisseur" value="<?php echo $fiche['fournisseur']?>">
                <label for="fournisseur">Fournisseur : <?php echo $fiche['fournisseur']?></label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="description_produit" placeholder="" name="description_produit" value="<?php echo $fiche['description_produit']?>">
                <label for="description_produit">Description : <?php echo $fiche['description_produit']?></label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="materiau" placeholder="" name="materiau" value="<?php echo $fiche['materiau']?>">
                <label for="materiau">Matériau : <?php echo $fiche['materiau']?></label>
            </div>
        </div>
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
               <input type="decimal" step="any" class="form-control is-invalid" placeholder="" name="prix_produit" id="prix_produit" value="<?php echo $fiche['prix_produit']?>">
                <label for="prix_produit">Prix : <?php echo $fiche['prix_produit']?> €</label>
            </div>
        </div>

        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" placeholder="" name="stock" id="stock" value="<?php echo $fiche['stock']?>">
                <label for="stock">Stock : <?php echo $fiche['stock']?></label>
            </div>
        </div>
        <div class="">
            <input class="btn btn-danger" type="submit" name="submitmodif" value="Modifier"> 
        </div>
    </form>
</div>

<!-- Supprimer : -->
<div class="col-12">
  <h2>Supprimer ce produit :</h2>
    <form action="supprimer.php" method="post" id="supprimer">
        <div class="input-group has-validation">
            <div class="form-floating is-invalid">
                <input type="text" class="form-control is-invalid" id="nom_produit" placeholder="" name="nom_produit" required>
                <label for="nom_produit">Êtes-vous sûr de vouloir supprimer ce produit ? <?php echo $fiche['nom_produit'] . ' Référence : ' . $fiche['reference_fournisseur']?>  Veuillez noter à nouveau le nom du produit.</label>
            </div>
        </div>
        <div class="">
            <input class="btn btn-danger" type="submit" name="submitsupprimer" value="Supprimer"> 
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

