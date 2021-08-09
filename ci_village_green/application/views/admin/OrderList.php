
<div class="container-fluid">

    <!-- Header -->
    <div class="row">
        <header>
            <h1 class="mt-3">
                Liste des commandes
            </h1>
        </header>
    </div>

    <p class="m-0">Affichage par période</p>

    <!-- Filters -->
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-start justify-content-sm-around justify-content-lg-start flex-wrap my-3 px-3 ">
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderList');?>">Toutes</a>
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByMonthInterval/12');?>">12 derniers mois</a>
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByMonthInterval/6');?>">6 derniers mois</a>
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByMonthInterval/3');?>">3 derniers mois</a>
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByDayInterval/1');?>">30 derniers jours</a>
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByDayInterval/7');?>">7 derniers jours</a>
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/OrderByDayInterval/1');?>">Aujourd'hui</a>
            <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/RunningOrder');?>">En cours</a>
        </div>
    </div>
    <hr>

    <p>Recherche par un ou plusieurs critères</p>
    <div class="row mb-3 align-items-center">
        <?php echo form_open('Orders/OrderList', 'method="POST" class="row align-items-center"');?>
            <!-- Order ID field -->
            <div class="col-sm-12 col-lg-2 pe-lg-2">
                <input class="form-control" type="text" name="ord_id" id="ord_id" placeholder="N° commande">
            </div>
            <div class="col-sm-12 col-lg-2 pe-lg-2">
                <input class="form-control" type="text" name="cus_id" id="cus_id" placeholder="N° client">
            </div>
            <div class="col-sm-12 col-lg-2 pe-lg-2">
                <input class="form-control" type="text" name="cus_lastname" id="cus_lastname" placeholder="Nom client">
            </div>
            <div class="col-sm-12 col-lg-2 pe-lg-2">
                <input class="form-control" type="text" name="cus_firstname" id="cus_firstname" placeholder="Prénom client">
            </div>

            <!-- Submit button -->
            <div class="col-sm-12 col-lg-2 ps-lg-1 py-1">
                <button class="btn text-white form-control blue-link py-1 lh-lg" type="submit" id="submit" value="submit">Rechercher</button>
            </div>
        </form>     
    </div>

    <!-- Order List -->
    <section class="row justify-content-center px-3">
        <div class="table-responsive-md border border-4 px-0 mb-3 rounded overflow-hidden-md">
            <table id="table-orders" class="col-sm-10 table table-hover align-middle text-center overflow-hidden my-0">
                <thead>
                    <tr class="col-sm-10 bg-grey">
                    <th scope="col">Commande</th>
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
                    <tr class="border-0 border-top border-4 bg-light">
                    <th scope="row"><?php echo $row->ord_id; ?></th>
                    <td><?php echo strftime("%d/%m/%Y", strtotime($row->ord_date)); ?></td>
                    <td><?php echo $row->cus_lastname . ' ' . $row->cus_firstname; ?></td>                  
                    <td><?php echo $row->ord_discount; ?></td>
                    <td><?php echo $row->ord_pay_method; ?></td>
                    <td><?php if($row->ord_bil_date === NULL){echo '';}else{echo strftime("%d/%m/%Y", strtotime($row->ord_bil_date));}?></td>
                    <td class="<?php if($row->ost_label !== "Facturée"){echo "text-warning";}else{echo "text-success";}?>"><?php echo $row->ost_label; ?></td>
                    <td><a class="nav-link" href="<?php echo site_url('Orders/OrderDetails/' . $row->ord_id);?>">Détails</a></td>
                    
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
        <?php var_dump($_POST);?>
    </div>
</div>