<main id="delivery-infos">
    <nav>
        <p class="fw-light ps-5"><a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Home</a> > <a class="text-dark text-decoration-none" href="<?php echo site_url('Basket/viewBasket'); ?>">Votre Panier</a> > Vos informations</p>
    </nav>
    <header>
        <h3 class="fw-light ps-5 mb-0">Vos informations</h3>
        <p class=" ms-5">Merci de confirmer les informations suivantes, ou de les corriger si nécessaire.</p>
    </header>

    <div id="update-information" class="col-md-9">
            <?php echo form_open('Basket/CreateOrder');?>
                <div class="col-sm-12 col-md-10 row align-items-center justify-content-sm-center mx-sm-0 mx-md-auto h-100">
                <h4 class="pb-0">Votre adresse de facturation <a href="<?php echo site_url('Customers/updateInformation#bill-address');?>"><span class="badge bg-secondary">Modifier</span></a></h4>
                    <hr>
                    <!-- Champ adresse de facturation -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_bil__address">Adresse</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_address" id="cus_bil_address" value="<?php echo set_value('cus_bil_address', $customer[0]->cus_bil_address);?>" readonly>
                        <?php echo form_error('cus_bil_address');?>
                    </div>

                    <!-- Champ code postal de facturation -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_bil_postalcode">Code postal</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_postalcode" id="cus_bil_postalcode" value="<?php echo set_value('cus_bil_postalcode', $customer[0]->cus_bil_postalcode);?>" readonly>
                        <?php echo form_error('cus_bil_postalcode');?>
                    </div>

                    <!-- Champ ville de facturation -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label " for="cus_bil_city">Ville</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_city" id="cus_bil_city" value="<?php echo set_value('cus_bil_city', $customer[0]->cus_bil_city);?>" readonly>
                        <?php echo form_error('cus_bil_city');?>
                    </div>

                    <h4 class="pb-0">Votre adresse de livraison <a href="<?php echo site_url('Customers/updateInformation#delivery-address');?>"><span class="badge bg-secondary">Modifier</span></a></h4>
                    <hr>
                    <!-- Champ adresse de livraison -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="ord_del_address">Adresse</label>
                        <input class="form-control col bg-grey" type="text" name="ord_del_address" id="ord_del_address" value="<?php echo set_value('ord_del_address', $customer[0]->cus_del_address);?>" readonly>
                        <?php echo form_error('ord_del_address');?>
                    </div>

                    <!-- Champ code postal de livraison -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="ord_del_postalcode">Code postal</label>
                        <input class="form-control col bg-grey" type="text" name="ord_del_postalcode" id="ord_del_postalcode" value="<?php echo set_value('ord_del_postalcode', $customer[0]->cus_del_postalcode);?>" readonly>
                        <?php echo form_error('ord_del_postalcode');?>
                    </div>

                    <!-- Champ ville de livraison -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="ord_del_city">Ville</label>
                        <input class="form-control col bg-grey" type="text" name="ord_del_city" id="ord_del_city" value="<?php echo set_value('ord_del_city', $customer[0]->cus_del_city);?>" readonly>
                        <?php echo form_error('ord_del_city');?>
                    </div>

                    <h4 class="pb-0">Vos coordonnées <a href="<?php echo site_url('Customers/updateInformation#mobile');?>"><span class="badge bg-secondary">Modifier</span></a></h4>
                    <hr>
                    <!-- Champ téléphone de livraison -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="ord_del_phone">Numéro de mobile</label>
                        <input class="form-control col bg-grey" type="tel" name="ord_del_phone" id="ord_del_phone" value="<?php echo set_value('ord_del_phone', $customer[0]->cus_phone);?>" readonly>
                        <?php echo form_error('ord_del_phone');?>
                    </div>

                    <!-- Champ caché comportant l'ID du vendeur WEB, ici le 6 -->
                    <input type="hidden" name="com_id" value="6">

                    <div class="row justify-content-center">
                        <a class="d-block btn btn-lg  my-sm-0 mt-sm-3 mb-sm-5 mb-md-5 me-md-2 col-sm-11 col-md-4 fw-bold btn-secondary" href="<?php echo site_url('Basket/viewBasket');?>">Retour au panier</a>
                        <input type="submit" class="btn btn-lg  my-sm-0 mt-sm-3 mb-md-5 col-sm-11 col-md-5  fw-bold orange-gradient" value="Finaliser la commande">
                    </div>
                </div>
            </form>
        </div>
</main>