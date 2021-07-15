<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProduitsModel extends CI_Model
{
    function listGuitar()
    {
        $requete = $this->db->query("SELECT * FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        WHERE cat_name like \"guitare%\";");
        $aProduits = $requete->result();  

        return $aProduits; 
    }

    function productDetails($id)
    {
        $requete = $this->db->query("SELECT * FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        WHERE pro_id = $id;");
        $aProduits = $requete->result();  

        return $aProduits; 
    }
}