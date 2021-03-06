
<section id="myAccount" class="container-fluid">
    <!-- Fil d'Ariane -->
    <nav>
        <p class="fw-light ps-5">
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Accueil</a> >
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Customers/myAccount'); ?>">Mon compte</a> > 
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Customers/myOrders'); ?>">Mes commandes</a> > 
            <a class="text-dark text-decoration-none" href="<?php echo site_url('Customers/orderDetails/' . $order[0]->ord_id); ?>">Détails commande</a>
        </p>
    </nav>
    <!-- Header -->
    <div class="row mt-md-3">
        <header>
            <h3>
                MES COMMANDES
            </h3>
            <h5 class="mt-md-1 ps-md-2 ms-4 mb-md-4">
            Détails de la commande n°<?php echo $order[0]->ord_id;?>
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
            <div class="row">
                <!-- Date et nombre d'articles de la commande -->
                <div class="col-12">
                    <p class="ps-2 d-inline-block">Date de commande : <?php if(isset($order[0]->ord_date)){echo date_format(new datetime($order[0]->ord_date), 'd/m/Y');}?></p>
                    <p class="ps-2 d-inline-block">(<?php if(isset($order) && count($order) > 1 ){echo count($order) . ' articles';} else {echo count($order) . ' article';}?>)</p>
                </div>
            </div>
            
            <div class="row m-0 bg-light justify-content-around mb-3">
                <div class="col-md-5 bg-light py-2 p-0">
                    <h6 class="fw-bold fst-italic border-bottom border-3 border-dark ps-3 py-2">Adresse de facturation</h6>
                    <p class="ps-3 mb-1"><?php if(isset($order[0]->cus_firstname) && isset($order[0]->cus_lastname)){echo $order[0]->cus_firstname . ' ' . $order[0]->cus_lastname;}?></p>
                    <p class="ps-3 mb-1"><?php if(isset($order[0]->cus_bil_address)){echo $order[0]->cus_bil_address;}?></p>
                    <p class="ps-3 mb-1"><?php if(isset($order[0]->cus_bil_postalcode) && isset($order[0]->cus_bil_city)){echo $order[0]->cus_bil_postalcode . ' ' . $order[0]->cus_bil_city;}?></p>
                </div>
                <div class="col-md-5 bg-light py-2 p-0">
                    <h6 class="fw-bold fst-italic border-bottom border-3 border-dark ps-3 py-2">Adresse de Livraison</h6>
                    <p class="ps-3 mb-1"><?php if(isset($order[0]->cus_firstname) && isset($order[0]->cus_lastname)){echo $order[0]->cus_firstname . ' ' . $order[0]->cus_lastname;}?></p>
                    <p class="ps-3 mb-1"><?php if(isset($order[0]->ord_del_address)){echo $order[0]->ord_del_address;}?></p>
                    <p class="ps-3 mb-1"><?php if(isset($order[0]->ord_del_postalcode) && isset($order[0]->ord_del_city)){echo $order[0]->ord_del_postalcode . ' ' . $order[0]->ord_del_city;}?></p>
                </div>
            </div>

            <div class="row">
                <!-- Tableau Détails commande-->
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr class="table-secondary border-2 border-top-0 border-start-0 border-end-0 border-dark">
                                    <th></th>
                                    <th><i>Produit</i></th>
                                    <th class="d-none d-md-table-cell border-0 "><i>Statut ligne</i></th>
                                    <th><i>Prix</i></th>
                                    <th><i>Quantité</i></th>
                                    <th><i>Prix total</i></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $iTotalHT = 0;
                                    $iTotalTTC = 0;
                                    $totalItemsHT = 0;
                                    $totalItemsTTC = 0;

                                    // Boucle d'affichage de chaque ligne de la commande
                                    foreach ($order as $row) 
                                    {

                                        // Total ligne HT ou TTC selon typologie client
                                        if (isset($row->ode_ost_id) && $row->ode_ost_id !== '8') 
                                        {
                                            if (isset($row->pro_ppet) && isset($row->cus_type)) 
                                            {
                                                $iTotalHT = $row->ode_qty * ($row->pro_ppet + ($row->pro_ppet *  $row->cus_coef / 100));
                                                $iTotalTTC = $iTotalHT + ($iTotalHT * 0.2);
                                            }
                                            $totalItemsHT = $totalItemsHT + $iTotalHT;
                                            $totalItemsTTC = $totalItemsTTC + $iTotalTTC;
                                        } 
                                        else 
                                        {
                                            $iTotalHT = 0;
                                            $iTotalTTC = 0;
                                        }

                                    ?>
                                        <!-- ligne produit -->
                                        <tr class="table-light">
                                            <!-- Visuel produit -->
                                            <td class="col-xl-2">
                                                <a href="<?php if (isset($row->pro_id)) {
                                                                echo site_url('Products/productDetails/' . $row->pro_id);
                                                            } ?>">
                                                    <div class="col-12">
                                                        <img class="img-mini" src=" <?php    if(isset($row->pro_id) && (isset($row->pro_photo))) 
                                                                                            {
                                                                                                echo base_url('assets/images/products/' . $row->pro_id . '.' . $row->pro_photo);
                                                                                            } 
                                                                                    ?>" alt="photo du produit   <?php   if(isset($row->pro_label)) 
                                                                                                                        {
                                                                                                                            echo $row->pro_label;
                                                                                                                        } 
                                                                                                                ?>" title="<?php    if(isset($row->pro_label)) 
                                                                                                                                    {
                                                                                                                                        echo $row->pro_label;
                                                                                                                                    } ?>">
                                                    </div>
                                                </a>
                                            </td>

                                            <!-- Libellé produit -->
                                            <td class="align-middle">
                                                <p class="mb-0"><?php echo $row->pro_label; ?></p>
                                                <!-- Statut ligne affichage mobile -->
                                                <?php   if (isset($row->ode_ost_id) && $row->ode_ost_id !== '8') 
                                                        { 
                                                ?> 
                                                            <p class="d-block d-md-none text-success mb-0"><?php echo $row->ost_label;?></p>
                                                <?php 
                                                        }
                                                        else
                                                        { 
                                                ?>
                                                            <p class="d-block d-md-none text-danger mb-0"><?php echo $row->ost_label;?></p>
                                                <?php 
                                                        } 
                                                ?>

                                            </td>

                                            <!-- Statut ligne -->
                                            <td class="align-middle d-none d-md-table-cell">
                                                <?php   if (isset($row->ode_ost_id) && $row->ode_ost_id !== '8') 
                                                        { 
                                                ?>      
                                                            <p class=" col-12 text-success mb-0"><?php echo $row->ost_label;?></p>
                                                <?php 
                                                        }
                                                        else
                                                        { 
                                                ?>
                                                            <p class="d-none d-md-block text-danger mb-0"><?php echo $row->ost_label;?></p>
                                                <?php 
                                                        } 
                                                ?>
                                            </td>

                                            <!-- Affichage du prix de vente selon typologie et coef client -->
                                            <td class="align-middle text-nowrap">
                                                <?php   if (isset($row->pro_ppet) && isset($row->cus_type)) 
                                                        {
                                                            if ($row->cus_type === "Particulier") 
                                                            {
                                                                echo number_format($row->pro_ppet + ($row->pro_ppet *  $row->cus_coef / 100) + (($row->pro_ppet + ($row->pro_ppet *  $row->cus_coef / 100)) * 0.2), 2, ',', ' ');
                                                            } 
                                                            else if ($row->cus_type === "Professionnel") 
                                                            {
                                                                echo number_format($row->pro_ppet + ($row->pro_ppet *  $row->cus_coef / 100), 2, ",", " ");
                                                            }
                                                        }
                                                ?>
                                            </td>
                                            <!-- Quantité -->
                                            <td class="col align-middle">                                                                          
                                                <?php echo $row->ode_qty; ?>

                                            </td>
                                            </form>
                                            <!-- Prix total ligne -->
                                            <td class="align-middle text-nowrap">   <?php   if(isset($row->cus_type) && $row->cus_type === 'Particulier')
                                                                                            {
                                                                                                echo number_format($iTotalTTC, 2, ',', ' ');
                                                                                            }
                                                                                            else if(isset($row->cus_type) && $row->cus_type === 'Professionnel')
                                                                                            {
                                                                                                echo number_format($iTotalHT, 2, ',', ' ');
                                                                                            }
                                                                                    ?>  
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row m-0 justify-content-end">
                <!-- Début Tableau Récapitulatif-->
                <div class="col-12 col-md-6 col-xl-4 p-0">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr class="table-secondary border-2 border-top-0 border-start-0 border-end-0 border-dark">
                                    <th colspan="2"><i>Récapitulatif</i></th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- Total articles -->
                                <tr class="table-light">
                                    <td class="col-6 text-end">Articles :</td>
                                    <td class="col"><?php   if(isset($row->cus_type) && $row->cus_type === 'Particulier')
                                                            {
                                                                echo number_format($totalItemsTTC, 2, ',', ' ');
                                                            }
                                                            else if(isset($row->cus_type) && $row->cus_type === 'Professionnel')
                                                            {
                                                                echo number_format($totalItemsHT, 2, ',', ' ');
                                                            } 
                                                    ?> €
                                </td>
                                </tr>
                                <!-- Frais de livraison -->
                                <tr class="table-light">
                                    <td class="col-6 text-end">Livraison :</td>
                                    <td class="col"><?php   if((isset($row->cus_type) && $row->cus_type === 'Particulier') && (isset($row->ode_ost_id) &&  $row->ode_ost_id !=='8'))
                                                            {
                                                                if ($totalItemsTTC > 19) 
                                                                {
                                                                    $delivery = 0;
                                                                    echo number_format($delivery, 2, ',', ' ') . " €";
                                                                } 
                                                                else 
                                                                {
                                                                    $delivery = 5.90;
                                                                    echo number_format($delivery, 2, ',', ' ') . " €";
                                                                } 
                                                            }
                                                            else if((isset($row->cus_type) && $row->cus_type === 'Professionnel') && (isset($row->ode_ost_id) &&  $row->ode_ost_id !=='8'))
                                                            {
                                                                if ($totalItemsHT > 19) 
                                                                {
                                                                    $delivery = 0;
                                                                    echo number_format($delivery, 2, ',', ' ') . " €";
                                                                } 
                                                                else 
                                                                {
                                                                    $delivery = 5.90;
                                                                    echo number_format($delivery, 2, ',', ' ') . " €";
                                                                } 
                                                            }
                                                            else
                                                            {
                                                                $delivery = 0;
                                                                echo number_format($delivery, 2, ',', ' ') . " €";
                                                            }
                                                    ?>
                                    </td>
                                </tr>
                                <!-- TVA -->
                                <tr class="table-light">
                                    <td class="col-6 text-end">TVA estimée :</td>
                                    <td class="col"><?php echo number_format(($totalItemsHT + $delivery * 0.8) * 0.2, 2, ',', ' '); ?> €
                                    </td>
                                </tr>

                                <!-- Total global TTC pour les professionnels -->
                                <?php   if (isset($row->cus_type) && $row->cus_type == 'Professionnel') 
                                        {
                                ?>
                                        <tr class="table-light">
                                            <td class="col-6 text-end">Total TTC :</td>
                                            <td class="col"><?php echo number_format($totalItemsTTC + $delivery, 2, ',', ' '); ?> €</td>
                                        </tr>
                                <?php
                                        }
                                ?>

                                <!-- Total global HT ou TTC selon profil client -->
                                <tr class="table-light">
                                    <td class="col-6 text-end">Total <?php  if (isset($row->cus_type) && $row->cus_type == 'Particulier') 
                                                                            {
                                                                                echo 'TTC';
                                                                            } 
                                                                            else 
                                                                            {
                                                                                echo 'HT';
                                                                            } 
                                                                    ?> :
                                    </td>
                                    <td class="col fw-bold text-danger"><?php   if (isset($row->cus_type) && $row->cus_type == 'Particulier') 
                                                                                {
                                                                                    echo number_format($totalItemsTTC + $delivery, 2, ',', ' ');
                                                                                }
                                                                                else if (isset($row->cus_type) && $row->cus_type == 'Professionnel') 
                                                                                {
                                                                                    echo number_format($totalItemsHT + $delivery * 0.8, 2, ',', ' ');
                                                                                }
                                                                        ?> €
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <img class="img-fluid mt-5 px-0" src="<?php echo base_url('assets/images/BODY/ESPACE_CLIENT/bas_de_page_pictos.png');?>" alt="Logos de nos partenaires Yamaha, Roland, Sennheiser et Behringer" title="Nos partenaires et services">
            </div>
        </div>
    </div>
</section>
<?php var_dump($order);?>