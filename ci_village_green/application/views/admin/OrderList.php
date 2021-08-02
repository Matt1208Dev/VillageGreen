
<div class="container-fluid">

    <!-- Header -->
    <div class="row">
        <header>
            <h1 class="mt-3">
                Liste des commandes
            </h1>
        </header>
    </div>

    <!-- Filters -->
    <div class="row">
        <div class="col my-3">
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderList');?>">Toutes</a>
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByMonthInterval/12');?>">12 derniers mois</a>
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByMonthInterval/6');?>">6 derniers mois</a>
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByMonthInterval/3');?>">3 derniers mois</a>
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByDayInterval/1');?>">30 derniers jours</a>
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByDayInterval/7');?>">7 derniers jours</a>
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByDayInterval/1');?>">Aujourd'hui</a>
            <a class="btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/RunningOrder');?>">En cours</a>
        </div>
    </div>

    <!-- Order List -->
    <section class="row">
        <div class="col table-responsive-sm">
            <table class="table table-hover table-light align-middle text-center rounded overflow-hidden">
                <thead">
                    <tr>
                    <th scope="col">ID commande</th>
                    <th scope="col">Date d'ordre</th>
                    <th scope="col">Nom client</th>  
                    <th scope="col">Remise (%)</th>
                    <th scope="col">Mode de règlement</th>
                    <th scope="col">Date de facturation</th>
                    <th scope="col">Statut</th>
                    <th scope="col"></th>
                    
                    </tr>
                </thead>
                <tbody>

                <?php foreach($list as $row)
                { ?>
                    <tr>
                    <th scope="row"><?php echo $row->ord_id; ?></th>
                    <td><?php echo strftime("%d/%m/%Y", strtotime($row->ord_date)); ?></td>
                    <td><?php echo $row->cus_lastname . ' ' . $row->cus_firstname; ?></td>                  
                    <td><?php echo $row->ord_discount; ?></td>
                    <td><?php echo $row->ord_pay_method; ?></td>
                    <td><?php if($row->ord_bil_date === NULL){echo '';}else{echo strftime("%d/%m/%Y", strtotime($row->ord_bil_date));}?></td>
                    <td class="<?php if($row->ost_label !== "Facturée"){echo "text-warning";}else{echo "text-success";}?>"><?php echo $row->ost_label; ?></td>
                    <td scope="col"><a  class="nav-link" href="<?php echo site_url('Orders/OrderDetails/' . $row->ord_id);?>">Détails</a></td>
                    
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>  
    </section>
    <!-- END Order List -->

    <!-- Number of results -->
    <div class="row">
        <div class="col">
            <p>Nombre de lignes : <?php echo $this->db->affected_rows(); ?></p>
        </div>
    </div>
</div>