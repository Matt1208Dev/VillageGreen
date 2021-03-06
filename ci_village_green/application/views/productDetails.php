<main class="container-fluid p-0">
    <!-- Fil d'Ariane -->
    <nav>
        <p class="fw-light ps-5"><a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Home</a> > <a class="text-dark text-decoration-none" href="<?php echo site_url('Products/list/' . $product[0]->cat_id); ?>">
        <?php if (isset($product[0]->cat_name)) {
                                                    echo $product[0]->cat_name;
                                                } ?></a> > <?php if (isset($product[0]->pro_label)) {
                                                                echo $product[0]->pro_label;
                                                            } ?>
        </p>
    </nav>

    <!-- Titre catégorie et libellé article -->
    <header>
        <h3>
            <?php if (isset($product[0]->pro_label)) {
                echo $product[0]->pro_label;
            } ?>
        </h3>
    </header>

    <article>
        <div class="row m-0 justify-content-center align-items-stretch bg-white">
            <!-- Box visuel produit -->
            <div id="product-image" class="col-12 col-md-6 py-2 overflow-hidden">
                <img class="img-fluid zoom" src="<?php if (isset($product[0]->pro_id) && (isset($product[0]->pro_photo))) {
                                                        echo base_url('assets/images/products/' . $product[0]->pro_id . '.' . $product[0]->pro_photo);
                                                    } ?>" alt="photo du produit <?php if (isset($product[0]->pro_label)) {
                                                                                    echo $product[0]->pro_label;
                                                                                } ?>" title="<?php if (isset($product[0]->pro_label)) {
                                                                                                    echo $product[0]->pro_label;
                                                                                                } ?>">
            </div>
            <!-- Box disponibilité -->
            <div id="product-stat" class="col-12 col-md-6">
                <div class="details-header">
                    <span>REF: <?php if (isset($product[0]->pro_ref)) {
                                    echo $product[0]->pro_ref;
                                } ?></span>
                    <h4>
                        <?php if (isset($product[0]->pro_label)) {
                            echo $product[0]->pro_label;
                        } ?>
                    </h4>
                </div>
                <div class="details-body row flex-wrap m-0">
                    <div class="col-12 col-md-6">
                        <div class="details-stat col-12">
                            <p class="label"><b>DISPONIBILITE :</b></p>
                            <p><?php if (isset($product[0]->pro_phy_stk) && $product[0]->pro_phy_stk > 0) {
                                    echo '<img src="' . base_url('assets/images/icons/check.png') . '" ' . 'alt="logo coche verte">';
                                } else {
                                    echo '<img src="' . base_url('assets/images/icons/x.png') . '" ' . 'alt="logo indisponible">';
                                } ?>
                                <?php if (isset($product[0]->pro_phy_stk) && $product[0]->pro_phy_stk > 0) {
                                    echo $product[0]->pro_phy_stk . ' pièce(s) disponible(s)</p>';
                                } else {
                                    echo 'Actuellement indisponible<br>Délai moyen de réapprovisionnement 2 à 3 semaines.</p>';
                                } ?>
                        </div>
                        <div class="col-12">
                            <p class="label"><b>LIVRAISON :</b></p>
                            <p>Livraison standard : gratuite</p>
                        </div>
                        <div class="col-12">
                            <p class="label"><b>GARANTIE :</b></p>
                            <p>Produit garanti 3 ans.</p>
                        </div>

                    </div>
                    <!-- Box prix -->
                    <div class="details-price col-12 col-md-6 d-flex flex-column-reverse flex-md-column">

                        <!-- Bouton 'Ajouter au panier' -->
                        <?php   if(isset($customer[0]))
                                {
                                    echo form_open('Basket/addToBasket');
                                    ?>

                                    <!-- champs invisible fournissant les infos nécessaire au panier -->
                                    <input type="hidden" name="pro_qty" id="pro_qty" value="1">
                                    <input type="hidden" name="pro_spet" id="pro_spet" value="<?= $product[0]->pro_spet ?>">
                                    <input type="hidden" name="pro_ppet" id="pro_ppet" value="<?= $product[0]->pro_ppet ?>">
                                    <input type="hidden" name="pro_id" id="pro_id" value="<?= $product[0]->pro_id ?>">
                                    <input type="hidden" name="pro_label" id="pro_label" value="<?= $product[0]->pro_label ?>">
                                    <input type="hidden" name="pro_phy_stk" id="pro_phy_stk" value="<?= $product[0]->pro_phy_stk ?>">
                                    <input type="hidden" name="pro_photo" id="pro_photo" value="<?= $product[0]->pro_photo ?>">
                                    <input type="hidden" name="cus_type" id="cus_type" value="<?= $customer[0]->cus_type ?>">
                                    <input type="hidden" name="cus_coef" id="cus_coef" value="<?= $customer[0]->cus_coef ?>">
                                    
                                    <!-- Bouton -->
                                    <button type="submit">Ajouter au Panier</button>
                                    </form>
                        <?php
                                }
                        ?>
                        <div>
                            <p class="label"><b>VOTRE PRIX :</b></p>
                            <?php  // Affichage du prix selon typologie et coef client
                                    if (isset($product[0]->pro_ppet) && isset($customer[0])) 
                                    {
                                        if ($customer[0]->cus_type === "Particulier") 
                                        {
                            ?>
                                            <p class="your-price"><?php echo number_format($product[0]->pro_ppet + ($product[0]->pro_ppet *  $customer[0]->cus_coef / 100) + (($product[0]->pro_ppet + ($product[0]->pro_ppet *  $customer[0]->cus_coef / 100)) * 0.2), 2, ',', ' '); ?>€ <span class="fs-5">TTC</span></p>
                                            
                            <?php 
                                        }
                                        else if ($customer[0]->cus_type === "Professionnel") 
                                        {
                            ?>
                                            <p class="your-price"><?php echo number_format(($product[0]->pro_ppet + ($product[0]->pro_ppet * $customer[0]->cus_coef / 100)), 2, ",", " "); ?> € HT</p>
                            <?php 
                                        }                                        
                                    }
                                    else 
                                    {
                            ?>
                                        <p>Se connecter / <a class="text-white" href="<?php echo site_url('Customers/signUp'); ?>">S'inscrire</a> pour afficher votre prix</p>
                            <?php 
                                    }
                                ?>
                        </div>
                        <div>
                            <p class="label"><b>PRIX CATALOGUE :</b></p>
                            <p> <?php    if (isset($product[0]->pro_spet) && isset($customer[0])) 
                                        {
                                            if ($customer[0]->cus_type === "Particulier") 
                                            {
                                ?>
                                                <?php echo number_format(round(($product[0]->pro_spet * 1.20), 1),2, ",", " ");?> € TTC 
                                <?php
                                            } 
                                            else if ($customer[0]->cus_type === "Professionnel") 
                                            {
                                ?>
                                                <?php echo $product[0]->pro_spet; ?> € HT
                                <?php                                       
                                            }
                                        }
                                        else
                                        {
                                            echo number_format(round(($product[0]->pro_spet * 1.20), 1),2, ",", " ") . ' € TTC'; 
                                        }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Box descriptif produit -->
        <div class="product-desc">
            <h4>
                Descriptif du produit :
            </h4>
            <p>
                <?php if (isset($product[0]->pro_desc)) {
                    echo $product[0]->pro_desc;
                } ?>
            </p>
            <p>
                En catalogue depuis le <?php if (isset($product[0]->pro_add_date)) {
                                            echo date_format(new DateTime($product[0]->pro_add_date), 'd.m.Y');
                                        } ?>
            </p>
        </div>
    </article>
</main>

<!-- Bannière services -->
<div id="banner-services" class="row m-0">
    <img class="img-fluid w-100 px-0 pt-3 d-none d-sm-flex" src="<?php echo base_url('assets/images/BODY/banniere_centre_4_pictos.png'); ?>" alt="bannière de nos services" title="Nos services">
    <img class="img-fluid w-100 pt-3 px-0 d-flex d-sm-none" src="<?php echo base_url('assets/images/BODY/banniere_centre_2_pictos1.png'); ?>" alt="bannière de nos services" title="Nos services">
    <img class="img-fluid w-100 pb-2 px-0 d-flex d-sm-none" src="<?php echo base_url('assets/images/BODY/banniere_centre_2_pictos2.png'); ?>" alt="bannière de nos services" title="Nos services">
</div>