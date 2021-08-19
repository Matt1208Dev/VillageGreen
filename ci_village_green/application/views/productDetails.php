<?php //var_dump($product); ?>

<section >
    <!-- Titre catégorie et libellé article -->
    <header>
        <h3>
            <?php echo $product[0]->cat_name . ' > ' . $product[0]->pro_label; ?>
        </h3>
    </header>

    <article id="product-details">
        <!-- Box visuel produit -->
        <div id="product-image">
            <img src="<?php if(isset($product[0]->pro_id) && (isset($product[0]->pro_photo))){echo base_url('assets/images/products/' . $product[0]->pro_id . '.' . $product[0]->pro_photo) ;} ?>" alt="photo du produit <?php if(isset($product[0]->pro_label)){echo $product[0]->pro_label;}?>" title="<?php if(isset($product[0]->pro_label)){echo $product[0]->pro_label;}?>">
        </div>
        <!-- Box disponibilité -->
        <div id="product-stat">
            <div class="details-header">
                <span>REF: <?php if(isset($product[0]->pro_ref)){echo $product[0]->pro_ref;} ?></span>
                <h4>
                    <?php if(isset($product[0]->pro_label)){echo $product[0]->pro_label;}?>
                </h4>
            </div>
            <div class="details-body">
                <div class="details-stat">
                    <p class="label"><b>DISPONIBILITE :</b></p>
                    <p><?php if(isset($product[0]->pro_phy_stk) && $product[0]->pro_phy_stk > 0){echo '<img src="' . base_url('assets/images/icons/check.png') . '" ' . 'alt="logo coche verte">';}else {echo '<img src="' . base_url('assets/images/icons/x.png') . '" ' . 'alt="logo indisponible">';} ?>
                        <?php if(isset($product[0]->pro_phy_stk) && $product[0]->pro_phy_stk > 0){echo $product[0]->pro_phy_stk . ' pièce(s) disponible(s)</p>';}else {echo 'Actuellement indisponible</p>';} ?>
                    <p class="label"><b>LIVRAISON :</b></p>
                    <p>Livraison standard : gratuite</p>
                    <p class="label"><b>GARANTIE :</b></p>
                    <p>Produit garanti 3 ans.</p>

                </div>
                <!-- Box prix -->
                <div class="details-price">
                    <button type="button" role="button" >Ajouter au Panier</button>
                    <p class="label"><b>VOTRE PRIX :</b></p>
                    <p class="your-price"><b><?php  // Affichage du prix selon typologie et coef client
                                                    if(isset($product[0]->pro_ppet) && isset($customer[0]))
                                                    {
                                                        if($customer[0]->cus_type === "Particulier")
                                                        {
                                                            echo number_format((($product[0]->pro_ppet + ($product[0]->pro_ppet * $customer[0]->cus_coef/100)) * 1.20), 2, ",", " ") . '€'; 
                                                        }
                                                        else if($customer[0]->cus_type === "Professionnel")
                                                        {
                                                            echo number_format(($product[0]->pro_ppet + ($product[0]->pro_ppet * $customer[0]->cus_coef/100)), 2, ",", " ") . ' € HT'; 
                                                        }
                                                    }
                                                ?></b></p>
                    <p class="label"><b>PRIX CATALOGUE :</b></p>
                    <p><?php if(isset($product[0]->pro_spet)){echo $product[0]->pro_spet; }?></p>
                </div>
            </div>
        </div>
        <!-- Box descriptif produit -->
        <div class="product-desc">
            <h4>
                Descriptif du produit :
            </h4>
            <p>
                <?php if(isset($product[0]->pro_desc)){echo $product[0]->pro_desc;} ?>
            </p>
            <p>
                En catalogue depuis le <?php if(isset($product[0]->pro_add_date)){echo date_format(new DateTime($product[0]->pro_add_date), 'd.m.Y');} ?>
            </p>
        </div>
    </article>
</section>

<!-- Bannière services -->
<section id="banner-services">
<img src="<?php echo base_url('assets/images/BODY/banniere centre 4 pictos.png');?>" alt="Livraison gratuite à partir de 19€" title="Remise jusqu'à 15% sur Gibson et Ibanez">
</section>