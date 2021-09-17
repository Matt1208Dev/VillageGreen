<section id="basket">
    <div>
        <p class="fw-light ps-5"><a class="text-dark text-decoration-none" href="<?php echo site_url('Products/home'); ?>">Home</a> > Votre panier</p>
    </div>
    <header>
        <h3 class="fw-light ps-5 mb-0">Votre panier</h3>
    </header>

    <?php
    // Si le panier existe
    if ($this->session->basket != null) {
    ?>
        <div class="row">
            <!-- Début Tableau Mon Panier-->
            <div id="basket" class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary" style="border-bottom: 1px solid black;">
                                <th></th>
                                <th><i>Produit</i></th>
                                <th class="d-none d-md-table-cell border-0"><i>Disponibilité</i></th>
                                <th><i>Prix</i></th>
                                <th><i>Quantité</i></th>
                                <th><i>Prix total</i></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $iTotalHT = 0;
                            $iTotalTTC = 0;
                            $totalItemsHT = 0;
                            $totalItemsTTC = 0;

                            // Boucle d'affichage de chaque ligne du panier
                            foreach ($this->session->basket as $row) {


                                // $iTotalHT = round($row['pro_spet'] * $row['pro_qty'], 2);
                                if (isset($row['pro_ppet']) && isset($row['cus_type'])) 
                                {
                                    $iTotalHT = round($row['pro_qty'] * ($row['pro_ppet'] + ($row['pro_ppet'] *  $row['cus_coef'] / 100)));
                                    $iTotalTTC = round($iTotalHT + ($iTotalHT * 0.2));
                                }
                                $totalItemsHT = $totalItemsHT + $iTotalHT;
                                $totalItemsTTC = $totalItemsTTC + $iTotalTTC;
                            ?>
                                <!-- ligne produit -->
                                <tr class="table-light">
                                    <!-- Visuel produit -->
                                    <td class="col-xl-2">
                                        <a href="<?php if (isset($row['pro_id'])) {
                                                        echo site_url('Products/productDetails/' . $row['pro_id']);
                                                    } ?>">
                                            <div class="col-12">
                                                <img class="img-mini" src="<?php if (isset($row['pro_id']) && (isset($row['pro_photo']))) {
                                                                                echo base_url('assets/images/products/' . $row['pro_id'] . '.' . $row['pro_photo']);
                                                                            } ?>" alt="photo du produit <?php if (isset($row['pro_label'])) {
                                                                                                            echo $row['pro_label'];
                                                                                                        } ?>" title="<?php if (isset($row['pro_label'])) {
                                                                                                                                                                                                                                                                                echo $row['pro_label'];
                                                                                                                                                                                                                                                                            } ?>">
                                            </div>
                                        </a>
                                    </td>

                                    <!-- Libellé produit -->
                                    <td class="align-middle">
                                        <p class="mb-0"><?php echo $row['pro_label']; ?></p>
                                        <?php if (isset($row['pro_phy_stk']) && $row['pro_phy_stk'] > 0) { ?> <p class="d-block d-md-none text-success mb-0">Disponible</p> <?php } else { ?><p class="d-block d-md-none text-warning mb-0">Indisponible. Délai de réapprovisionnement variable.</p><?php } ?>

                                    </td>

                                    <!-- Disponibilité -->
                                    <td class="align-middle d-none d-md-table-cell">
                                        <?php if (isset($row['pro_phy_stk']) && $row['pro_phy_stk'] > 0) { ?> <p class=" col-12 text-success mb-0">Disponible</p> <?php } else { ?><p class="col-md-8 text-warning mb-0 mx-auto">Indisponible. Délai de réapprovisionnement 2 à 3 semaines.</p><?php } ?>
                                    </td>

                                    <!-- Affichage du prix de vente selon typologie et coef client -->
                                    <td class="align-middle">
                                        <?php if (isset($row['pro_ppet']) && isset($row['cus_type'])) {
                                            if ($row['cus_type'] === "Particulier") {
                                                echo number_format(round($row['pro_ppet'] + ($row['pro_ppet'] *  $row['cus_coef'] / 100)) + (($row['pro_ppet'] + ($row['pro_ppet'] *  $row['cus_coef'] / 100)) * 0.2), 2, ',', ' ');
                                            } else if ($row['cus_type'] === "Professionnel") {
                                                echo number_format(round($row['pro_ppet'] + ($row['pro_ppet'] *  $row['cus_coef'] / 100)), 2, ",", " ");
                                            }
                                        }
                                        ?>
                                    </td>
                                    <!-- Quantité -->
                                    <td class="col col-xl-2 align-middle">
                                        <div class="form-group d-flex flex-row flex-nowrap align-items-center justify-content-between">

                                            <?php // Ouverture formulaire pour modification quantité pour chaque ligne produit
                                            echo form_open('Basket/modifyQuantity'); ?>

                                            <!-- J'intègre des champs cachés qui transmettront les infos nécessaires à la restauration des lignes panier après traitement -->
                                            <input type="hidden" name="pro_id" id="pro_id" value="<?= $row['pro_id'] ?>">
                                            <input type="hidden" name="pro_ppet" id="pro_ppet" value="<?= $row['pro_ppet'] ?>">
                                            <input type="hidden" name="pro_spet" id="pro_spet" value="<?= $row['pro_spet'] ?>">
                                            <input type="hidden" name="pro_label" id="pro_label" value="<?= $row['pro_label'] ?>">
                                            <input type="hidden" name="pro_phy_stk" id="pro_phy_stk" value="<?= $row['pro_phy_stk'] ?>">
                                            <input type="hidden" name="pro_photo" id="pro_photo" value="<?= $row['pro_photo'] ?>">
                                            <input type="hidden" name="cus_type" id="cus_type" value="<?= $row['cus_type'] ?>">
                                            <input type="hidden" name="cus_coef" id="cus_coef" value="<?= $row['cus_coef'] ?>">

                                            <!-- Champ modification de la quantité -->
                                            <input class="form-control d-inline" type="number" name="pro_qty" id="pro_qty" value="<?php echo $row['pro_qty']; ?>" min="1">

                                            <!-- bouton Recalculer  -->
                                            <button class="btn" type="submit" title="Recalculer"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="table-warning bi bi-arrow-clockwise d-flex d-inline-block" viewBox="-2 -2 20 20">
                                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                                </svg></button>
                                        </div>
                                    </td>
                                    </form>
                                    <!-- Prix total ligne -->
                                    <td class="align-middle">   <?php   if(isset($row['cus_type']) && $row['cus_type'] === 'Particulier')
                                                                        {
                                                                            echo number_format($iTotalTTC, 2, ',', ' ');
                                                                        }
                                                                        else if(isset($row['cus_type']) && $row['cus_type'] === 'Professionnel')
                                                                        {
                                                                            echo number_format($iTotalHT, 2, ',', ' ');
                                                                        }
                                                                ?> 
                                    </td>

                                    <!-- Suppression de la ligne produit -->
                                    <td class="align-middle">
                                        <?php echo form_open('Basket/removeProduct'); ?>

                                        <!-- champ caché pro_id qui transmettra l'information nécessaire à la suppression -->
                                        <input type="hidden" name="pro_id" id="pro_id" value="<?= $row['pro_id'] ?>">

                                        <!-- Bouton suppression -->
                                        <button class="btn" type="submit" title="Supprimer le produit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                        </form>
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
        <!-- Fin Tableau Mon Panier -->

        <div class="row m-0 justify-content-evenly">

            <!-- Message satisfait ou remboursé, affichage sur écran > 768px -->
            <div id="basket-text-box" class="col-12 col-lg-8 d-none d-md-flex flex flex-column justify-content-center fw-light px-5 py-2 mx-0 mx-md-3 mb-3">
                <p class="basket-text">Satisfait ou remboursé !</p>
                <p class="basket-text mb-0">Retournez-nous votre commande dans les 30 jours si elle ne vous donne pas entière satisfaction.</p>
            </div>

            <!-- Début Tableau Récapitulatif-->
            <div class="col-6 col-md-12 col-md-4 col-lg-3 p-0">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary" style="border-bottom: 1px solid black;">
                                <th colspan="2"><i>Récapitulatif</i></th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Total articles -->
                            <tr class="table-light">
                                <td class="col-6 text-end">Articles :</td>
                                <td class="col"><?php   if(isset($row['cus_type']) && $row['cus_type'] === 'Particulier')
                                                        {
                                                            echo number_format($totalItemsTTC, 2, ',', ' ');
                                                        }
                                                        else if(isset($row['cus_type']) && $row['cus_type'] === 'Professionnel')
                                                        {
                                                            echo number_format($totalItemsHT, 2, ',', ' ');
                                                        } 
                                                ?> €
                                </td>
                            </tr>
                            <!-- Frais de livraison -->
                            <tr class="table-light">
                                <td class="col-6 text-end">Livraison :</td>
                                <td class="col"><?php if(isset($row['cus_type']) && $row['cus_type'] === 'Particulier')
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
                                                        else if(isset($row['cus_type']) && $row['cus_type'] === 'Professionnel')
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
                                                ?>
                                </td>
                            </tr>
                            <!-- TVA -->
                            <tr class="table-light">
                                <td class="col-6 text-end">TVA estimée :</td>
                                <td class="col"><?php echo number_format(($totalItemsHT + $delivery * 0.8) * 0.2, 2, ',', ' '); ?> €</td>
                            </tr>

                            <!-- Total global TTC pour les professionnels -->
                            <?php if (isset($row['cus_type']) && $row['cus_type'] == 'Professionnel') 
                            {
                            ?>
                                <tr class="table-light">
                                    <td class="col-6 text-end">Total TTC :</td>
                                    <td class="col"><?php echo number_format($totalItemsTTC + $delivery, 2, ',', ' '); ?> €</td>
                                </tr>
                            <?php
                            }
                            ?>

                            <!-- Total global HT ou TTC selon profil -->
                            <tr class="table-light">
                                <td class="col-6 text-end">Total <?php  if (isset($row['cus_type']) && $row['cus_type'] == 'Particulier') 
                                                                        {
                                                                            echo 'TTC';
                                                                        } else {
                                                                            echo 'HT';
                                                                        } 
                                                                ?> :
                                </td>
                                <td class="col fw-bold text-danger"><?php   if (isset($row['cus_type']) && $row['cus_type'] == 'Particulier') 
                                                                            {
                                                                                echo number_format($totalItemsTTC + $delivery, 2, ',', ' ');
                                                                            }
                                                                            else if (isset($row['cus_type']) && $row['cus_type'] == 'Professionnel') 
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
        <!-- Fin Tableau Récapitulatif-->

        <div>
            <div class="d-flex flex-column-reverse flex-md-row flex-wrap justify-content-end">
                <a class="btn btn-lg btn-outline btn-outline-danger col-12 col-md-4 col-lg-3 mb-3 ms-md-2 me-md-1" href="<?= site_url("Basket/emptyBasket"); ?>">Vider le panier</a>
                <a class="btn btn-lg btn-warning col-12 col-md-4 col-lg-3 mb-3 ms-md-1 me-md-2" href="<?= site_url("Basket/confirmInformations"); ?>">Passer la commande</a>
            </div>
        </div>

        <!-- Message satisfait ou remboursé, affichage sur écran <= 768px -->
        <div id="basket-text-box2" class="col-12 col-md-7 col-lg-8 d-flex flex-column justify-content-center d-md-none fw-light py-2 px-4 mx-0 mx-md-3">
            <p class="basket-text">Satisfait ou remboursé !</p>
            <p class="basket-text">Retournez-nous votre commande dans les 30 jours si elle ne vous donne pas entière satisfaction.</p>
        </div>

    <?php
    }
    // Si le panier n'existe pas encore 
    else {

    ?>
        <div class="row m-0">
            <!-- Image panier vide -->
            <div id="bag" class="col-12 col-md-9 d-flex flex-column mb-4 me-0 p-0 mt-md-0">
                <div id="bag-img" class="d-flex flex-column align-items-center mb-4">
                    <p class="text-center bag-text fw-light mb-4">Votre panier est vide !</p>
                    <img class="img-fluid col-9 col-md-6 mb-3 mb-md-0 rounded-3" src="<?php echo base_url('assets/images/BODY/shopping-cart.jpeg'); ?>" alt="Sac vide" title="Votre panier est vide !">
                </div>
                <!-- Texte sous image  -->
                <p class="text-center bag-text">Parcourez nos catégories. Vous trouverez votre à coup sûr votre futur instrument.</p>
            </div>

            <!-- Bannière rappel livraison gratuite -->
            <div id="banner-delivery" class="col-12 col-md-3 d-flex flex-column align-items-center justify-content-center mb-4 px-0">
                <img class="img-fluid px-0 d-none d-sm-inline" src="<?php echo base_url('assets/images/BODY/banniere_droite_prix.png'); ?>" alt="image livraison gratuite à partir de 19€ d'achats" title="Livraison gratuite à partir de 19€ d'achats">
                <img class="img-fluid mx-auto pt-3 col-6 d-flex d-sm-none p-0" src="<?php echo base_url('assets/images/BODY/banniere_droite_prix_sm.png'); ?>" alt="image livraison gratuite à partir de 19€ d'achats" title="Livraison gratuite à partir de 19€ d'achats">
            </div>
        </div>
    <?php
    } ?>
