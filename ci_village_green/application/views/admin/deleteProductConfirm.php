<div class="container-fluid justify-content-center">
    <div class="row justify-content-evenly mt-3">
        <header class="col-10 d-flex justify-content-center mx-auto">
            <h2>
                Etes-vous sûr de vouloir supprimer le produit suivant :
            </h2>
        </header>

        <section id="product-card" class="col-lg-8 col-sm-10 border border-4 my-3 mx-auto rounded text-dark">
            <div class="row">
                <header class="px-0">
                        <h3 class="text-center py-2">
                            <?php echo $product[0]->pro_label;?>
                        </h3>
                </header>
            </div>
            <div class="row justify-content-center align-items-center">           
                <div class="col-sm-12 text-center bg-white py-3 px-0">
                    <img class="img-fluid my-2 rounded" style="height: 350px;" src="<?php if(isset($product[0]->pro_id) && (isset($product[0]->pro_photo))){echo base_url('assets/images/products/' . $product[0]->pro_id . '.' . $product[0]->pro_photo);}else{echo base_url('assets/images/products/no-visuel.png');} ?>" alt="photo du produit <?php if(isset($product[0]->pro_label)){echo $product[0]->pro_label;}?>" title="<?php if(isset($product[0]->pro_label)){echo $product[0]->pro_label;}?>">
                </div>
            </div>
            <div class="row">
                <?php echo form_open('Admin/deleteProduct/' . $product[0]->pro_id);?>
                    <div class="col-12 my-2">
                        <p class="mb-0">Avertissement : Cette action est définitive et les informations ne pourront être récupérées. Cela peut également causer des problèmes d'affichage dans les historiques de commandes des clients ayant acheté le produit. Préférez le verrouillage à la suppression du produit.</p>
                        <div class="form-check mb-2">
                            <input type="text" name="pro_id" id="pro_id" value="<?php echo $product[0]->pro_id;?>" hidden>
                            <input class="form-check-input" type="checkbox" value="ok" name="confirm" id="confirm">
                            <label class="form-check-label" for="confirm">Je confirme la suppression de l'article.</label>
                        </div>                        
                        <input class="btn blue-link text-white green-hover" type="submit" id="submit" value="Confirmer" class="btn blue-link text-white">
                        <a class="btn blue-link text-white" href="<?php echo site_url('Admin/updateProduct/'. $product[0]->pro_id);?>">Retour</a>
                    </div>
                </form>
            </div> 
        </section>

    </div>
</div>