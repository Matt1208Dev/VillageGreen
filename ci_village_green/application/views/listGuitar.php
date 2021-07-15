
<section>
    <header>
        <h3>Toutes les guitares</h3>
    </header>

    <article id="products-list">
        
        <?php foreach($liste as $row)
        { ?>
        
        
            <div class="product-box">
                <div class="product-box-img">
                    <img src="<?php echo base_url('assets/images/products/' . $row->pro_id . '.' . $row->pro_photo) ;?>" alt="photo du produit <?php echo $row->pro_label;?>" title="<?php echo $row->pro_label;?>">
                </div>
                <div class="product-box-desc">
                    <p class="product-label">
                        <?php echo $row->pro_label . ' ' . $row->pro_ref ;?>
                    </p>
                    <p>
                        <?php echo $row->cat_name;?>
                    </p>
                    <p>
                        Prix HT :<br>
                        <span class="product-box-price"><b><?php echo $row->pro_spet . '€';?> </b>
                        <a type="button" href="<?php echo site_url("Produits/productDetails/$row->pro_id");?>">Détails</a>
                        </span>
                    </p>
                </div>
            </div>
        
            <?php } ?>
    </article>

</section>