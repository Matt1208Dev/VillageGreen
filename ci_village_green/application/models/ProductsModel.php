<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductsModel extends CI_Model
{
    function list($catId)
    {
        $requete = $this->db->query("SELECT * FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        WHERE (`cat_id` = $catId AND `pro_lock` = 0) OR (`cat_id` = $catId AND `pro_lock` = 1 AND `pro_phy_stk` > 0);");
        $aProducts = $requete->result();

        return $aProducts;
    }


    function productDetails($id)
    {
        $requete = $this->db->query("SELECT `pro_id`, `pro_ref`, `pro_label`, `pro_cat_id`, `cat_id`, `cat_name`, `pro_photo`, `pro_desc`, `pro_ppet`, `pro_spet`, `pro_phy_stk`, `pro_lock`, `pro_add_date`, `pro_sup_id`, `pro_modif_date` FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        WHERE pro_id = $id;");
        $aProducts = $requete->result();

        return $aProducts;
    }

    function productList($catId)
    {
        $requete = $this->db->query("SELECT `pro_id`, `pro_ref`, `pro_label`, `cat_name`, `pro_photo`, `pro_desc`, `pro_ppet`, `pro_spet`, `pro_phy_stk`, `pro_lock`, `pro_add_date`, `sup_name` FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        JOIN `suppliers`
                                        ON `pro_sup_id` = `sup_id`
                                        WHERE pro_cat_id = $catId OR cat_parent_id = $catId;");
        $list = $requete->result();

        return $list;
    }

    function productByKeyword($keyword)
    {
        $requete = $this->db->query("SELECT `pro_id`, `pro_ref`, `pro_label`, `cat_name`, `pro_photo`, `pro_desc`, `pro_ppet`, `pro_spet`, `pro_phy_stk`, `pro_lock`, `pro_add_date`, `sup_name` FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        JOIN `suppliers`
                                        ON `pro_sup_id` = `sup_id`
                                        WHERE `pro_ref` LIKE \"%$keyword%\" OR `pro_label` LIKE \"%$keyword%\";");
        $list = $requete->result();

        return $list;
    }

    function productById($id)
    {
        $requete = $this->db->query("SELECT `pro_id`, `pro_ref`, `pro_label`, `cat_name`, `pro_photo`, `pro_desc`, `pro_ppet`, `pro_spet`, `pro_phy_stk`, `pro_lock`, `pro_add_date`, `sup_name` FROM `products` 
                                        JOIN `categories`
                                        ON `pro_cat_id` = `cat_id`
                                        JOIN `suppliers`
                                        ON `pro_sup_id` = `sup_id`
                                        WHERE pro_id = $id ;");
        $list = $requete->result();

        return $list;
    }

    function getCategories()
    {
        $requete = $this->db->query("SELECT `cat_id`, `cat_name` FROM `categories`
                                        WHERE cat_parent_id IS NULL;");
        $list = $requete->result();

        return $list;
    }

    function getSubCategories()
    {
        $requete = $this->db->query("SELECT `cat_id`, `cat_name` FROM `categories`
                                        WHERE cat_parent_id IS NOT NULL;");
        $list = $requete->result();

        return $list;
    }

    // Insertion d'un nouveau produit
    public function AddProduct($data)
    {
        $this->db->insert('products', $data);
    }

    // Mise ?? jour d'un produit
    public function UpdateProduct($id, $data)
    {
        $this->db->where('pro_id', $id);
        $this->db->update('products', $data);
    }

    // Suppression d'un produit
    public function DeleteProduct($id)
    {
        $this->db->where('pro_id', $id);
        $this->db->delete('products');
    }

    // Mise ?? jour date de derni??re modification d'un produit
    public function UpdateProductLastModifDate($id)
    {
        $pro_modif_date = date('Y-m-d h:i:s');
        $this->db->where('pro_id', $id);
        $this->db->update('products', array('pro_modif_date' => $pro_modif_date));
    }

    public function getProductStk($pro_id)
    {
        $requete = $this->db->query("SELECT `pro_phy_stk`
                                        FROM `products` 
                                        WHERE pro_id = $pro_id ;");
        $stk = $requete->result();

        return $stk;
    }

    public function updateProductStk($pro_id, $stk)
    {
        $this->db->where('pro_id', $pro_id);
        $this->db->update('products', array('pro_phy_stk' => $stk));
    }
}
