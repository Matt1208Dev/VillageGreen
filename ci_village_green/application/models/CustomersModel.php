<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomersModel extends CI_Model
{
    public function checkLogin($mail)
    {
        $query = $this->db->query("SELECT `cus_id`, `cus_firstname`, `cus_mail`, `cus_pass`, `cus_type`
                                    FROM `customers`
                                    WHERE `cus_mail` = '$mail'");
        $result = $query->result();

        return $result;
    }

    public function getCustomer($id)
    {
        $query = $this->db->query("SELECT `cus_id`, `cus_lastname`, `cus_firstname`, `cus_sex`, `cus_bil_address`, `cus_bil_postalcode`, `cus_bil_city`, `cus_del_address`, `cus_del_postalcode`, `cus_del_city`, `cus_phone`, `cus_mail`, `cus_pass`, `cus_type` 
                                    FROM `customers`
                                    WHERE `cus_id` = $id");
        $result = $query->result();

        return $result;
    }

    public function getCustomerCoef($id)
    {
        $query = $this->db->query("SELECT `cus_type`, `cus_coef`
                                    FROM `customers`
                                    WHERE `cus_id` = $id");
        $result = $query->result();

        return $result;
    }

    public function checkCustomerCookieLogin($cus_id, $cus_firstname, $cus_mail, $cus_type)
    {
        $query = $this->db->query("SELECT `cus_id`, `cus_firstname`, `cus_mail`, `cus_type` 
                                    FROM `customers`
                                    WHERE `cus_id` = $cus_id AND `cus_firstname` = '$cus_firstname' AND `cus_mail` = '$cus_mail' AND `cus_type` = '$cus_type'");
        $result = $query->result();

        if(isset($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}