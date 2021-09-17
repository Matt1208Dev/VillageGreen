<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- lien CDN Bootstrap 5.0.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- feuille de style espace Admin -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin-home-style.css'); ?>">
  <title>Espace Admin</title>
</head>

<body>

  <!-- Navbar -->
  <nav id="navbar" class="navbar navbar-expand-lg navbar-light py-0 sticky-top">
    <div class="container-fluid ps-0 pe-1">
      <a id="navbar-logo" class="navbar-brand py-0" href="<?php echo site_url('Admin/home'); ?>">
        <img src="<?php echo base_url('assets/images/HEADER/logo_village_green.png'); ?>" alt="logo Village Green" title="logo Village Green">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link text-dark text-deco-hover ps-3 ps-lg-2" href="<?php echo site_url('Admin/dashboard'); ?>">Tableau de bord</a>
          <a class="nav-link text-dark text-deco-hover ps-3 ps-lg-2" href="<?php echo site_url('Admin/productList'); ?>">Gestion des produits</a>
          <a class="nav-link text-dark text-deco-hover ps-3 ps-lg-2" href="<?php echo site_url('Orders/OrderList'); ?>">Commandes clients</a>
          <a class="nav-link text-dark text-deco-hover ps-3 ps-lg-2" href="#">Base de données clients</a>
          <a class="nav-link text-dark text-deco-hover ps-3 ps-lg-2" href="<?php echo site_url('Admin/sessionDestroy'); ?>">Déconnexion</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- fin Navbar -->