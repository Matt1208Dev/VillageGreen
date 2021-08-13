<div class="container-fluid">
    <!-- Header -->
    <div class="row">
            <header>
                <h1 class="mt-3">
                    Liste des commandes
                </h1>
            </header>
        </div>

        <h5 class="m-0">Affichage par période</h5>

        <!-- Filters -->
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-start justify-content-sm-around justify-content-lg-start flex-wrap my-3 px-3 ">
                <a class="col-lg-2 btn btn-success me-2 mt-2" href="<?php echo site_url('Orders/AllOrders');?>">Toutes</a>
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

        <h5>Recherche par un ou plusieurs critères</h5>
        <div class="row mb-3 align-items-center">
            <?php echo form_open('Orders/OrderList', 'method="POST" class="row align-items-center"');?>
                <!-- Order ID field -->
                <div class="col-sm-12 col-lg-2 pe-lg-2">
                    <input class="form-control" type="text" name="ord_id" id="ord_id" placeholder="N° commande">
                </div>
                <!-- Customer ID field -->
                <div class="col-sm-12 col-lg-2 pe-lg-2">
                    <input class="form-control" type="text" name="cus_id" id="cus_id" placeholder="N° client">
                </div>
                <!-- Customer Lastname field -->
                <div class="col-sm-12 col-lg-2 pe-lg-2">
                    <input class="form-control" type="text" name="cus_lastname" id="cus_lastname" placeholder="Nom client">
                </div>
                <!-- Customer Firstname field -->
                <div class="col-sm-12 col-lg-2 pe-lg-2">
                    <input class="form-control" type="text" name="cus_firstname" id="cus_firstname" placeholder="Prénom client">
                </div>
                <!-- Submit button -->
                <div class="col-sm-12 col-lg-2 ps-lg-1 py-1">
                    <button class="btn text-white form-control blue-link py-1 lh-lg" type="submit" id="submit" value="submit">Rechercher</button>
                </div>
            </form>     
        </div>
    </div>

</div> 