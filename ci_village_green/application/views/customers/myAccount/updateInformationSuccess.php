<section id="myAccount" class="container-fluid">
    <!-- FIl d'Ariane -->
    <nav>
        <p class="fw-light ps-5">
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Accueil</a> >
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Customers/myAccount'); ?>">Mon compte</a> > 
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Customers/updateInformation'); ?>">Mes informations personnelles</a>
        </p>
    </nav>
    <!-- Header -->
    <div class="row mt-md-3">
        <header>
            <h3>
            MES INFORMATIONS PERSONNELLES
            </h3>
        </header>
    </div>

    <!-- Colonne de navigation  -->
    <div class="row min-vh-100">
        <div id="local-nav" class="col-md-3 bg-dark-grey">
            <ul class="nav flex-colum mt-md-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo site_url('Customers/myOrders');?>">Mes commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Mes derniers articles consultés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo site_url('Customers/updateInformation');?>">Mes informations personnelles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Mes communications</a>
                </li>
            </ul>
        </div>

        <div id="account-content" class="col-md-9 d-flex flex-column align-items-center">
            <h4 class="mt-md-5">La mise à jour de vos informations a été effectué.</h4>
            <a href="<?php echo site_url('Customers/myAccount'); ?>" class="col-2 btn btn-secondary mb-5">Retour</a>
        </div>
    </div>
</section>
