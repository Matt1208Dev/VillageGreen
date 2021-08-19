<section>
    <header>
        <h3><?php if (isset($liste[0]->cat_name)) {
                echo $liste[0]->cat_name;
            } ?></h3>
    </header>

    <article id="products-list">

        <?php foreach ($liste as $row) { ?>


            <div class="product-box">
                <div class="product-box-img">
                    <img src="<?php echo base_url('assets/images/products/' . $row->pro_id . '.' . $row->pro_photo); ?>" alt="photo du produit <?php echo $row->pro_label; ?>" title="<?php echo $row->pro_label; ?>">
                </div>
                <div class="product-box-desc">
                    <p class="product-label">
                        <?php echo $row->pro_label . ' ' . $row->pro_ref; ?>
                    </p>
                    <p>
                        <?php echo $row->cat_name; ?>
                    </p>
                    <p>
                        <span class="product-box-price"><b><?php  // Affichage du prix selon typologie et coef client
                                                    if(isset($row->pro_ppet) && isset($customer[0]))
                                                    {
                                                        if($customer[0]->cus_type === "Particulier")
                                                        {
                                                            echo number_format((($row->pro_ppet + ($row->pro_ppet * $customer[0]->cus_coef/100)) * 1.20), 0, ",", " ") . ' €'; 
                                                        }
                                                        else if($customer[0]->cus_type === "Professionnel")
                                                        {
                                                            echo number_format(($row->pro_ppet + ($row->pro_ppet * $customer[0]->cus_coef/100)), 2, ",", " ") . ' € HT'; 
                                                        }
                                                    }
                                                ?></b>
                            <a type="button" href="<?php echo site_url("Products/productDetails/$row->pro_id"); ?>">Détails</a>
                        </span>
                    </p>
                </div>
            </div>

        <?php } ?>
    </article>

</section>