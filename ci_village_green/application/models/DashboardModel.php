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
        $query = $this->db->query("SELECT `ode_pro_id` AS `id_produit`, `pro_ref` AS `reference_produit`, `pro_label` AS `libelle_produit`, SUM(`ode_qty`) AS `quantite`, `sup_id` `id_fournisseur`, `sup_name` AS `fournisseur`
                                    FROM `order_details`
                                    JOIN `orders`
                                        ON `ode_ord_id` = `ord_id`
                                    JOIN `products`
                                        ON `ode_pro_id` = `pro_id`
                                    JOIN `suppliers`
                                        ON `pro_sup_id` = `sup_id`
                                    WHERE `ord_date` LIKE \"2021%\"
                                    GROUP BY `libelle_produit`
                                    ORDER BY `quantite` DESC;");
        $result = $query->result();

        return $result;
    }
}