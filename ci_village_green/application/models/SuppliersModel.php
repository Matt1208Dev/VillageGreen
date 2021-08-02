<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuppliersModel extends CI_Model
{
    public function getSuppliers()
    {
        $query = $this->db->query("SELECT `sup_id`, `sup_type`, `sup_name`, `sup_address`, `sup_postalcode`, `sup_city`, `sup_contact`, `sup_phone`, `sup_mail` 
                                    FROM `suppliers`");
        $suppliers = $query->result();

        return $suppliers;
    }

    public function getSupplierById($id)
    {
        $query = $this->db->query("SELECT `sup_id`, `sup_type`, `sup_name`, `sup_address`, `sup_postalcode`, `sup_city`, `sup_contact`, `sup_phone`, `sup_mail` 
                                    FROM `suppliers`
                                    WHERE `sup_id` = $id");
        $supplier = $query->result();

        return $supplier;
    }
}