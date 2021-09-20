<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model
{
    public function caGlobalAllSuppliers()
    {
        $query = $this->db->query("SELECT SUM(`ode_tot_exc_tax`) AS totalCA 
                                    FROM `order_details`
                                    WHERE `ode_ost_id` != 8;");
        $result = $query->result();

        return $result;
    }

    public function caGlobalBySuppliers()
    {
        $query = $this->db->query("SELECT  `sup_id` AS `idFournisseur`, `sup_name` AS `Fournisseur`, SUM(`ode_tot_exc_tax`) AS `TotalCaHt`
                                    FROM `order_details` 
                                    JOIN `products` 
                                        ON `ode_pro_id` = `pro_id` 
                                    JOIN `suppliers` 
                                        ON `pro_sup_id` = `sup_id`
                                    WHERE `ode_ost_id` != 8 
                                    GROUP BY `idFournisseur` 
                                    ORDER BY `TotalCaHt` DESC;");
        $result = $query->result();

        return $result;
    }

    public function productsSoldInTheYear()
    {
        $currentYear = date('Y', now());
        $query = $this->db->query("SELECT `ode_pro_id` AS `id_produit`, `pro_ref` AS `reference_produit`, `pro_label` AS `libelle_produit`, SUM(`ode_qty`) AS `quantite`, `sup_id` `id_fournisseur`, `sup_name` AS `fournisseur`
                                    FROM `order_details`
                                    JOIN `orders`
                                        ON `ode_ord_id` = `ord_id`
                                    JOIN `products`
                                        ON `ode_pro_id` = `pro_id`
                                    JOIN `suppliers`
                                        ON `pro_sup_id` = `sup_id`
                                    WHERE `ode_ost_id` != 8 AND `ord_date` LIKE \"$currentYear%\"
                                    GROUP BY `libelle_produit`
                                    ORDER BY `quantite` DESC;");
        $result = $query->result();

        return $result;
    }

    public function caByCustomerType()
    {
        $currentYear = date('Y', now());
        $query = $this->db->query("SELECT  `cus_type` AS `type_client`, 
                                    SUM(`ode_tot_exc_tax`) AS `total_ca_ht`
                                    FROM `order_details`
                                    JOIN `orders`
                                        ON `ode_ord_id` = `ord_id`
                                    JOIN `customers` 
                                        ON `ord_cus_id` = `cus_id`  
                                    WHERE `ode_ost_id` != 8 AND `ord_date` LIKE \"$currentYear%\"
                                    GROUP BY `type_client`
                                    ORDER BY `total_ca_ht` DESC;");
        $result = $query->result();

        return $result;
    }

    public function averageDeliveryTime()
    {
        $currentYear = date('Y', now());
        $query = $this->db->query("SELECT ROUND(AVG(DATEDIFF(`ord_bil_date`, `ord_date`))) AS `delai`
                                    FROM `orders`
                                    WHERE `ord_bil_date` NOT LIKE 'null' AND `ord_date` LIKE \"$currentYear%\";");
        $result = $query->result();

        return $result;
    }

    public function lastFiveDeliveries()
    {
        $currentYear = date('Y', now());
        $query = $this->db->query("SELECT `ord_id`, `ord_date`, `ord_bil_date`, ROUND(DATEDIFF(`ord_bil_date`, `ord_date`)) AS `delai`
                                    FROM `orders`
                                    WHERE `ord_bil_date` NOT LIKE 'null' AND `ord_date` LIKE \"$currentYear%\"
                                    ORDER BY `ord_bil_date` DESC
                                    LIMIT 5;");
        $result = $query->result();

        return $result;
    }
}