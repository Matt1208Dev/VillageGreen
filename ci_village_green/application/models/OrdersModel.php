<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersModel extends CI_Model
{
    public function OrderList()
    {
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE ost_label != 'Facturée'
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderById($id)
    {
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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
        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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

        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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

        $query = $this->db->query("SELECT ord_id, ord_date, cus_lastname, cus_firstname, ord_discount, ord_pay_method, ord_bil_date, ost_label FROM `orders`
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
        $query = $this->db->query("SELECT `pro_id`, `pro_photo`, `pro_ref`, `pro_desc`, `ode_qty`, `ode_tot_exc_tax`, `ord_discount`, `ode_tax_rate`, `ord_id`, `cus_lastname`, `cus_firstname`, `cus_bil_address`, `cus_bil_postalcode`, `cus_bil_city`, `cus_phone`, `cus_mail`, `cus_del_address`, `cus_del_postalcode`, `cus_del_city`, `ord_pay_method`, `ost_label`
                                    FROM `orders`
                                    JOIN `order_details`
                                    ON `ode_ord_id` = `ord_id`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    JOIN `products`
                                    ON `ode_pro_id` = `pro_id`  
                                    WHERE ord_id = $id");
                                    
        $order = $query->result();  

        return $order;
    }
}