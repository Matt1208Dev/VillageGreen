
<div class="container-fluid">

<!-- Header -->
<div class="row">
    <header>
        <h3 class="mt-3">
            Liste des commandes > Détails commande N° : <?php if(isset($order[0]->ord_id)){echo $order[0]->ord_id;};?>
        </h3>
    </header>
</div>

<!-- Infos client -->
<div class="row">
    <div class="col">
        <div class="row mt-3">
           <h4>Infos client</h4>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-6">
                <h5>Informations de facturation</h5>
                <p><?php echo $order[0]->cus_lastname . ' ' . $order[0]->cus_firstname;?></p>
                <p><?php echo $order[0]->cus_bil_address;?></p>
                <p><?php echo $order[0]->cus_bil_postalcode;?></p>
                <p><?php echo $order[0]->cus_bil_city;?></p>
            </div>
            
            <div class="col-sm-12 col-md-6">
                <h5>Informations de livraison</h5>
                <p><?php echo $order[0]->cus_lastname . ' ' . $order[0]->cus_firstname;?></p>
                <p><?php echo $order[0]->cus_del_address;?></p>
                <p><?php echo $order[0]->cus_del_postalcode;?></p>
                <p><?php echo $order[0]->cus_del_city;?></p>
            </div>

            <div class="row mt-3">
                <div class="col-sm-6">
                    <h5>Coordonnées</h5>
                    <p>Mobile : <?php echo $order[0]->cus_phone;?></p>
                    <p>Mail : <?php echo $order[0]->cus_mail;?></p>
                </div>
                <div class="col-sm-3">
                    <h5>Mode de règlement</h5>
                    <p><?php echo $order[0]->ord_pay_method;?></p>
                </div>
                <div class="col-sm-3">
                    <h5>Statut commande</h5>
                    <p><?php echo $order[0]->ost_label;?></p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Fin Infos client -->

<div class="row">
    <header>
        <h3>
            Détails de la commande
        </h3>
    </header>
</div>

<div class="row">
    <div class="col table-responsive-sm">
        <table class="table table-hover table-light align-middle text-center">
            <thead">
                <tr>
                <th scope="col">Ref Produit</th>
                <th scope="col">Designation</th>
                <th scope="col">Spécifications</th>
                <th scope="col">Catégorie</th>  
                <th scope="col">Quantité commandée</th>
                <th scope="col">Prix HT</th>
                <th scope="col">Total ligne</th>
                
                </tr>
            </thead>
            <tbody>
            

            </tbody>
        </table>
    </div>
        
</div>

</div>
<?php //var_dump($order);?>
</div>