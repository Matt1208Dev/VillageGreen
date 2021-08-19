<section id="myAccount" class="container-fluid">
    <!-- Header -->
    <div class="row mt-md-3">
        <header>
            <h3 class="pb-0">
                VOTRE ESPACE PERSONNEL
            </h3>
            <h5 class="mt-md-1 ps-md-2 ms-4 mb-md-4">
                Mettez à jour vos informations personnelles
            </h5>
        </header>
    </div>

    <!-- Colonne de navigation  -->
    <div class="row">
        <div id="local-nav" class="col-md-3 bg-dark-grey">
            <ul class="navbar-nav flex-colum mt-md-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Mes commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Mes derniers articles consultés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Customers/updateInformation');?>">Mes informations personnelles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Mes communications</a>
                </li>
            </ul>
        </div>

        <div id="update-information" class="col-md-9">
            <?php echo form_open('Customers/updateInformation');?>
                <div class="col-sm-12 col-md-10 row align-items-center justify-content-sm-center mx-sm-0 mx-lg-auto h-100">
                    <h4 class="pb-0">Votre identité</h4>
                    <hr>
                    <!-- Champ caché ID client -->
                    <input type="hidden" name="cus_id" id="cus_id" value="<?php echo set_value('cus_id', $customer[0]->cus_id);?>">
                    <!-- Lastname field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_lastname">Nom</label>
                        <input class="form-control col bg-grey" type="text" name="cus_lastname" id="cus_lastname" value="<?php echo set_value('cus_lastname', $customer[0]->cus_lastname);?>">
                        <?php echo form_error('cus_lastname');?>
                    </div>

                    <!-- Firstname field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_firstname">Prénom</label>
                        <input class="form-control col bg-grey" type="text" name="cus_firstname" id="cus_firstname" value="<?php echo set_value('cus_firstname', $customer[0]->cus_firstname);?>">
                        <?php echo form_error('cus_firstname');?>
                    </div>

                    <!-- Sex field -->
                    <div class="px-0 mt-sm-2 px-sm-0">
                        <p class="px-2 mb-1">Sexe</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input bg-grey" type="radio" value="0" name="cus_sex" id="cus_sex" <?php echo set_radio('cus_sex', '0', $customer[0]->cus_sex);?><?php if($customer[0]->cus_sex === '0'){echo 'checked=checked';};?>>
                            <label class="form-check-label" for="cus_type">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input bg-grey" type="radio" value="1" name="cus_sex" id="cus_sex" <?php echo set_radio('cus_sex', '1', $customer[0]->cus_sex);?><?php if($customer[0]->cus_sex === '1'){echo 'checked=checked';};?>>
                            <label class="form-check-label" for="cus_type">Femme</label>
                        </div>
                        <?php echo form_error('cus_sex');?>
                    </div>
                    
                    <!-- Status field -->
                    <div class="px-0 mt-sm-2 px-sm-0 mb-md-3">
                        <p class="px-2 mb-1">Je suis un : </p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input bg-grey" type="radio" value="Particulier" name="cus_type" id="cus_type" <?php echo set_radio('cus_type', 'Particulier', $customer[0]->cus_type);?><?php if($customer[0]->cus_type === 'Particulier'){echo 'checked=checked';};?>>
                            <label class="form-check-label" for="cus_type">Particulier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input bg-grey" type="radio" value="Professionnel" name="cus_type" id="cus_type" <?php echo set_radio('cus_type', 'Professionnel', $customer[0]->cus_type);?><?php if($customer[0]->cus_type === 'Professionnel'){echo 'checked=checked';};?>>
                            <label class="form-check-label" for="cus_type">Professionnel</label>
                        </div>
                        <?php echo form_error('cus_type');?>
                    </div>

                    <h4 class="pb-0">Votre adresse de facturation</h4>
                    <hr>
                    <!-- Address field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_address">Adresse</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_address" id="cus_bil_address" value="<?php echo set_value('cus_bil_address', $customer[0]->cus_bil_address);?>">
                        <?php echo form_error('cus_bil_address');?>
                    </div>

                    <!-- postal code filed -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_bil_postalcode">Code postal</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_postalcode" id="cus_bil_postalcode" value="<?php echo set_value('cus_bil_postalcode', $customer[0]->cus_bil_postalcode);?>">
                        <?php echo form_error('cus_bil_postalcode');?>
                    </div>

                    <!-- City field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label " for="cus_bil_city">Ville</label>
                        <input class="form-control col bg-grey" type="text" name="cus_bil_city" id="cus_bil_city" value="<?php echo set_value('cus_bil_city', $customer[0]->cus_bil_city);?>">
                        <?php echo form_error('cus_bil_city');?>
                    </div>

                    <h4 class="pb-0">Votre adresse de livraison</h4>
                    <hr>
                    <!-- Address field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_address">Adresse</label>
                        <input class="form-control col bg-grey" type="text" name="cus_del_address" id="cus_del_address" value="<?php echo set_value('cus_del_address', $customer[0]->cus_del_address);?>">
                        <?php echo form_error('cus_del_address');?>
                    </div>

                    <!-- postal code filed -->
                    <div class="row align-items-center mt-sm-2 px-sm-0">
                        <label class="form-label " for="cus_del_postalcode">Code postal</label>
                        <input class="form-control col bg-grey" type="text" name="cus_del_postalcode" id="cus_del_postalcode" value="<?php echo set_value('cus_del_postalcode', $customer[0]->cus_del_postalcode);?>">
                        <?php echo form_error('cus_del_postalcode');?>
                    </div>

                    <!-- City field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="cus_del_city">Ville</label>
                        <input class="form-control col bg-grey" type="text" name="cus_del_city" id="cus_del_city" value="<?php echo set_value('cus_del_city', $customer[0]->cus_del_city);?>">
                        <?php echo form_error('cus_del_city');?>
                    </div>

                    <h4 class="pb-0">Vos coordonnées</h4>
                    <hr>
                    <!-- Mobile phone number field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="cus_phone">Numéro de mobile</label>
                        <input class="form-control col bg-grey" type="tel" name="cus_phone" id="cus_phone" value="<?php echo set_value('cus_phone', $customer[0]->cus_phone);?>">
                        <?php echo form_error('cus_phone');?>
                    </div>

                    <!-- Email field -->                    
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control col bg-grey" type="text" name="cus_mail" id="email" placeholder="mail@example.com" value="<?php echo set_value('cus_mail', $customer[0]->cus_mail);?>">                       
                        <?php echo form_error('cus_mail');?>
                    </div>

                    <!-- Password field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-3">
                        <label class="form-label" for="password">Modifier votre mot de passe</label>
                        <input class="form-control col bg-grey" type="password" name="cus_pass" id="password" value="<?php echo set_value('cus_pass');?>">                     
                        <?php echo form_error('cus_pass');?>
                    </div>
                    <!-- Password confirmation field -->
                    <div class="row align-items-center mt-sm-2 px-sm-0 mb-md-1">
                        <label class="form-label" for="passwordConfirm">Confirmation nouveau mot de passe</label>
                        <input class="form-control col bg-grey" type="password" name="cus_pass_confirm" id="passwordConfirm" value="<?php echo set_value('cus_pass_confirm');?>">                                                  
                        <?php echo form_error('cus_pass_confirm');?>
                    </div> 
                    <input class="btn btn-lg  my-sm-0 mt-sm-3 mb-md-5 me-md-2 col-sm-11 col-md-3 col-lg-2 fw-bold orange-gradient" type="submit" value="Valider"></input>
                    <a class="btn btn-lg  my-sm-0 mt-sm-3 mb-md-5 col-sm-11 col-md-3 col-lg-2 fw-bold btn-secondary" href="<?php echo site_url('Customers/home');?>">Retour</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php var_dump($_POST);?>