<?php

?>
<!DOCTYPE HTML>
  <html lang="fr">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="description" content="Un CRUD pour la gestion des produits d'une boutique en ligne.">
      <meta name="keywords" content="Création, lecture, mise à jour, suppression">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <title>CRUD de gestion de produits</title>
    </head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom shadow">

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link link-secondary ms-2">Accueil</a></li>
        <li><a href="#offcanvasScrolling" class="nav-link link-secondary ms-2" role="button" data-bs-toggle="offcanvas" data-bs-target="" aria-controls="offcanvasScrolling">Dashboard</a></li>
      </ul>

    </header>
</div>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Tableau de bord</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body bg-dark">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100vh">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
             <span class="fs-4">Gestion produits</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <i class="bi bi-house-door me-2"></i>
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="index.php" class="nav-link text-white">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Liste de produits
                    </a>
                </li>
                <li>
                    <a href="create.php" class="nav-link text-white">
                        <i class="bi bi-table me-2"></i>
                        Créer un produit
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                      <i class="bi bi-person-lock me-2"></i>
                        Connexion
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-person-circle me-2"></i>
                        Créer un compte
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
