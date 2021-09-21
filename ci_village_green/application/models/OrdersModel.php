<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersModel extends CI_Model
{
    public function AllOrders()
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function RunningOrder()
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE ost_label != 'Facturée' and ost_label != 'Annulée'
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderById($id)
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE `ord_id` = $id ;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderByCustomerId($id)
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE `cus_id` = $id
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderByFullname($lastName, $firstName)
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE cus_lastname = \"$lastName\" AND cus_firstname = \"$firstName\"
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderByCustomerName($name)
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE cus_lastname = \"$name\"
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderByCustomerFirstname($name)
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE cus_firstname = \"$name\"
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderByParameters($data)
    {
        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    $data");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderByMonthInterval($nb)
    {
        $today =  date('Y-m-d');
        $interval = strftime('%Y-%m-%d', strtotime('-'. $nb. ' month'));

        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE ord_date BETWEEN '$interval' AND '$today'
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders;
    }

    public function OrderByDayInterval($nb)
    {
        $today =  date('Y-m-d');
        $interval = strftime('%Y-%m-%d', strtotime('-'. $nb. ' day'));

        $query = $this->db->query("SELECT ord_id, ord_date,cus_id, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE ord_date BETWEEN '$interval' AND '$today'
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders;
    }

    public function OrderDetails($id)
    {
        $query = $this->db->query("SELECT `pro_id`, `pro_photo`, `pro_ref`, `pro_label`, `pro_desc`, `pro_ppet`, `pro_spet`, `ode_qty`, `ode_tot_exc_tax`, `ord_discount`, `ode_tax_rate`, `ord_id`, `ode_ost_id`, `cus_id`, `cus_lastname`, `cus_firstname`, `cus_bil_address`, `cus_bil_postalcode`, `cus_bil_city`, `cus_phone`, `cus_mail`, `cus_del_address`, `cus_del_postalcode`, `cus_del_city`, `cus_type`, `cus_coef`, `ord_pay_method`, `ost_id`, `ost_label`
                                    FROM `orders`
                                    JOIN `order_details`
                                    ON `ode_ord_id` = `ord_id`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ode_ost_id` = `ost_id`
                                    JOIN `products`
                                    ON `ode_pro_id` = `pro_id`  
                                    WHERE ord_id = $id");
                                    
        $order = $query->result();  

        return $order;
    }

    public function CustomerOrderDetails($id)
    {
        $query = $this->db->query("SELECT `pro_id`, `pro_photo`, `pro_ref`, `pro_label`, `pro_desc`, `pro_ppet`, `pro_spet`, `ode_qty`, `ode_tot_exc_tax`, `ord_discount`, `ode_tax_rate`, `ord_id`, `ord_date`, `ode_ost_id`, `cus_id`, `cus_lastname`, `cus_firstname`, `cus_bil_address`, `cus_bil_postalcode`, `cus_bil_city`, `cus_phone`, `cus_mail`, `cus_del_address`, `cus_del_postalcode`, `cus_del_city`, `cus_type`, `cus_coef`, `ord_pay_method`, `ost_id`, `ost_label`
                                    FROM `orders`
                                    JOIN `order_details`
                                    ON `ode_ord_id` = `ord_id`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ode_ost_id` = `ost_id`
                                    JOIN `products`
                                    ON `ode_pro_id` = `pro_id`  
                                    WHERE ord_id = $id");
                                    
        $order = $query->result();  

        return $order;
    }

    // Création d'une commande dans la table Orders
    public function CreateOrderLine($data)
    {
        $this->db->insert('orders', $data);

        return true;
    }

    // Création d'une ligne de commande dans la table Order_details
    public function CreateOrderDetailsLine($data)
    {
        $this->db->insert('order_details', $data);

        return true;
    }

    // Récupération de l'ID de la dernière commande passée par le client
    public function getLastOrderByCustomerId($cus_id)
    {
        $query = $this->db->query("SELECT ord_id
                                    FROM `orders`
                                    WHERE `ord_cus_id` = $cus_id
                                    ORDER BY `ord_id` DESC
                                    LIMIT 1;");
        $ord_id = $query->result();  

        return $ord_id;
    }

    // Requête de récupération des commandes d'un client par son ID
    public function getOrdersIdByCustomerId($id)
    {
        $query = $this->db->query("SELECT `ord_id`
                                    FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    WHERE `ord_cus_id` = $id");

        $order = $query->result();
        
        return $order;
    }

    public function getOrdersByCustomerId($id)
    {
        $query = $this->db->query("SELECT `ord_id`, `ord_date`
                                    FROM `orders`
                                    WHERE `ord_cus_id` = $id");

        $order = $query->result();
        
        return $order;
    }

    public function getOrderLinesByOrderId($id)
    {
        $query = $this->db->query("SELECT `pro_id`, `pro_photo`, `pro_ref`, `pro_label`, `pro_desc`, `ode_id`, `ode_qty`, `ode_tot_exc_tax`, `ode_ost_id`, `ord_discount`, `ode_tax_rate`, `ord_id`, `ord_date`, `ord_del_time`, `ost_id`, `ost_label`
                                    FROM `order_details`
                                    JOIN `orders`
                                    ON `ode_ord_id` = `ord_id`
                                    JOIN `order_status`
                                    ON `ode_ost_id` = `ost_id`
                                    JOIN `products`
                                    ON `ode_pro_id` = `pro_id`  
                                    WHERE `ord_id` = $id");

        $order = $query->result();
        
        return $order;
    }

    public function cancelOrderLine($id)
    {
        $this->db->set('ord_ost_id', 8);
        $this->db->where('ord_id', $id);
        $this->db->update('orders');
    }

    public function cancelOrderDetailsLine($id)
    {
        $this->db->set('ode_ost_id', 8);
        $this->db->where('ode_id', $id);
        $this->db->update('order_details');
    }
}