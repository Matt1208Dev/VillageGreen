<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function checkLogin($username)
    {
        $query = $this->db->query("SELECT `com_id`, `com_firstname`, `com_username`, `com_pass`, `com_type`
                                    FROM `commercials`
                                    WHERE `com_username` = '$username'");
        $result = $query->result();

        return $result;
    }
}