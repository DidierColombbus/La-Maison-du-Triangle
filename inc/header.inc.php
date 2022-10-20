<!DOCTYPE html>
<html lang="fr-FR">

<head>
  <!-- Charset UTF-8 pour déclarer le jeu de caractères avec lequel la page est codée.  -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Utilisation de balises pour mettre mon nom sur le projet et une description de moins de 160 caractères (pour Bing) pour mieux inciter l'internaute à cliquer -->
  <meta name="author" content="Didier Rouillon">
  <meta name="description" content="La Maison du Triangle est un site proposant des triangles, un instrument de musique, et des accessoires, permettant aussi à ses clients de présenter leurs concerts ou de prendre des cours.">
  <!-- Affichage de keywords différents avec la variable $keywords -->
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <!-- Lien vers CSS et CSS bootstrap 5.2 -->
  <link rel="stylesheet" href="./css/style.css">



  <!-- L'icône du site avec le logo passé en favicon -->
  <link rel="icon" type="image/png" href="./img/icons/favicon-32x32.png" size="32x32" />

  <!-- Affichage title différent propre à chaque page avec la variable $title -->
  <title>La Maison du triangle - <?php echo $title; ?> !</title>

</head>

<body>

  <!-- Barre de navigation avec icône, menu et connexion -->

  <div class="navigation container w-100 p-1"><a href="index.php" class="col-2 float-center" target="_blank" rel="noopener noreferrer"><img src="./img/icons/logo.png" class="img-fluid" width="125" alt="" srcset=""></a>
    <h2 class="navbar-brand fs-1 align-text-top titre" href="index.php">La Maison du Triangle</h2>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <ul class="navbar-nav mx-auto row">
          <li class="nav-item col">
            <a class="nav-link text-white text-nowrap" href=""><?php echo $title ?></a>
          </li>

          <!--Bienvenue au membre/admin si il est connecté -->
          <?php
          $contenu_nav = '';
          if ($membre = connexion()) {
            $contenu_nav .= '<li class="nav-item col">';
            $contenu_nav .= '<a class="nav-link text-white" href="compte.php">' . $membre["pseudo"] . ' </a>';
            $contenu_nav .= '</li>';
            $contenu_nav .= '<li class="nav-item col">';
            $contenu_nav .= '<a class="nav-link text-white" href="deconnexion.php">Déconnexion</a>';
            $contenu_nav .= '</li>';
            // Si il n'est pas connecté ou souhaite s'inscrire
          } else {
            $contenu_nav .= '<li class="nav-item col">';
            $contenu_nav .= '<a class="nav-link text-white" href="formcomptes.php">Connexion</a>';
            $contenu_nav .= '</li>';
            $contenu_nav .= '<li class="nav-item col">';
            $contenu_nav .= '<a class="nav-link text-white" href="formcomptes.php">Inscription</a>';
            $contenu_nav .= '</li>';
          }
          ?>

          <?php
          echo $contenu_nav;
          ?>

        </ul>
      </div>
    </nav>
  </div>
  </div>
  </header>
  <main class="container w-100 p-1">

    <!-- Fin du header, le contenu se retrouvera ici, la suite du <body> et la fermeture du <html> se retrouvent sur le footer.inc.php -->