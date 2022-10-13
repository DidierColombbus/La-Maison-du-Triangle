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
    <link rel="stylesheet" href="../css/style.css">
    
    <!-- Lien vers le javascript du carroussel et JS bootstrap 5.2, en async pour ne pas interférer -->
    <script src="../javascript/script.js" async></script>


    <!-- Affichage title différent propre à chaque page avec la variable $title -->
    <title>👀 La Maison du triangle -  <?php echo $title; ?> !
    </title>
</head>

<body id="admin">

<!-- Barre de navigation avec icône, menu et connexion -->

<div class="navigation container w-100 p-1">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand fs-2" href="index.php"><img src="../img/icons/iconefond.png" alt="" srcset="" class="col-1"> La Maison du Triangle</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link  text-white" href=""><?php echo $title ?> de </a>
          </li>
           <!--Bienvenue au membre/admin si il est connecté -->
           <?php if($membre = connexion()) : ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="../compte.php"><?php echo $membre["pseudo"]?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="gestioninstruments.php">Instruments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="gestionaccessoires.php">Accessoires</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="gestionconcerts.php">Concerts (validation)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="../deconnexion.php">Déconnexion</a>
          </li>
            <?php endif; ?>
        </ul>
      </div>
    </nav>
          </div>
    </header>
    <main class="container w-100 p-1">

<!-- Fin du header, le contenu se retrouvera ici, la suite du <body> et la fermeture du <html> se retrouvent sur le footer.inc.php -->
    
