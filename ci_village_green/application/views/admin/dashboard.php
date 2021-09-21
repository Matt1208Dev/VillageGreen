    <div class="row m-0 mb-4">
        <!-- Titre -->
        <header>
            <h1 class="py-3 m-0">
                Tableau de bord
            </h1>
        </header>
    </div>
<div class="container-fluid container-md">
    <!-- Tableau CA Global -->
    <div class="row mb-4">
        <Section class="col-12 col-md-6 d-flex flex-column align-items-center">
            <h4>
                CA global généré pour l'ensemble des fournisseurs
            </h4>

            <div class="col-12 col-sm-8 col-md-6">
                <table class="table table-striped bg-white table-rounded">
                    <thead>
                        <tr class="text-center fst-italic">
                            <th class="text-center">
                                CA global HT (€) <?php echo date('Y');?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-0">
                            <td class="text-center fw-bold border-0">
                                <?php echo number_format($caGlobalAllSuppliers[0]->totalCA, 2, ',', ' ');?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </Section>

        <!-- Tableau CA par type client -->
        <Section class="col-12 col-md-6 d-flex flex-column align-items-center">
            <h4>
            CA HT par type client sur l'année en cours
            </h4>

            <div class="col-12">
                <table class="table table-striped bg-white table-rounded">
                    <thead>
                        <tr class="text-center fst-italic">
                            <th class="col-4 col-md-3">
                                Type Client
                            </th>
                            <th class="col-8 col-md-3">
                                Total CA HT (€) en <?php echo date('Y');?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            foreach($caByCustomerType as $row)
                            {
                        ?>
                                <tr class="border-0">
                                    <td class="border-0">
                                        <?php echo $row->type_client;?>
                                    </td>
                                    <td class="text-center fw-bold border-0">
                                        <?php echo number_format($row->total_ca_ht, 2, ',', ' ');?>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </Section>
    </div>

    <!-- Tableau CA par Fournisseur  -->
    <div class="row mb-4">
        <Section class="col-12 d-flex flex-column align-items-center">
            <h4>
                CA global généré par fournisseur
            </h4>

            <div class="col-12 table-responsive">
                <table class="table table-striped bg-white table-rounded">
                    <thead>
                        <tr class="text-center fst-italic">
                            <th>
                                ID fournisseur
                            </th>
                            <th>
                                Fournisseur
                            </th>
                            <th>
                                CA global HT (€) <?php echo date('Y');?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            foreach($caGlobalBySuppliers as $row)
                            {
                        ?>
                                <tr class="border-0">
                                    <td class="text-center border-0">
                                        <?php echo $row->idFournisseur;?>
                                    </td>
                                    <td class="border-0">
                                        <?php echo $row->Fournisseur;?>
                                    </td>
                                    <td class="text-center fw-bold border-0">
                                        <?php echo number_format($row->TotalCaHt, 2, ',', ' ');?>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </Section>
    </div>

    <!-- Tableau des produits vendus dans l'année -->
    <div class="row mb-4">
        <Section class="col-12 d-flex flex-column align-items-center">
            <h4>
                Produits vendus dans l'année
            </h4>

            <div class="col-12 table-responsive">
                <table class="col-6 table table-striped bg-white table-rounded">
                    <thead>
                        <tr class="text-center fst-italic">
                            <th>
                                ID Produit
                            </th>
                            <th>
                                Référence
                            </th>
                            <th>
                                Libellé
                            </th>
                            <th>
                                Quantité
                            </th>
                            <th>
                                ID Fournisseur
                            </th>
                            <th>
                                Fournisseur
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            foreach($productsSoldInTheYear as $row)
                            {
                        ?>
                                <tr class="border-0">
                                    <td class="text-center border-0">
                                        <?php echo $row->id_produit;?>
                                    </td>
                                    <td class="border-0">
                                        <?php echo $row->reference_produit;?>
                                    </td>
                                    <td class="border-0">
                                        <a class="text-dark text-decoration-none" href="<?php echo site_url('Products/productDetails/' . $row->id_produit);?>" target="_blank">
                                            <?php echo $row->libelle_produit;?>
                                        </a>
                                    </td>
                                    <td class="text-center fw-bold border-0">
                                        <?php echo $row->quantite;?>
                                    </td>
                                    <td class="text-center border-0">
                                        <?php echo $row->id_fournisseur;?>
                                    </td>
                                    <td class="border-0">
                                        <?php echo $row->fournisseur;?>
                                    </td> 
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </Section>
    </div>

    <!-- Tableau objectif et délai de livraison -->
    <div class="row">
        <Section class="col-12 col-md-6 d-flex flex-column align-items-center">
            <h4>
            Délai moyen de livraison
            </h4>

            <div class="col-12 col-sm-8">
                <table class="table table-striped bg-white table-rounded overflow-hidden">
                    <thead>
                        <tr class="text-center fst-italic">
                            <th class="col-4 col-md-3">
                                Objectif
                            </th>
                            <th class="col-4 col-md-3">
                                Délai moyen
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-0">
                            <td class="text-center bg-success text-white border-0">
                                6
                            </td>
                            <td class="text-center fw-bold border-0 <?php if($averageDeliveryTime[0]->delai <= '6'){echo 'text-white bg-success';}else{echo 'text-dark bg-warning';}?>">
                                <?php echo $averageDeliveryTime[0]->delai;?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </Section>

        <!-- Tableau des 5 dernières livraisons -->
        <Section class="col-12 col-md-6 d-flex flex-column align-items-center">
            <h4>
            Délai moyen des 5 dernières livraisons
            </h4>

            <div class="col-12 table-responsive">
                <table class="table table-striped bg-white table-rounded overflow-hidden">
                    <thead>
                        <tr class="text-center fst-italic">
                            <th>
                                Commande
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Livraison
                            </th>
                            <th>
                                Délai moyen
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            foreach($lastFiveDeliveries as $row)
                            {
                        ?>
                                <tr class="border-0">
                                    <td class="text-center border-0">
                                        <?php echo $row->ord_id;?>
                                    </td>
                                    <td class="text-center border-0">
                                        <?php echo date('d/m/Y', strtotime($row->ord_date));?>
                                    </td>
                                    <td class="text-center border-0">
                                        <?php echo date('d/m/Y', strtotime($row->ord_bil_date));?>
                                    </td>
                                    <td class="text-center fw-bold border-0 <?php if($row->delai <= '6'){echo 'text-white bg-success';}else{echo 'text-dark bg-warning';}?>">
                                        <?php echo $row->delai;?>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </Section>
    </div>
</div>