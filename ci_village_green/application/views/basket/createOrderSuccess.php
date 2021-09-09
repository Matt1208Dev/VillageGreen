<div class="container-fluid min-vh-75 mt-5 px-0">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 d-flex flex-column justify-content-center align-items-center">
            <p class="fs-2 mb-5 text-center">Merci <?php if (isset($_SESSION['username'])) {
                                                        echo $_SESSION['username'];
                                                    } ?> pour votre commande n°<?php if (isset($cus_id)) {
                                                                                    echo $cus_id[0]->ord_id;
                                                                                } ?>.</p>
            <p class="fs-2 mb-5 text-center">Vous pouvez suivre son avancement dans votre espace personnel, rubrique mes commandes.</p>
            <div class="col-12 text-center">
                <a href="<?php echo site_url('Customers/myAccount'); ?>" class="col-12 col-sm-5 col-md-3 btn text-white fw-bold orange-gradient mb-md-5">Mon compte</a>
                <a href="<?php echo site_url('Products/home'); ?>" class="col-12 col-sm-5 col-md-3 btn btn-secondary mb-0 mb-md-5">Retour à l'accueil</a>
            </div>
        </div>
    </div>

    <!-- Bannière services -->
    <section id="banner-services" class="row m-0">
        <img class="img-fluid w-100 px-0 pt-3 pb-2 d-none d-sm-flex" src="<?php echo base_url('assets/images/BODY/banniere_centre_4_pictos.png'); ?>" alt="bannière de nos services" title="Nos services">
        <img class="img-fluid w-100 pt-3 px-0 d-flex d-sm-none" src="<?php echo base_url('assets/images/BODY/banniere_centre_2_pictos1.png'); ?>" alt="bannière de nos services" title="Nos services">
        <img class="img-fluid w-100 pb-2 px-0 d-flex d-sm-none" src="<?php echo base_url('assets/images/BODY/banniere_centre_2_pictos2.png'); ?>" alt="bannière de nos services" title="Nos services">
    </section>

</div>