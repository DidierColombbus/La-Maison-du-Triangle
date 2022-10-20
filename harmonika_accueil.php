<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>🎶 Harmonika.com</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="bg-info">

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Harmonika.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Me connecter</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Nos harmonicas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">harmonicas diatoniques simples</a></li>
              <li><a class="dropdown-item" href="#">harmonicas diatoniques doubles</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">harmonicas chromatiques</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Je cherche" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
      </div>
    </div>
  </nav>

  <h1 class="text-center w-75 mx-auto mt-1 bg-light">L'harmonica est aussi un art de vivre.</h1>

  <div id="carouselExampleIndicators" class="carousel slide w-75 mx-auto" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/harmonika/harmonica1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/harmonika/harmonica2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/harmonika/harmonica3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section class="row w-75 mx-auto mt-1">
    <article class="col-md-6 col-sm-12 my-1 bg-light opacity-75">
      <h2 class="text-center">Mais qu'est-ce ?</h2>
      <div class="container-fluid col-6 text-center">
        <img src="img/harmonika/harmoniciste1.jpg" class="w-100 img-fluid" alt="">
      </div>
      <p>L'harmonica est un instrument de musique à vent, de la famille des bois, à anches libres, fonctionnant sur le même principe que l'accordéon : des anches (lamelles) métalliques de longueurs différentes, produisent les notes en vibrant au passage de l'air, soufflé par la bouche ou aspiré, cette configuration étant peu fréquente pour un instrument à vent.</p>
    </article>
    <article class="col-md-6 col-sm-12 my-1 bg-light opacity-75">
      <h2 class="text-center">Comment ?</h2>
      <div class="container-fluid col-6 text-center">
        <img src="img/harmonika/harmoniciste2.jpg" class="w-100" alt="">
      </div>
      <p>D'une tessiture normale de trois octaves, il se décline en trois grandes familles :</p>
      <ul>
        <li>l'harmonica diatonique simple ;</li>
        <li>l'harmonica diatonique double (appelé aussi trémolo) ;</li>
        <li>l'harmonica chromatique.</li>
      </ul>
      <p>L’instrumentiste de l’harmonica est l’harmoniciste.</p>
    </article>
  </section>

  <footer class="bg-light text-center">
    <?php
    echo '<p>' . date("Y") . ' © <i class="titre">U->Surf</i></p>';
    ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>