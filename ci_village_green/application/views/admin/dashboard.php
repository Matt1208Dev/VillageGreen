<div class="container-fluid">
    <div class="row justify-content-evenly">
        <!-- Titre -->
        <header>
            <h1 class="py-3 m-0">
                Tableau de bord
            </h1>
        </header>

        <Section>
            <h4>
                CA global généré pour l'ensemble des fournisseurs
            </h4>

            <div class="col">
                <table class="col-6 table table-hover border border-2 text-white">
                    <thead>
                        <tr>
                            <th>
                                CA global HT (€) <?php echo date('Y');?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo number_format($caGlobalAllSuppliers[0]->totalCA, 2, ',', ' ');?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </Section>

        <Section>
            <h4>
                CA global généré par fournisseur
            </h4>

            <div class="col">
                <table class="col-6 table table-hover border border-2 text-white">
                    <thead>
                        <tr>
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
                                <tr>
                                    <td>
                                        <?php echo $row->idFournisseur;?>
                                    </td>
                                    <td>
                                    <?php echo $row->Fournisseur;?>
                                    </td>
                                    <td>
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

        <Section>
            <h4>
                Produits vendus dans l'année
            </h4>

            <div class="col">
                <table class="col-6 table table-hover border border-2 text-white">
                    <thead>
                        <tr>
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
                                <tr>
                                    <td>
                                        <?php echo $row->id_produit;?>
                                    </td>
                                    <td>
                                        <?php echo $row->reference_produit;?>
                                    </td>
                                    <td>
                                        <?php echo $row->libelle_produit;?>
                                    </td>
                                    <td>
                                        <?php echo $row->quantite;?>
                                    </td>
                                    <td>
                                        <?php echo $row->id_fournisseur;?>
                                    </td>
                                    <td>
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
</div>

<?php var_dump($caGlobalBySuppliers);?>