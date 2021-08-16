<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomersModel extends CI_Model
{
    public function checkMail($mail)
    {
        $query = $this->db->query("SELECT `cus_id`, `cus_firstname`, `cus_mail`, `cus_pass`
                                    FROM `customers`
                                    WHERE `cus_mail` = $mail");
        $result = $query->result();
        return $result;
    }
}