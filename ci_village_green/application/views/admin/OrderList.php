
<div class="container-fluid">
    
    <!-- Number of results -->
    <div class="row">
        <div class="col">
            <p class="ms-3">Nombre de lignes : <?php if(isset($list)){echo $this->db->affected_rows();} ?></p>
        </div>
    </div>

    <!-- Order List -->
    <div class="row justify-content-center px-3">
        <div class="table-responsive-md border border-4 border-bottom-1 px-0 mb-3 rounded overflow-hidden-md">
            <table id="table-orders" class="col-sm-10 table table-hover align-middle text-center overflow-hidden my-0">
                <thead>
                    <tr class="col-sm-10 bg-grey">
                    <th scope="col">Commande</th>
                    <th scope="col">Date d'ordre</th>
                    <th scope="col">N° client</th>
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
                    <tr class="border-0 border-bottom border-3 bg-light">
                    <th scope="row"><?php echo $row->ord_id; ?></th>
                    <td><?php echo strftime("%d/%m/%Y", strtotime($row->ord_date)); ?></td>
                    <td><?php echo $row->cus_id; ?></td>
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
    </div>

    <!-- END Order List -->

</div>