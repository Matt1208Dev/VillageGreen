

<div class="container-fluid  d-flex flex-column justify-content-md-center min-vh-100 p-0">

<!-- Text Infos -->
<section id="main-content" class="mh-75 my-5 container-fluid">

    <!-- Welcome title -->
    <header>
      <h1 class="mb-5">Bienvenue dans l'espace Admin de Village Green!</h1>
    </header>

    <!-- Infos -->
    <p>Vous pouvez dans cette espace :</p>
    <ul class="col-12 col-xl-6">
      <li><a class="nav-link text-white ps-3 ps-lg-2" href="<?php echo site_url('Admin/dashboard'); ?>"><span class="text-deco-hover">Accéder au tableau de bord</span> : état des stocks, délais moyens de livraison etc.</a></li>
      <li><a class="nav-link text-white ps-3 ps-lg-2" href="<?php echo site_url('Admin/productList'); ?>"><span class="text-deco-hover">Gérer les produits du site</span> : ajouter, modifier, supprimer.</a></li>
      <li><a class="nav-link text-white ps-3 ps-lg-2 text-deco-hover" href="<?php echo site_url('Orders/OrderList'); ?>">Visualiser et suivre les commandes clients</a></li>
      <li><a class="nav-link text-white ps-3 ps-lg-2 text-deco-hover" href="#">Créer/modifier les fiches clients <span class="fst-italic">(À venir)</span></a></li>
    </ul>
</section>
</div>

