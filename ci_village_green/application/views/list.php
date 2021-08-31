
<section>
        <div>
            <p class="fw-light ps-5"><a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Home</a> > <?php if (isset($liste[0]->cat_name)) {
                    echo $liste[0]->cat_name;
                } ?></p>
        </div>
        <header>
            <h3 class="fw-light ps-5 mb-0"><?php if (isset($liste[0]->cat_name)) {
                    echo $liste[0]->cat_name;
                } ?></p></h3>
        </header>

        <article id="products-list" class="row m-0 px-0 px-lg-5 mb-4">

        <?php foreach ($liste as $row) { ?>
                
                    <div class="card col-12 col-sm-6 col-md-4 px-0 overflow-hidden">
                        <div class="d-flex justify-content-center py-2 rockin  overflow-hidden">
                            <a href="<?php echo site_url("Products/productDetails/$row->pro_id"); ?>">
                                <img class="card-img-top img-fluid" src="<?php echo base_url('assets/images/products/' . $row->pro_id . '.' . $row->pro_photo); ?>" alt="photo du produit <?php echo $row->pro_label; ?>" title="<?php echo $row->pro_label; ?>">
                            </a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgb(55, 55, 55)" fill-opacity="1" d="M0,96L80,117.3C160,139,320,181,480,176C640,171,800,117,960,117.3C1120,117,1280,171,1360,197.3L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
                        <div class="card-body d-flex flex-column justify-content-between bg-dark-grey text-white">
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
                                                                                    echo "Connectez/inscrivez-vous pour connaitre votre prix";
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
                                <a class="btn btn-primary" type="button" href="<?php echo site_url("Products/productDetails/$row->pro_id"); ?>">Détails</a>
                            </div>
                        </div>
                    </div>

            <?php } ?>
        </article>
</section>