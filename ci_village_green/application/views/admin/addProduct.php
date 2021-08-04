<div class="container-fluid">
    <div class="row justify-content-evenly">
        <!-- Titre catégorie et libellé article -->
        <header>
            <h3 class="py-3 m-0">
                Création produit
            </h3>
        </header>
        <!-- Product card -->
        <section id="product-card" class="col-lg-8 col-sm-10 border border-4 my-3 rounded text-dark">
            <?php echo form_open_multipart('Admin/addProduct/'); ?>

                <!-- Row 1/6 -->
                <div class="row">
                    <div class="col-lg-12 d-flex flex-column justify-content-center-center">
                        <label for="pro_label" class="mb-0 mt-2 fw-bold product-card-title">MODELE</label>
                        <input id="pro_label" name="pro_label" class="form-control mb-2 bg-transparent" value="<?php echo set_value('pro_label') ?>">
                        <?php echo form_error('pro_label'); ?>
                    </div>
                </div>

                <!-- Row 2/6 -->
                <div id="product-card-sec-row" class="row justify-content-center">
                    <div class="col-sm-12 border-top border-bottom border-4 bord-cus">
                        <label for="pro_ref" class="mb-0 mt-2 fw-bold product-card-title">REFERENCE</label>
                        <input id="pro_ref" name="pro_ref" class="form-control mb-2 bg-transparent" value="<?php echo set_value('pro_ref') ?>">
                        <?php echo form_error('pro_ref'); ?>
                    </div>

                    <div class="row p-0">
                        <div class="col-sm-6 mx-auto">
                            <label for="pro_cat_id" class="mb-0 mt-2 fw-bold product-card-title">CATEGORIE</label>
                            <!-- Category selector -->
                            <select class="form-select mb-2 bg-transparent" id="category-selector">
                    <option value="">-- Catégories --</option>
                    <?php   foreach($categories AS $row)
                            {
                    ?>
                    
                    <option value="<?php if(isset($row->cat_id)){echo $row->cat_id;};?>"><?php if(isset($row->cat_name)){echo $row->cat_name;};?></option>

                    <?php
                            }
                    ?>
                </select>
                        </div>
                        <div class="col-sm-6 mx-auto">
                            <label for="pro_cat_id" class="mb-0 mt-2 fw-bold product-card-title">SOUS-CATEGORIE</label>
                            <!-- Subcategory selector -->
                            <select class="form-select mb-2 bg-transparent" name="pro_cat_id" id="subcategory-selector" value="<?php echo set_value('pro_cat_id') ?>">
                            <option value="">-- Sous-catégories --</option>
                                <?php foreach($subCategories as $row)
                                {
                                ?>
                                    <option value="<?php if(isset($row->cat_id)){echo $row->cat_id;}?>" <?php if(set_value('pro_cat_id') === $row->cat_id){echo "selected";}?>><?php if(isset($row->cat_name)){echo $row->cat_name;}?></option>    
                                <?php
                                }
                                ?>
                            </select>
                        <?php echo form_error('pro_cat_id'); ?>
                        </div>
                    </div>
                </div>

                <!-- Row 3/6 -->
                <div class="row bg-light justify-content-center">
                    <div>   
                        <label for="picture" class="mb-0 mt-2 fw-bold product-card-title">VISUEL PRODUIT</label><br>
                        <input class="form-control mb-2 bg-transparent" type="file" name="pro_photo" id="userfile">
                    </div>
                    <?php if(isset($this->session->uploadErrorUser)){echo '<p class="fw-bold text-danger">'. $this->session->uploadErrorUser . '</p>';}?>
                    <div class="col-sm-12">
                        <label for="pro_desc" class="mb-0 mt-2 fw-bold product-card-title">DESCRIPTION</label>
                        <textarea id="pro_desc" name="pro_desc" class="form-control mb-2 bg-transparent" rows="10"><?php echo set_value('pro_desc') ?></textarea>
                        <?php echo form_error('pro_desc'); ?>
                    </div>                    
                </div>

                <!-- Row 4/6 -->
                <div class="row">
                    <div class="col-sm-6 border-top border-4">
                        <label for="pro_ppet" class="mb-0 mt-2 fw-bold product-card-title">PRIX D'ACHAT HT</label>
                        <input id="pro_ppet" name="pro_ppet" class="form-control mb-2 bg-transparent" value="<?php echo set_value('pro_ppet') ?>">
                        <?php echo form_error('pro_ppet'); ?>
                    </div>
                    
                    <div class="col-sm-6 border-top border-4">
                        <label for="pro_spet" class="mb-0 mt-2 fw-bold product-card-title">PRIX DE VENTE HT</label>
                        <input id="pro_spet" name="pro_spet" class="form-control mb-2 bg-transparent" value="<?php echo set_value('pro_spet') ?>">
                        <?php echo form_error('pro_spet'); ?>
                    </div>
                    
                </div>

                <!-- Row 5/6 -->
                <div class="row">
                    <div class="col-sm-6 border-top border-4">
                        <label for="pro_phy_stk" class="mb-0 mt-2 fw-bold product-card-title">STOCK</label>
                        <input id="pro_phy_stk" name="pro_phy_stk" class="form-control mb-2 bg-transparent" value="<?php echo set_value('pro_phy_stk') ?>">               
                        <?php echo form_error('pro_phy_stk'); ?>
                    </div>
                    
                    <div class="col-sm-6 border-top border-4 pb-2">
                    <label for="pro_lock" class="mb-0 mt-2 fw-bold product-card-title">VERROUILLAGE</label>
                        <select class="form-select mb-2 bg-transparent" name="pro_lock" id="pro_lock" value="<?php echo set_value('pro_lock');?>">
                            <option value="0" <?php if(set_value('pro_lock') === "0"){echo "selected";}?>>Non</option>
                            <option value="1" <?php if(set_value('pro_lock') === "1"){echo "selected";}?>>Oui</option>    
                        </select>
                        <?php echo form_error('pro_lock'); ?>
                    </div>
                </div>

                <!-- Row 6/6 -->
                <div class="row">
                        <input id="pro_add_date" name="pro_add_date" class="form-control mb-2 bg-transparent" value="<?php echo set_value('pro_add_date', strftime('%Y-%m-%d')); ?>" hidden>
                    <div class="col-sm-12 border-top border-4">
                        <label for="pro_sup_id" class="mb-0 mt-2 fw-bold product-card-title">FOURNISSEUR</label>
                        <select id="pro_sup_id" name="pro_sup_id" class="form-control mb-2 bg-transparent" value="<?php echo set_value('pro_sup_id') ?>"> 
                            <option value="">-- Sélectionner un fournisseur --</option>
                            <?php foreach ($suppliers as $supplier)
                            {
                            ?>

                            <option value="<?php if(isset($supplier->sup_id)){echo $supplier->sup_id;}?>" <?php if(set_value('pro_sup_id') === $supplier->sup_id){echo "selected";}?>><?php if(isset($supplier->sup_name)){echo $supplier->sup_name;} ?></option>

                            <?php
                            }
                            ?>
                        </select>
                        <?php echo form_error('pro_sup_id'); ?>
                    </div>
                    
                </div>
                <div class="row" id="buttons">
                    <!-- Buttons -->
                    <div class="col-sm-12 border-top border-4 text-center px-0 py-auto">
                        <input type="submit" id="submit" value="Créer" class="col-12 btn block nav-link text-white blue-link green-hover">
                    </div>
                    <div class="col-sm-6 border-top border-end border-4 text-center px-0 py-auto bord-cus">
                        <a href="" class="btn nav-link text-white btn-secondary" role="button">Retour à la page produit</a>
                    </div>
                    <div class="col-sm-6 border-top border-4 text-center px-0 py-auto">
                        <a href="" class="btn nav-link text-white btn-danger" role="button">Supprimer le produit</a>
                    </div>
                </div>

            </form>
        </section>
        <!-- FIN Product card form -->
    </div>
</div>