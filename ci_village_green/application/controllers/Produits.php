<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller {

    public function accueil()
    {
        $this->load->view('header');
        $this->load->view('accueil');
        $this->load->view('footer');
    }
}