<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function home()
    {
        // Chargement de la vue home
        $this->load->view('public/templates/header');
        $this->load->view('home');
        $this->load->view('public/templates/footer');
    }

    public function list($catId)
    {
        $catId = $this->security->xss_clean($catId);
        if(!is_numeric($catId))
        {
            redirect('Products/home');
        }
        else
        {
            // Requête de chargement de tous les produits d'une catégorie selectionnée
            $this->load->model('ProductsModel');
            $list = $this->ProductsModel->list($catId);
            $View["liste"] = $list;

            if ($this->db->affected_rows() === 0)
            {
                redirect('Products/home');
            }
            else
            {
                // Vérification d'un log client
                if ($this->isLogged()) {
                    // Requête de chargement de la typologie et coef du client loggé
                    $this->load->model('CustomersModel');
                    $id = $_SESSION['user_id'];
                    $customer = $this->CustomersModel->getCustomerCoef($id);
                    $View["customer"] = $customer;

                }

                // Chargement de la vue list
                $this->load->view('public/templates/header');
                $this->load->view('list', $View);
                $this->load->view('public/templates/footer');
            }
        }
    }

    public function productDetails($id)
    {
        $id = $this->security->xss_clean($id);
        if(!is_numeric($id))
        {
            redirect('Products/home');
        }
        else
        {
        // Requête de chargement du produit
        $this->load->model('ProductsModel');
        $product = $this->ProductsModel->productDetails($id);
        $View["product"] = $product;

        if ($this->db->affected_rows() === 0)
            {
                redirect('Products/home');
            }
            else
            {
                // Vérification d'un log client
                if ($this->isLogged()) {
                    // Requête de chargement de la typologie et coef du client loggé
                    $this->load->model('CustomersModel');
                    $id = $_SESSION['user_id'];
                    $customer = $this->CustomersModel->getCustomerCoef($id);
                    $View["customer"] = $customer;

                    // Chargement de la vue productDetails
                    $this->load->view('public/templates/header');
                    $this->load->view('productDetails', $View);
                    $this->load->view('public/templates/footer');
                } else {
                    // Chargement de la vue productDetails
                    $this->load->view('public/templates/header');
                    $this->load->view('productDetails', $View);
                    $this->load->view('public/templates/footer');
                }
            }
        }
    }

    public function isLogged()
    {
        // On vérifie dans $_SESSION la présence de 'logged_in'
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            return true;
        }
        // On vérifie la présence de cookies de log. Le second paramètre (true) de get_cookie() échappe les valeurs récupérées.
        else if (get_cookie('logged_in', true) === '1') {
            $cus_id =  get_cookie('user_id', true);
            $cus_firstname = get_cookie('username', true);
            $cus_mail = get_cookie('email', true);
            $cus_type = get_cookie('type', true);
            $logged_in = get_cookie('logged_in', true);

            // On compare les valeurs à celles en bdd
            $this->load->model('CustomersModel');
            $checkCookies = $this->CustomersModel->checkCustomerCookieLogin($cus_id, $cus_firstname, $cus_mail, $cus_type);

            // Elles correspondent
            if ($checkCookies === true) {
                // On initialise les variables de sessions
                $userInfos = array(
                    'user_id'   => $cus_id,
                    'username'  => $cus_firstname,
                    'email'     => $cus_mail,
                    'type'      => $cus_type,
                    'logged_in' => $logged_in
                );

                $this->session->set_userdata($userInfos);

                return true;
            }
            // Elles ne correspondent pas
            else {
                return false;
            }
        }
        // Pas de cookie trouvé, ni de variable de session 'logged_in'
        else {
            return false;
        }
    }
}
