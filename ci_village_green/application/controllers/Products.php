<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function accueil()
    {
        // Chargement de la vue accueil
        $this->load->view('public/templates/header');
        $this->load->view('accueil');
        $this->load->view('public/templates/footer');
    }

    public function list($catId)
    {
        // Requête de chargement de tous les produits d'une catégorie
        $this->load->model('ProductsModel');
        $list = $this->ProductsModel->list($catId);
        $View["liste"] = $list;

        // Requête de chargement de la typologie et coef du client loggé
        $this->load->model('CustomersModel');
        $id = $_SESSION['user_id'];
        $customer = $this->CustomersModel->getCustomerCoef($id);
        $View["customer"] = $customer;

        // Chargement de la vue list
        $this->load->view('public/templates/header');
        $this->load->view('list', $View);
        $this->load->view('public/templates/footer');
    }

    public function productDetails($id)
    {
        // Requête de chargement du produit
        $this->load->model('ProductsModel');
        $product = $this->ProductsModel->productDetails($id);
        $View["product"] = $product;

        // Requête de chargement de la typologie et coef du client loggé
        $this->load->model('CustomersModel');
        $id = $_SESSION['user_id'];
        $customer = $this->CustomersModel->getCustomerCoef($id);
        $View["customer"] = $customer;

        // Chargement de la vue productDetails
        $this->load->view('public/templates/header');
        $this->load->view('productDetails', $View);
        $this->load->view('public/templates/footer');
    }
}
