<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
    public function OrderList()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->OrderList();

            $aView["list"] = $query;

            $this->load->view('Admin/header');
            $this->load->view('Admin/OrderList', $aView);
            $this->load->view('Admin/footer');
        }
        else
        {
            $this->load->view('admin/login');
        }
    }

    public function RunningOrder()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->RunningOrder();

            $aView["list"] = $query;

            $this->load->view('Admin/header');
            $this->load->view('Admin/OrderList', $aView);
            $this->load->view('Admin/footer');
        }
        else
        {
            $this->load->view('admin/login');
        }
    }

    public function OrderByMonthInterval($nb)
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->OrderByMonthInterval($nb);

            $aView["list"] = $query;

            $this->load->view('Admin/header');
            $this->load->view('Admin/OrderList', $aView);
            $this->load->view('Admin/footer');
        }
        else
        {
            $this->load->view('admin/login');
        }
    }

    public function OrderByDayInterval($nb)
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->OrderByDayInterval($nb);

            $aView["list"] = $query;

            $this->load->view('Admin/header');
            $this->load->view('Admin/OrderList', $aView);
            $this->load->view('Admin/footer');
        }
        else
        {
            $this->load->view('admin/login');
        } 
    }

    public function orderDetails($id)
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->OrderDetails($id);

            $aView["order"] = $query;

            $this->load->view('Admin/header');
            $this->load->view('Admin/orderDetails', $aView);
            $this->load->view('Admin/footer');
        }
        else
        {
            $this->load->view('admin/login');
        }
    }
}