<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produits extends CI_Controller
{

    public function accueil()
    {
        $this->load->view('public/templates/header');
        $this->load->view('accueil');
        $this->load->view('public/templates/footer');
    }

    public function list($catId)
    {
        $this->load->model('ProduitsModel');
        $list = $this->ProduitsModel->list($catId);

        $View["liste"] = $list;

        $this->load->view('public/templates/header');
        $this->load->view('list', $View);
        $this->load->view('public/templates/footer');
    }

    public function productDetails($id)
    {
        $this->load->model('ProduitsModel');
        $product = $this->ProduitsModel->productDetails($id);

        $View["product"] = $product;

        $this->load->view('public/templates/header');
        $this->load->view('productDetails', $View);
        $this->load->view('public/templates/footer');
    }
}
