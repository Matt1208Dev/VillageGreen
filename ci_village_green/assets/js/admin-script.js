
$(document).ready(function()
{
    // ProductList View / AJAX Category-selector

    $("#category-selector").change(function()
    {
        var parent = $("#category-selector option:selected").val();

        $.get({
            url: 'http://localhost/ci_village_green/application/models/GetSubcategories.php',
            type: 'GET',
            data: 'cat_parent_id=' + parent,
            dataType: "json",
            success: function(data) 
            {			
                var selectSub = '<option value="">Choisir</option>';
                
                $.each(data, function(key, val) { // On utilise les données de la requête pour générer nos choix du select
                    selectSub += "<option value=\"" + val.cat_id + "\">" + val.cat_name +"</option>";
                });
                                                
                $("#subcategory-selector").html(selectSub); // Affichage des choix dans le select #select2
            },
        
            error : function(resultat, statut, erreur){

            },
    
            complete : function(resultat, statut){
    
            }
        })
    });

    // ProductList View / AJAX Display Results
    $("#subcategory-selector").change(function()
    {
        var category = $("#subcategory-selector option:selected").val();

        $.get({
            url: 'http://localhost/ci_village_green/application/models/AdminProductSearch.php',
            type: 'GET',
            data: 'pro_cat_id=' + category,
            dataType: "json",
            success: function(data) 
            {			
                var content = '';
                
                $.each(data, function(key, val) { // On utilise les données de la requête pour générer la carte produit
                    content += `<div class="row">
                    <div class="col-lg-12 d-flex flex-column justify-content-center-center">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">MODELE</h6>
                        <p class="mb-2">` + val.pro_label + `</p>
                    </div>
                </div>
                <div id="product-card-sec-row" class="row">
                    <div class="col-sm-3 border-top border-bottom border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">ID PRODUIT</h6>
                        <p class="mb-2">` + val.pro_id + `</p>
                    </div>
                    <div class="col-sm-4 border-top border-bottom border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">REFERENCE</h6>
                        <p class="mb-2">` + val.pro_ref + `</p>
                    </div>
                    <div class="col-sm-5 border-top border-bottom border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">CATEGORIE</h6>
                        <p class="mb-2">` + val.cat_name + `</p>
                    </div>
                </div>
                <div class="row bg-light">
                    <div class="col-sm-6 d-flex justify-content-center">
                        <img class="img-fluid my-2 rounded" style="height: 200px;" src="<?php if(isset($product->pro_id) && (isset($product->pro_photo))){echo base_url('assets/images/products/' . $product->pro_id . '.' . $product->pro_photo) ;} ?>" alt="photo du produit <?php if(isset($product->pro_label)){echo $product->pro_label;}?>" title="<?php if(isset($product->pro_label)){echo $product->pro_label;}?>">
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">DESCRIPTION</h6>
                        <p class="mb-2">` + val.pro_desc + `</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 border-top border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">PRIX D'ACHAT HT</h6>
                        <p class="mb-2">` + val.pro_ppet + `</p>
                    </div>
                    <div class="col-sm-6 border-top border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">PRIX DE VENTE HT</h6>   
                        <p class="mb-2">` + val.pro_spet + `</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 border-top border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">STOCK</h6>
                        <p class="mb-2">` + val.pro_phy_stk + `</p>                
                    </div>
                    <div class="col-sm-6 border-top border-4 pb-2">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">VERROUILLAGE</h6>
                        <p class="mb-2 <?php if(isset($product->pro_lock) && $product->pro_lock === "1"){echo "bg-danger";}else{echo "bg-success";} ?> badge rounded-pill text-white d-inline"><?php if(isset($product->pro_lock) && $product->pro_lock === "1"){echo "OUI";}else{echo "NON";} ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 border-top border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">EN CATALOGUE DEPUIS</h6>
                        <p class="mb-2"><?php if(isset($product->pro_add_date)){echo date_format(new DateTime($product->pro_add_date), 'd/m/Y');} ?></p>
                    </div>
                    <div class="col-sm-6 border-top border-4">
                        <h6 class="mb-0 mt-2 fw-bold product-card-title">FOURNISSEUR</h6>
                        <p class="mb-2"><?php if(isset($product->sup_name)){echo $product->sup_name;} ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 border-top border-4 text-center px-0 py-auto">
                        <a class="btn block nav-link text-white blue-link" href="">Modifier</a>
                    </div>
                </div>`;
                });
                                                
                // $("#product-card").html(content); // Affichage de la carte produit dans #product-card
            },
        
            error : function(resultat, statut, erreur){

            },
    
            complete : function(resultat, statut){
    
            }
        })
    });

    // Mise en valeur de l'item navbar en navigation
    $(".navbar-nav a").on("click", function() {
        $(".navbar-nav a").removeClass("active");
        $(this).addClass("active")
      })
});