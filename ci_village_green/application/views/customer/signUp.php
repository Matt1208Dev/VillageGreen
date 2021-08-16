<section class="container-fluid">
    <!-- FORM -->
    <?php echo form_open('Customer/signUp', 'class="row"');?>
        <div class="col-12">
            <!-- Title -->
            <header>
                <h2 class="text-center mb-5 fs-sm-3">
                    Créer vos identifiants
                </h2>
            </header>
        </div>

        <div class="mb-3">
            <!-- Email field -->
            <div class="col-sm-12 col-md-6">
                <div class="col-sm-12 col-lg-9 mx-lg-auto mb-sm-4">
                    <div class="row pe-md-4 px-sm-3">
                        <label class="form-label col-md-5 col-lg-4 text-md-end pe-2 me-2" for="email">E-mail</label>
                        <input class="form-control col bg-grey" type="text" name="cus_mail" id="email" value="<?php echo set_value('cus_mail');?>">                       
                    </div>
                    <?php echo form_error('cus_mail');?>
                </div>
            </div>
            <div class="row">
                <!-- Password field -->
                <div class="col-sm-12 col-md-6 mb-4">
                    <div  class="col-sm-12 col-lg-9 mx-auto row align-items-center">
                        <label class="form-label col-md-5 col-lg-4 text-md-end pe-2" for="password">Créer votre mot de passe</label>
                        <input class="form-control col bg-grey" type="password" name="cus_pass" id="password" value="<?php echo set_value('cus_pass');?>">                     
                    </div>
                    <?php echo form_error('cus_pass');?>
                </div>
                <!-- Password confirmation field -->
                <div class="col-sm-12 col-md-6 mb-4">
                    <div class="col-sm-12 col-lg-9 mx-auto row align-items-center">
                        <label class="form-label col-md-5 col-lg-4 text-md-end pe-2" for="passwordConfirm">Confirmation mot de passe</label>
                        <input class="form-control col bg-grey" type="password" name="cus_pass_confirm" id="passwordConfirm" value="<?php echo set_value('cus_pass_confirm');?>">                       
                    </div>
                    <?php echo form_error('cus_pass_confirm');?>
                </div>
            </div>                  
        </div>

        <div class="col-12">
            <!-- Title -->
            <header>
                <h2 class="text-center mb-5">
                    Vos informations
                </h2>
            </header>
        </div>

        <div class="col-sm-12 col-md-6 me-4 mb-3">
            <!-- Firstname field -->
            <div class="col-sm-12 col-lg-9 row align-items-center justify-content-sm-center mx-sm-0 mx-lg-auto h-100">
            <div class="row align-items-center mt-sm-1 px-sm-0">
                <label class="form-label text-md-end col-md-4" for="cus_firstname">Prénom</label>
                <input class="form-control col bg-grey" type="text" name="cus_firstname" id="cus_firstname" value="<?php echo set_value('cus_firstname');?>">
                <?php echo form_error('cus_firstname');?>
            </div>

            <!-- Lastname field -->
            <div class="row align-items-center mt-sm-1 px-sm-0">
                <label class="form-label text-md-end col-md-4" for="cus_lastname">Nom</label>
                <input class="form-control col bg-grey" type="text" name="cus_lastname" id="cus_lastname" value="<?php echo set_value('cus_lastname');?>">
                <?php echo form_error('cus_lastname');?>
            </div>

            <!-- Sex field -->
            <div class="px-0 mt-sm-1 px-sm-0">
                <p class="d-inline-block col-4 text-md-end px-3 mb-0">Sexe</p>
                <div class="form-check form-check-inline col-sm-3">
                    <input class="form-check-input bg-grey" type="radio" value="0" name="cus_sex" id="cus_sex" <?php echo set_radio('cus_sex', '0');?>>
                    <label class="form-check-label" for="cus_type">Homme</label>
                </div>
                <div class="form-check form-check-inline col-sm-3">
                    <input class="form-check-input bg-grey" type="radio" value="1" name="cus_sex" id="cus_sex" <?php echo set_radio('cus_sex', '1');?>>
                    <label class="form-check-label" for="cus_type">Femme</label>
                </div>
                <?php echo form_error('cus_sex');?>
            </div>

            <!-- Address field -->
            <div class="row align-items-center mt-sm-1 px-sm-0">
                <label class="form-label text-md-end col-md-4" for="cus_address">Adresse</label>
                <input class="form-control col bg-grey" type="text" name="cus_bil_address" id="cus_bil_address" value="<?php echo set_value('cus_bil_address');?>">
                <?php echo form_error('cus_bil_address');?>
            </div>

            <!-- postal code filed -->
            <div class="row align-items-center mt-sm-1 px-sm-0">
                <label class="form-label text-md-end col-md-4" for="cus_bil_postalcode">Code postal</label>
                <input class="form-control col bg-grey" type="text" name="cus_bil_postalcode" id="cus_bil_postalcode" value="<?php echo set_value('cus_bil_postalcode');?>">
                <?php echo form_error('cus_bil_postalcode');?>
            </div>

            <!-- City field -->
            <div class="row align-items-center mt-sm-1 px-sm-0">
                <label class="form-label text-md-end col-md-4" for="cus_bil_city">Ville</label>
                <input class="form-control col bg-grey" type="text" name="cus_bil_city" id="cus_bil_city" value="<?php echo set_value('cus_bil_city');?>">
                <?php echo form_error('cus_bil_city');?>
            </div>

            <!-- Status field -->
            <div class="px-0 mt-sm-1 px-sm-0">
                <p class="d-inline-block col-4 text-md-end px-3 mb-0">Je suis un : </p>
                <div class="form-check form-check-inline col-sm-3">
                    <input class="form-check-input bg-grey" type="radio" value="Particulier" name="cus_type" id="cus_type" <?php echo set_radio('cus_type', 'Particulier');?>>
                    <label class="form-check-label" for="cus_type">Particulier</label>
                </div>
                <div class="form-check form-check-inline col-sm-3">
                    <input class="form-check-input bg-grey" type="radio" value="Professionnel" name="cus_type" id="cus_type" <?php echo set_radio('cus_type', 'Professionnel');?>>
                    <label class="form-check-label" for="cus_type">Professionnel</label>
                </div>
                <?php echo form_error('cus_type');?>
            </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-5 px-4 ms-4 mb-3 mx-sm-0">
            <div class="row">
                <div id="phone-form-box" class="col mx-auto border border-bottom-0 border 1 border-dark">
                    <!-- Phone Infos title -->
                    <header>
                        <h4 class="text-center">
                            Vos numéros de téléphone
                        </h4>
                    </header>

                    <!-- Mobile phone number field -->
                    <div class="row align-items-center mb-3">
                        <label class="form-label text-end col-4" for="cus_phone">Numéro de portable</label>
                        <input class="form-control col bg-grey me-5" type="tel" name="cus_phone" id="cus_phone" value="<?php echo set_value('cus_phone');?>">
                        <?php echo form_error('cus_phone');?>
                    </div>
                    <div class="row align-items-center mb-3">
                        <label class="form-label text-end col-4" for="cus_xxx">Numéro de téléphone fixe</label>
                        <input class="form-control col bg-grey me-5" type="text">
                    </div>
                </div>

                <!-- Mobile phone number picture -->
                <div class="phone-form-box-img border border-top-0 border 1 border-dark">
                    <img class="img-fluid col mx-auto px-0" src="<?php echo base_url('assets/images/BODY/ESPACE CLIENT/CADRE numero-suivi.png');?>" alt="Suivez vos commandes par SMS" title="Suivez vos commandes par SMS">
                </div>
            </div>
            
        </div>
        <input class="btn btn-lg  my-sm-0 my-md-5 col-sm-11 col-md-2 mx-auto text-white fw-bold" type="submit" id="signup-submit" value="Valider"></input>
    </form>
    <!-- ENF FORM -->
</section>

<section class="container-fluid">
    <div action="" class="row">
        <img class="img-fluid mt-5 px-0" src="<?php echo base_url('assets/images/BODY/ESPACE CLIENT/bas de page pictos.png');?>" alt="Logos de nos partenaires Yamaha, Roland, Sennheiser et Behringer" title="Nos partenaires et services">
    </div>
</section>