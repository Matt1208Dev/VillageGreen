<section id="delivery-infos">
    <div>
        <p class="fw-light ps-5"><a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Home</a> > <a class="text-dark text-decoration-none" href="<?php echo site_url('Basket/viewBasket'); ?>">Votre Panier</a> > Vos informations</p>
    </div>
    <header>
        <h3 class="fw-light ps-5 mb-0">Vos informations</h3>
        <p class=" ms-5">Merci de confirmer les informations suivantes, ou de les corriger si nécessaire.</p>
    </header>

    <div id="update-information" class="col-md-9">
            <?php echo form_open('Customers/updateInformation');?>
                <div class="col-sm-12 col-md-10 row align-items-center justify-content-sm-center mx-sm-0 mx-md-auto h-100">
                <h4 class="pb-0">Votre adresse de facturation <a href="<?php echo site_url('Customers/updateInformation#bill-address');?>"><span class="badge bg-secondary">Modifier</span></a></h4>
                    <hr>
                    <!-- Address field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_address">Adresse</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_address" id="cus_bil_address" value="<?php echo set_value('cus_bil_address', $customer[0]->cus_bil_address);?>" readonly>
                        <?php echo form_error('cus_bil_address');?>
                    </div>

                    <!-- postal code filed -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_bil_postalcode">Code postal</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_postalcode" id="cus_bil_postalcode" value="<?php echo set_value('cus_bil_postalcode', $customer[0]->cus_bil_postalcode);?>" readonly>
                        <?php echo form_error('cus_bil_postalcode');?>
                    </div>

                    <!-- City field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label " for="cus_bil_city">Ville</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_city" id="cus_bil_city" value="<?php echo set_value('cus_bil_city', $customer[0]->cus_bil_city);?>" readonly>
                        <?php echo form_error('cus_bil_city');?>
                    </div>

                    <h4 class="pb-0">Votre adresse de livraison <a href="<?php echo site_url('Customers/updateInformation#delivery-address');?>"><span class="badge bg-secondary">Modifier</span></a></h4>
                    <hr>
                    <!-- Address field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_address">Adresse</label>
                        <input class="form-control col bg-grey" type="text" name="cus_del_address" id="cus_del_address" value="<?php echo set_value('cus_del_address', $customer[0]->cus_del_address);?>" readonly>
                        <?php echo form_error('cus_del_address');?>
                    </div>

                    <!-- postal code filed -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_del_postalcode">Code postal</label>
                        <input class="form-control col bg-grey" type="text" name="cus_del_postalcode" id="cus_del_postalcode" value="<?php echo set_value('cus_del_postalcode', $customer[0]->cus_del_postalcode);?>" readonly>
                        <?php echo form_error('cus_del_postalcode');?>
                    </div>

                    <!-- City field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="cus_del_city">Ville</label>
                        <input class="form-control col bg-grey" type="text" name="cus_del_city" id="cus_del_city" value="<?php echo set_value('cus_del_city', $customer[0]->cus_del_city);?>" readonly>
                        <?php echo form_error('cus_del_city');?>
                    </div>

                    <h4 class="pb-0">Vos coordonnées <a href="<?php echo site_url('Customers/updateInformation#mobile');?>"><span class="badge bg-secondary">Modifier</span></a></h4>
                    <hr>
                    <!-- Mobile phone number field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="cus_phone">Numéro de mobile</label>
                        <input class="form-control col bg-grey" type="tel" name="cus_phone" id="cus_phone" value="<?php echo set_value('cus_phone', $customer[0]->cus_phone);?>" readonly>
                        <?php echo form_error('cus_phone');?>
                    </div>

                    <div class="row justify-content-center">
                        <a class="d-block btn btn-lg  my-sm-0 mt-sm-3 mb-sm-5 mb-md-5 me-md-2 col-sm-11 col-md-4 fw-bold btn-secondary" href="<?php echo site_url('Basket/viewBasket');?>">Retour au panier</a>
                        <a class="btn btn-lg  my-sm-0 mt-sm-3 mb-md-5 col-sm-11 col-md-5  fw-bold orange-gradient" href="<?php echo site_url('Basket/createOrder');?>">Finaliser la commande</a>
                    </div>
                </div>
            </form>
        </div>