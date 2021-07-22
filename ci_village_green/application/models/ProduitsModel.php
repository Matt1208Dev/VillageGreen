<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProduitsModel extends CI_Model
{
    // function list()
    // {
    //     $requete = $this->db->query("SELECT * FROM `products` 
    //                                     JOIN `categories`
    //                                     ON `pro_cat_id` = `cat_id`
    //                                     WHERE cat_name like \"guitare%\";");
    //     $aProduits = $requete->result();  

    //     return $aProduits; 
    // }

    function list($catId)
    {
        $requete = $this->db->query("SELECT * FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        WHERE cat_id = $catId ;");
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