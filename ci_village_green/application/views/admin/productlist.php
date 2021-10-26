
<div class="container-fluid">
    <hr class="my-sm-1 my-md-4">

    <!-- Number of results -->
    <div class="row">
        <div class="col">
            <p class="ms-3">Nombre de lignes : <?php if(isset($list)){echo $this->db->affected_rows();} ?></p>
        </div>
    </div>

    <div class="row justify-content-evenly">
    <?php   foreach($list AS $product)
            {
    ?>
        <!-- Product card -->
        <section id="product-card" class="col-lg-5 col-sm-10 border border-4 my-3 rounded text-dark">
            <!-- Row 1/6 -->
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center-center">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">MODELE</h6>
                    <p class="mb-2"><?php if(isset($product->pro_label)){echo $product->pro_label;} ?></p>
                </div>
            </div>

            <!-- Row 2/6 -->
            <div id="product-card-sec-row" class="row">
                <div class="col-sm-3 border-top border-bottom border-4">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">ID PRODUIT</h6>
                    <p class="mb-2"><?php if(isset($product->pro_id)){echo $product->pro_id;} ?></p>
                </div>
                <div class="col-sm-4 border-top border-bottom border-4 bord-cus">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">REFERENCE</h6>
                    <p class="mb-2"><?php if(isset($product->pro_ref)){echo $product->pro_ref;} ?></p>
                </div>
                <div class="col-sm-5 border-top border-bottom border-4 bord-cus">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">CATEGORIE</h6>
                    <p class="mb-2"><?php if(isset($product->cat_name)){echo $product->cat_name;} ?></p>
                </div>
            </div>

            <!-- Row 3/6 -->
            <div class="row bg-light">
                <div class="col-sm-6 d-flex justify-content-center">
                    <img class="img-fluid my-2 rounded" style="height: 200px;" src="<?php if(isset($product->pro_id) && (isset($product->pro_photo))){echo base_url('assets/images/products/' . $product->pro_id . '.' . $product->pro_photo);}else{echo base_url('assets/images/products/no-visuel.png');} ?>" alt="photo du produit <?php if(isset($product->pro_label)){echo $product->pro_label;}?>" title="<?php if(isset($product->pro_label)){echo $product->pro_label;}?>">
                </div>
                <div class="col-sm-6">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">DESCRIPTION</h6>
                    <p class="mb-2"><?php if(isset($product->pro_desc)){echo substr($product->pro_desc, 0, 200) . '...';} ?></p>
                </div>
            </div>

            <!-- Row 4/6 -->
            <div class="row">
                <div class="col-sm-6 border-top border-4">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">PRIX D'ACHAT HT</h6>
                    <p class="mb-2"><?php if(isset($product->pro_ppet)){echo $product->pro_ppet;} ?></p>
                </div>
                <div class="col-sm-6 border-top border-4">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">PRIX DE VENTE HT</h6>   
                    <p class="mb-2"><?php if(isset($product->pro_spet)){echo $product->pro_spet;} ?></p>
                </div>
            </div>

            <!-- Row 5/6 -->
            <div class="row">
                <div class="col-sm-6 border-top border-4">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">STOCK</h6>
                    <p class="mb-2"><?php if(isset($product->pro_phy_stk)){echo $product->pro_phy_stk;} ?></p>                
                </div>
                <div class="col-sm-6 border-top border-4 pb-2">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">VERROUILLAGE</h6>
                    <p class="mb-2 <?php if(isset($product->pro_lock) && $product->pro_lock === "1"){echo "bg-danger";}else{echo "bg-success";} ?> badge rounded-pill text-white d-inline"><?php if(isset($product->pro_lock) && $product->pro_lock === "1"){echo "OUI";}else{echo "NON";} ?></p>
                </div>
            </div>

            <!-- Row 6/6 -->
            <div class="row">
                <div class="col-sm-6 border-top border-4">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">EN CATALOGUE DEPUIS</h6>
                    <p class="mb-2"><?php if(isset($product->pro_add_date)){echo date_format(new DateTime($product->pro_add_date), 'd/m/Y');} ?></p>
                </div>
                <div class="col-sm-6 border-top border-4">
                    <h6 class="mb-0 mt-2 fw-bold product-card-title">FOURNISSEUR</h6>
                    <p class="mb-2 text-nowrap"><?php if(isset($product->sup_name)){echo $product->sup_name;} ?></p>
                </div>
            </div>
            <div class="row">
                <!-- Button -->
                <div class="col-sm-12 border-top border-4 text-center px-0 py-auto">
                    <a class="btn block nav-link text-white blue-link" href="<?php echo site_url('Admin/updateProduct/' . $product->pro_id);?>">Modifier</a>
                </div>
            </div>
        </section>
        <!-- FIN Product card -->
    <?php 
            }
    ?>
    </div>
</div>