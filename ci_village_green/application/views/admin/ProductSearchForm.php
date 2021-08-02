
<div class="container-fluid">

    <!-- header -->
    <div class="row">
        <header>
            <h1 class="my-3">
                Gestion des produits > Recherche d'un produit
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
    <section class="row align-items-center justify-content-center mb-3">
        <?php echo form_open('Admin/productList','class="row align-items-center mb-3"');?>

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
                </select>
            </div>
                <!-- Keyword field -->
                <div class="col-sm-12 col-lg-5 pe-lg-2 py-1">
                    <input class="form-control" type="text" name="keyword-search" id="keyword-search" placeholder="Rechercher par référence produit">
                </div>
                <!-- Submit button -->
                <div class="col-sm-12 col-lg-1 ps-lg-1 py-1">
                    <button class="btn text-white form-control blue-link py-1 lh-lg" type="submit" id="submit" value="submit">Trouver</button>
                </div>
        </form>
    </section>
    <!-- END Search section -->
</div>