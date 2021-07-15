<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller {

    public function accueil()
    {
        $this->load->view('header');
        $this->load->view('accueil');
        $this->load->view('footer');
    }

    public function listGuitar()
    {
        $this->load->model('ProduitsModel');
        $aProduits = $this->ProduitsModel->listGuitar();

        $aView["liste"] = $aProduits;

        $this->load->view('header');
        $this->load->view('listGuitar', $aView);
        $this->load->view('footer');
    }

    public function productDetails($id)
    {
        $this->load->model('ProduitsModel');
        $aProduits = $this->ProduitsModel->productDetails($id);

        $aView["product"] = $aProduits;

        $this->load->view('header');
        $this->load->view('productDetails', $aView);
        $this->load->view('footer');
    }
}