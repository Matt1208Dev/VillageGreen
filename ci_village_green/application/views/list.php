
<div>
    <div>
        <p class="fw-light ps-5"><a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Home</a> > <?php if (isset($liste[0]->cat_name)) {
                echo $liste[0]->cat_name;
            } ?></p>
    </div>
    <header>
        <h3 class="fw-light ps-5 mb-0"><?php if (isset($liste[0]->cat_name)) {
                echo $liste[0]->cat_name;
            } ?></h3>
    </header>

    <article id="products-list" class="row m-0 px-0 px-lg-5 mb-4">

    <?php foreach ($liste as $row) { ?>
            
                <div class="card col-12 col-sm-6 col-md-4 px-0 overflow-hidden">
                    <div class="d-flex justify-content-center py-2 overflow-hidden <?php if(isset($row->cat_id) && $row->cat_id === '11'){echo 'rockin-left';}else{echo 'rockin-right';}?>">
                        <a href="<?php echo site_url("Products/productDetails/$row->pro_id"); ?>">
                            <img class="card-img-top img-fluid" src="<?php echo base_url('assets/images/products/' . $row->pro_id . '.' . $row->pro_photo); ?>" alt="photo du produit <?php echo $row->pro_label; ?>" title="<?php echo $row->pro_label; ?>">
                        </a>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgb(55, 55, 55)" fill-opacity="1" d="M0,96L80,117.3C160,139,320,181,480,176C640,171,800,117,960,117.3C1120,117,1280,171,1360,197.3L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
                    <div class="product-box-body card-body d-flex flex-column justify-content-between bg-dark-grey text-white">
                    <?php
                        //  Icone 'Ajouter au panier' 
                        if(isset($customer))
                        {
                                echo form_open('Basket/addToBasket'); 
                    ?>

                                <!-- champs invisible fournissant les infos nécessaire au panier -->
                                <input type="hidden" name="pro_qty" id="pro_qty" value="1">
                                <input type="hidden" name="pro_spet" id="pro_spet" value="<?= $row->pro_spet ?>">
                                <input type="hidden" name="pro_ppet" id="pro_ppet" value="<?= $row->pro_ppet ?>">
                                <input type="hidden" name="pro_id" id="pro_id" value="<?= $row->pro_id ?>">
                                <input type="hidden" name="pro_label" id="pro_label" value="<?= $row->pro_label ?>">
                                <input type="hidden" name="pro_phy_stk" id="pro_phy_stk" value="<?= $row->pro_phy_stk ?>">
                                <input type="hidden" name="pro_photo" id="pro_photo" value="<?= $row->pro_photo ?>">
                                <input type="hidden" name="cus_type" id="cus_type" value="<?= $customer[0]->cus_type ?>">
                                <input type="hidden" name="cus_coef" id="cus_coef" value="<?= $customer[0]->cus_coef ?>">

                                <!-- Bouton -->
                                <button id="addToBasketIcon" type="submit" class="btn bg-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#fff" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button>
                        </form>
                    <?php
                        }
                    ?>
                        <div class="d-flex flex-column justify-content-start">
                            <h5 class="card-title"><?php echo $row->pro_label . ' ' . $row->pro_ref; ?></h5>
                            <p class="card-text mb-2"><?php echo $row->cat_name; ?></p>
                        </div>
                        <div class="d-flex flex-column justify-content-start">
                            <p class="card-text mb-2">Prix catalogue : <?php if(isset($row->pro_spet) && isset($customer[0]))
                                                                            {
                                                                                if($customer[0]->cus_type === "Particulier")
                                                                                {
                                                                                    echo number_format(round((($row->pro_spet + ($row->pro_spet * $customer[0]->cus_coef/100)) * 1.20), 1),2, ",", " ") . ' € TTC'; 
                                                                                }
                                                                                else if($customer[0]->cus_type === "Professionnel")
                                                                                {
                                                                                    echo $row->pro_spet . ' € HT'; 
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                echo number_format(round(($row->pro_spet * 1.20), 1),2, ",", " ") . ' € TTC'; 
                                                                            }
                                                                        ?>
                            <p class="card-text">
                                                <span class="product-box-price"><b><?php  // Affichage du prix selon typologie et coef client si celui-ci est loggé
                                                                            if(isset($row->pro_ppet) && isset($customer[0]))
                                                                            {
                                                                                if($customer[0]->cus_type === "Particulier")
                                                                                {
                                                                                    echo number_format(round((($row->pro_ppet + ($row->pro_ppet * $customer[0]->cus_coef/100)) * 1.20), 1),2, ",", " ") . ' € TTC'; 
                                                                                }
                                                                                else if($customer[0]->cus_type === "Professionnel")
                                                                                {
                                                                                    echo number_format(($row->pro_ppet + ($row->pro_ppet * $customer[0]->cus_coef/100)), 2, ",", " ") . ' € HT'; 
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "Connectez/inscrivez-vous pour connaitre votre prix";
                                                                            }
                                                                        ?></b></span>
                        
                    
                            </p>
                            <a class="btn btn-primary" href="<?php echo site_url("Products/productDetails/$row->pro_id"); ?>">Détails</a>
                        </div>
                    </div>
                </div>

        <?php } ?>
    </article>
</div>

<div class="container-fluid">
    <div class="row">
        <img class="img-fluid my-3 px-0" src="<?php echo base_url('assets/images/BODY/ESPACE_CLIENT/bas_de_page_pictos.png');?>" alt="Logos de nos partenaires Yamaha, Roland, Sennheiser et Behringer" title="Nos partenaires et services">
    </div>
</div>