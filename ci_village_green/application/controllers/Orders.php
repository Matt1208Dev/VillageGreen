<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
    public function OrderList()
    {
        $this->load->model('OrdersModel');
        $query = $this->OrdersModel->OrderList();

        $aView["list"] = $query;

        $this->load->view('Admin/header');
        $this->load->view('Admin/OrderList', $aView);
        $this->load->view('Admin/footer');
    }

    public function RunningOrder()
    {
        $this->load->model('OrdersModel');
        $query = $this->OrdersModel->RunningOrder();

        $aView["list"] = $query;

        $this->load->view('Admin/header');
        $this->load->view('Admin/OrderList', $aView);
        $this->load->view('Admin/footer');
    }

    public function OrderByMonthInterval($nb)
    {
        $this->load->model('OrdersModel');
        $query = $this->OrdersModel->OrderByMonthInterval($nb);

        $aView["list"] = $query;

        $this->load->view('Admin/header');
        $this->load->view('Admin/OrderList', $aView);
        $this->load->view('Admin/footer'); 
    }

    public function OrderByDayInterval($nb)
    {
        $this->load->model('OrdersModel');
        $query = $this->OrdersModel->OrderByDayInterval($nb);

        $aView["list"] = $query;

        $this->load->view('Admin/header');
        $this->load->view('Admin/OrderList', $aView);
        $this->load->view('Admin/footer'); 
    }

    public function orderDetails($id)
    {
        $this->load->model('OrdersModel');
        $query = $this->OrdersModel->OrderDetails($id);

        $aView["order"] = $query;

        $this->load->view('Admin/header');
        $this->load->view('Admin/orderDetails', $aView);
        $this->load->view('Admin/footer'); 
    }
}