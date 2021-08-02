<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersModel extends CI_Model
{
    public function OrderList()
    {
        $query = $this->db->query("SELECT * FROM `orders`
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
        $query = $this->db->query("SELECT * FROM `orders`
                                    JOIN `customers`
                                    ON `ord_cus_id` = `cus_id`
                                    JOIN `order_status`
                                    ON `ord_ost_id` = `ost_id`
                                    WHERE ost_id != 5
                                    ORDER BY `ord_date` DESC;");
        $orders = $query->result();  

        return $orders; 
    }

    public function OrderByMonthInterval($nb)
    {
        $today =  date('Y-m-d');
        $interval = strftime('%Y-%m-%d', strtotime('-'. $nb. ' month'));

        $query = $this->db->query("SELECT * FROM `orders`
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

        $query = $this->db->query("SELECT * FROM `orders`
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
        $query = $this->db->query("SELECT * FROM `orders`
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