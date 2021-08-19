<section id="myAccount" class="container-fluid">
    <!-- Header -->
    <div class="row mt-md-3">
        <header>
            <h3>
                VOTRE ESPACE PERSONNEL
            </h3>
        </header>
    </div>

    <!-- Colonne de navigation  -->
    <div class="row min-vh-100">
        <div id="local-nav" class="col-md-3 bg-dark-grey">
            <ul class="nav flex-colum mt-md-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Mes commandes</a>
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

        <div id="account-content" class="col-md-9">
        <h5 class="mt-md-5">Bienvenue chez vous, <?php if(isset($_SESSION['username'])){ ?><span class="fw-bold"><?php echo $_SESSION['username'];?>.</span><?php };?><br><br>
                Gérez vos informations personnelles. Visualisez l'historique de vos commandes et bien plus encore...            
            </h5>
        </div>
    </div>
</section>
