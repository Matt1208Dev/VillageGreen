<?php 
    $totalRow = 0 ;
    $total = 0;
?>

<div class="container-fluid">

<!-- Header -->
<div class="row">
    <header>
        <h3 class="mt-3">
            Liste des commandes > Détails commande N° : <?php if(isset($order[0]->ord_id)){echo $order[0]->ord_id;};?>
        </h3>
    </header>
</div>

<!-- Customer Infos -->
<div class="row">
    <div class="col">

        <!-- Billing Information -->
        <div class="row mt-3">
            <div class="col-sm-4 mt-sm-3">
                <div class="col-sm-12 card mt-2 bg-transparent border-white h-100">
                    <div class="card-header border-white">
                        <h5 class="card-title">Informations de facturation</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $order[0]->cus_lastname . ' ' . $order[0]->cus_firstname;?></p>
                        <p class="card-text"><?php echo $order[0]->cus_bil_address;?></p>
                        <p class="card-text"><?php echo $order[0]->cus_bil_postalcode;?></p>
                        <p class="card-text"><?php echo $order[0]->cus_bil_city;?></p>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-sm-4 mt-sm-3">
                <div class="col-sm-12 card mt-2 bg-transparent border-white h-100">
                    <div class="card-header border-white">
                        <h5>Coordonnées</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Mobile : <?php echo $order[0]->cus_phone;?></p>
                        <p class="card-text">Mail : <?php echo $order[0]->cus_mail;?></p>
                    </div>
                </div>
            </div>
            
            <!-- Delivery Information -->
            <div class="col-sm-4 mt-sm-3">
                <div class="col-sm-12 card mt-2 bg-transparent border-white h-100">
                    <div class="card-header border-white">
                        <h5>Informations de livraison</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $order[0]->cus_lastname . ' ' . $order[0]->cus_firstname;?></p>
                        <p class="card-text"><?php echo $order[0]->cus_del_address;?></p>
                        <p class="card-text"><?php echo $order[0]->cus_del_postalcode;?></p>
                        <p class="card-text"><?php echo $order[0]->cus_del_city;?></p>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="col-sm-4 mt-sm-3">
                <div class="col-sm-12 card mt-2 bg-transparent border-white">
                    <div class="card-header border-white">
                        <h5>Mode de règlement</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $order[0]->ord_pay_method;?></p>
                    </div>
                </div>
            </div>

            <!-- Order status -->
            <div class="col-sm-4 mt-sm-3">
                <div class="col-sm-12 card mt-2 bg-transparent border-white">
                    <div class="card-header border-white">
                        <h5>Statut commande</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $order[0]->ost_label;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Customer Infos -->

<!-- Order details -->
<div class="row mt-3">
    <header>
        <h4 class="fw-bold">
            Détails de la commande
        </h4>
    </header>
</div>

<!-- Order details table -->
<div class="row">
    <div class="col-sm-12 table-responsive-sm mt-3">
        <table class="table table-hover table-borderless table-light align-middle text-center rounded overflow-hidden">
            <thead">
                <tr class="border-bottom border-dark">
                <th scope="col">Visuel Produit</th>
                <th scope="col">Ref Produit</th>
                <th scope="col">Designation</th>  
                <th scope="col">Quantité commandée</th>
                <th scope="col">Prix HT</th>
                <th scope="col">Remise (%)</th>
                <th scope="col">Total ligne</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($order AS $product)
                { ?>
                
                <!-- Product details-->
                <tr class="border-bottom">
                
                    <td>
                        <a href="<?php if(isset($product->pro_id)){ echo site_url("Produits/productDetails/" . $product->pro_id);};?>">
                        <img src="<?php if(isset($product->pro_id) && (isset($product->pro_photo))){echo base_url('assets/images/products/' . $product->pro_id . '.' . $product->pro_photo) ;} ?>" alt="photo du produit <?php if(isset($product->pro_label)){echo $product->pro_label;}?>" title="<?php if(isset($product->pro_label)){echo $product->pro_label;}?>" class="img-fluid img-thumbnail" style="max-height: 100px;">
                        </a>
                    </td>
                    <th scope="col"><?php if(isset($product->pro_ref)){ echo $product->pro_ref;}?></th>
                    <th scope="col"><?php if(isset($product->pro_label)){ echo $product->pro_label;}?></th>
                    <th scope="col"><?php if(isset($product->ode_qty)){ echo $product->ode_qty;}?></th>
                    <th scope="col"><?php if(isset($product->ode_tot_exc_tax)){ echo $product->ode_tot_exc_tax;}?></th>
                    <th scope="col"><?php if(isset($product->ord_discount)){ echo $product->ord_discount;}?></th>
                    <th scope="col"><?php if(isset($product->ode_qty) && isset($product->ode_tot_exc_tax)){ $totalRow = number_format((($product->ode_qty)*(($product->ode_tot_exc_tax - ($product->ode_tot_exc_tax*$product->ord_discount/100)))), 2, ".", " ");
                                                                                                            $total = $total + $totalRow; echo $totalRow;
                                                                                                            }?></th>
                </tr>

                <?php
                }
                ?>
                <!-- Total & taxes -->
                <tr>
                    <td colspan="5" class="pt-0"></td>                  
                    <td class="pt-0">Total HT : </td>
                    <td class="pt-0"><?php if(isset($total)){echo 'EUR ' . number_format($total, 2, ".", " ");}?></td>
                </tr>
                <tr>
                    <td colspan="5" class="pt-0"></td>
                    <td class="pt-0">TVA : </td>                  
                    <td class="pt-0"><?php if(isset($total)){echo 'EUR ' . number_format($total*$product->ode_tax_rate/100, 2, ".", " ");}?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="">
                <td colspan="5" class="pt-0"></td>
                    <span class="rounded-bottom"><td class="fw-bold pt-0">Total : </td>
                    <td class="fw-bold text-danger pt-0 fs-5 "><?php if(isset($total)){echo 'EUR ' . number_format(($total+($total*$product->ode_tax_rate/100)), 2, ".", " ");}?></td></span>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- END Order details -->

<a class="btn blue-link text-white mb-3 border border-white border-3" href="<?php echo site_url('Orders/OrderList');?>" role="button">Retour à la liste</a>
</div>
