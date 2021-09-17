
<div class="container-fluid">

    <!-- header -->
    <div class="row">
        <header>
            <h1 class="my-3">
                Gestion des produits
            </h1>
        </header>
    </div>
    <div class="row">
        <header>
            <h6 class="my-3">
                Rechercher un produit :
            </h6>
        </header>
    </div>

    <!-- Search section -->
    <section class="row align-items-center justify-content-center">
        <?php echo form_open('Admin/productList','class="row align-items-center mb-3 px-0"');?>

            <!-- Category selector -->
            <div class="col-sm-12 col-lg-3 py-1">
                <select class="form-select" name="category-selector" id="category-selector">
                    <option value="">Catégories</option>
                    <?php   foreach($categories AS $row)
                            {
                    ?>
                    
                    <option value="<?php if(isset($row->cat_id)){echo $row->cat_id;};?>"><?php if(isset($row->cat_name)){echo $row->cat_name;};?></option>

                    <?php
                            }
                    ?>
                </select>
            </div>

            <!-- Subcategory selector -->
            <div class="col-sm-12 col-lg-3 py-1">
                <select class="form-select" name="subcategory-selector" id="subcategory-selector">
                    <option value="">Sous-catégories</option>
                    <?php   foreach($subCategories AS $row)
                            {
                    ?>
                    
                    <option value="<?php if(isset($row->cat_id)){echo $row->cat_id;};?>"><?php if(isset($row->cat_name)){echo $row->cat_name;};?></option>

                    <?php
                            }
                    ?>
                </select>
            </div>

            <!-- Keyword field -->
            <div class="col-sm-12 col-lg-4 pe-lg-2 py-1">
                <input class="form-control" type="text" name="keyword-search" id="keyword-search" placeholder="Référence produit">
            </div>

            <!-- Submit button -->
            <div class="col-sm-12 col-lg-2 ps-lg-1 py-1">
                <button class="btn text-white form-control blue-link py-1 lh-lg" type="submit" id="submit" value="submit">Rechercher</button>
            </div>
        </form>
    </section>
    <!-- END Search section -->

    <!-- Create section -->
    <section class="row align-items-center">
        <div class="row">
            <header>
                <h6 class="mb-3">
                    Création produit :
                </h6>
            </header>
        </div>

        <!-- Submit button -->
        <div class="col-sm-12 col-lg-3 py-1">
            <a class="btn text-white form-control blue-link py-1 px-0 lh-lg" href="<?php echo site_url('Admin/AddProduct');?>">Créer un nouveau produit</a>
        </div>
    </section>
    <!-- END Create section -->
</div>