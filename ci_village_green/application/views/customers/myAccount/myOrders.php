<section id="myAccount" class="container-fluid">
    <!-- Header -->
    <div class="row mt-md-3">
        <header>
            <h3>
                MES COMMANDES
            </h3>
            <h5 class="mt-md-1 ps-md-2 ms-4 mb-md-4">
                Historique de mes commandes
            </h5>
        </header>
    </div>

    <!-- Colonne de navigation  -->
    <div class="row">
        <div id="local-nav" class="col-md-3 bg-dark-grey">
            <ul class="nav flex-colum mt-md-3">
                <li class="col-12 nav-item">
                    <a class="nav-link text-white active" href="" aria-current="page">Mes commandes</a>
                </li>
                <li class="col-12 nav-item">
                    <a class="nav-link text-white" href="">Mes derniers articles consultés</a>
                </li>
                <li class="col-12 nav-item">
                    <a class="nav-link text-white" href="<?php echo site_url('Customers/updateInformation');?>">Mes informations personnelles</a>
                </li>
                <li class="col-12 nav-item">
                    <a class="nav-link text-white" href="">Mes communications</a>
                </li>
            </ul>
        </div>

        <div class="col-md-9 p-2">

        <?php   foreach($orders as $order)
                    {
        ?>
                        <div class="col-md-12 bg-white rounded-2 p-2 my-2 d-flex flex-column account-content">
                            
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between mb-2 mb-md-0">
                                <header>
                                    <h5 class="h5 p-2 mb-0">
                                        Commande n°<?php echo $order[0]->ord_id;?> du <?php echo date_format(new DateTime($order[0]->ord_date), 'd/m/Y')?>
                                    </h5>
                                </header>
                                <div class="col-12 col-md-5 d-flex justify-content-md-end pe-2">                                  
                                    <a href="#" class="p-2 mb-0 text-dark">Afficher les détails de commande
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill d-inline ms-2" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <hr class="text-dark mx-2 mt-0">
                                <div class="row py-1">
                                <?php   foreach($order as $line)
                                        {
                                ?>
                                    <div class="col-12 order-line d-flex flex-row flex-wrap flex-md-nowrap">
                                        <div class="col-12 col-md-7 d-flex flex-row mb-2">
                                            <div class="col-5 d-flex justify-content-center align-items-center">
                                                <img class="img-mini" src="<?php if(isset($line->pro_id) && (isset($line->pro_photo))){echo base_url('assets/images/products/' . $line->pro_id . '.' . $line->pro_photo) ;} ?>" alt="photo du produit <?php if(isset($line->pro_label)){echo $line->pro_label;}?>" title="<?php if(isset($line->pro_label)){echo $line->pro_label;}?>">
                                            </div>
                                            <div class="col-7 d-flex flex-column justify-content-center">
                                                <p class="mb-0 fw-bold order-line-label"><?php echo $line->pro_label;?></p>
                                                <p><?php echo $line->pro_ref;?></p>
                                                <p class="text-muted fst-italic"><?php echo $line->ost_label;?></p>
                                            </div>
                                        </div>

                                <?php   if($line->ost_label == 'En cours de traitement')
                                        {
                                ?>
                                        <div class="col-12 col-md-5 d-flex flex-column justify-content-md-center align-items-center pe-2">
                                            <?php echo form_open('Customers/cancelOrderDetailsLine', 'class="text-center"'); ?> 
                                                <p class="col-12 text-center">
                                                    Un doute ? Commandé par erreur? Vous pouvez encore annuler cet achat.
                                                </p>
                                                <input type="hidden" name="ode_id" value="<?php echo $line->ode_id;?>">
                                                <input type="hidden" name="ode_ord_id" value="<?php echo $line->ord_id;?>">
                                                <input type="hidden" name="pro_id" value="<?php echo $line->pro_id;?>">
                                                <input type="hidden" name="ode_qty" value="<?php echo $line->ode_qty;?>">
                                                <button type="submit" class="col-8 btn btn-outline-danger">Annuler cet article</button>
                                            </form>                              
                                        </div>
                                <?php 
                                        }
                                        else if($line->ost_label == 'En préparation')
                                        {
                                ?>
                                        <div class="col-12 col-md-5 d-flex flex-column justify-content-md-center align-items-center pe-2">   
                                            <p class="col-12 text-center text-muted">
                                                Délai de livraison estimé : 5 jours ouvrés
                                            </p>                              
                                        </div>
                                <?php
                                        }
                                        else if($line->ost_label == 'Expédiée')
                                        {
                                ?>
                                        <div class="col-12 col-md-5 d-flex flex-column justify-content-md-center align-items-center pe-2">   
                                            <p class="col-12 text-center text-muted">
                                                Délai de livraison estimé : 2 jours ouvrés
                                            </p>                              
                                        </div>
                                <?php
                                        }
                                        else if($line->ost_label == 'Livrée')
                                        {
                                ?>
                                        <div class="col-12 col-md-5 d-flex flex-column justify-content-md-center align-items-center pe-2">   
                                            <p class="col-12 text-center text-muted">
                                                Livrée
                                            </p>                              
                                        </div>
                                <?php
                                        }
                                ?> 
                                        
                                    </div>
                                
                                <?php
                                        }
                                ?>
                                </div>
                            </div>
                                
                            
                        </div>
        <?php       
                    }
        ?>
        </div>
    </div>
</section>