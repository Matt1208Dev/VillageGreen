<section id="myAccount" class="container-fluid">
    <!-- Fil d'Ariane -->
    <div>
        <p class="fw-light ps-5">
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Accueil</a> >
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Customers/myAccount'); ?>">Mon compte</a>
        </p>
    </div>
    <!-- Header -->
    <div class="row mt-md-3">
        <header>
            <h3>
                MON ESPACE PERSONNEL
            </h3>
        </header>
    </div>

    <!-- Colonne de navigation  -->
    <div class="row">
        <div id="local-nav" class="col-md-3 bg-dark-grey">
            <ul class="nav flex-colum mt-md-3">
                <li class="col-12 nav-item">
                    <a class="nav-link text-white" href="<?php echo site_url('Customers/myOrders');?>">Mes commandes</a>
                </li>
                <li class="col-12 nav-item">
                    <a class="nav-link text-white" href="">Mes derniers articles consultés</a>
                </li>
                <li class="col-12 nav-item">
                    <a class="nav-link text-white" href="<?php echo site_url('Customers/updateInformation');?>">Mes informations personnelles</a>
                </li>
                <li class="col-12 nav-item">
                    <a class="nav-link text-white" href="">Mes communications</a>
                </li>
            </ul>
        </div>

        <div id="account-content" class="col-md-9 d-flex align-items-center align-items-md-start">
        <h5 class="mt-2 mt-md-5">Bienvenue chez vous, <?php if(isset($_SESSION['username'])){ ?><span class="fw-bold"><?php echo $_SESSION['username'];?>.</span><?php };?><br><br>
                Gérez vos informations personnelles. Visualisez l'historique de vos commandes et bien plus encore...            
            </h5>
        </div>
    </div>
</section>
