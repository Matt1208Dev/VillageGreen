<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Basket extends CI_Controller
{
    public function viewBasket()
    {
        $this->load->view('public/templates/header');
        $this->load->view('basket/viewBasket');
        $this->load->view('public/templates/footer');
    }

    public function addToBasket()
    {
        // On récupère les données du formulaire 
        $item = $this->input->post();

        // On contôle l'existence d'un panier dans la session 
        if($this->session->basket == null)
        {
            // On créé le tableau qui sera le futur panier 
            $basket = array();

            // On ajoute les infos du produit $item au tableau du panier $basket 
            array_push($basket, $item);

            // On stocke le panier dans une variable de session nommée 'basket'            
            $this->session->set_userdata("basket", $basket);

            // On récupère l'URI de la page qui appelle la fonction
            $current_uri = substr($this->session->uri, 1);
            // et on redirige sur cette même page
            redirect($current_uri);
        }
        else 
        {   // le panier existe

            // On récupère le contenu du panier en session           
            $basket = $this->session->basket;
            var_dump($basket);   

            $pro_id = $this->input->post('pro_id');

            //création d'un tableau temporaire vide
            $tempBasket = array(); 

            // On initialise un flag qui passera à true si le produit est présent dans le panier après vérification
            $alreadyInBasket = false;

            // On parcourt le panier récupéré dans $basket
            for ($i = 0; $i < count($basket); $i++) 
            {
                // Si les ID présents dans $basket et $_POST correspondent
                if ($basket[$i]['pro_id'] == $pro_id)
                {
                    $alreadyInBasket = true;
                    // On incrémente la quantité du produit
                    $basket[$i]['pro_qty'] = $basket[$i]['pro_qty'] + 1;

                    // on inclut le produit de $basket mis à jour
                    array_push($tempBasket, $basket[$i]);

                } 
                // Les ID ne correspondent pas, on inclut le produit de $basket
                else 
                {
                    array_push($tempBasket, $basket[$i]);
                }
            }

            // Le produit n'est pas présent dans le panier
            if($alreadyInBasket === false)
            {
                // On l' ajoute au panier temporaire
                array_push($tempBasket, $item);
            }

            // $basket récupère les données à jour
            $basket = $tempBasket;

            // On supprime la variable $tempBasket qui ne servira plus
            unset($tempBasket);

            // Mise à jour de la variable de session "basket"
            $this->session->set_userdata("basket", $basket);

            // On récupère l'URI de la page qui appelle la fonction
            $current_uri = substr($this->session->uri, 1);
            // et on redirige sur cette même page
            redirect($current_uri);
        }
    }

    public function modifyQuantity()
    {
        // Récupération des infos panier dans la variable de session basket
        $basket = $this->session->basket;

        // Récupération des infos produit et quantité dans $_POST
        $product = $this->input->post();

        //création d'un tableau temporaire vide
        $tempBasket = array(); 

        // On parcourt panier récupéré dans $basket
        for ($i = 0; $i < count($basket); $i++) 
        {
            // Si les ID présents dans $basket et $_POST correspondent
            if ($basket[$i]['pro_id'] == $product['pro_id'])
            {
                // On compare les quantités
                if ($basket[$i]['pro_qty'] != $product['pro_qty'])
                {
                    // Elles différent, on inclut le produit de $_POST avec sa quantité dans le panier temporaire
                    array_push($tempBasket, $product);
                }
            } 
            // Les ID ne correspondent pas, on inclut le produit de $basket
            else 
            {
                array_push($tempBasket, $basket[$i]);
            }
        }

        // $basket récupère les données à jour
        $basket = $tempBasket;

        // On supprime la variable $tempBasket qui ne servira plus
        unset($tempBasket);

        // Mise à jour de la variable de session "basket"
        $this->session->set_userdata("basket", $basket);

        // On réaffiche le panier 
        redirect("basket/viewBasket");
    }

    public function removeProduct()
    {
        // On récupère le panier dans $_SESSION
        $basket = $this->session->basket;

        // et l'ID du produit que le client souhaite ajouter dans $_POST
        $pro_id = $this->input->post('pro_id');

        //création d'un tableau temporaire vide
        $tempBasket = array(); 

        // On parcourt le panier à la recherche du produit à supprimer
        for ($i = 0; $i < count($basket); $i++)
        {
            // L'ID ne correspond pas à l'ID recherché
            if ($basket[$i]['pro_id'] !== $pro_id) 
            {
                // On l'ajoute au tableau temporaire
                array_push($tempBasket, $basket[$i]);
            }
        }

        // $basket récupère les données à jour
        $basket = $tempBasket;

        // On supprime la variable $tempBasket qui ne servira plus
        unset($tempBasket);

        // Mise à jour de la variable de session "basket"
        $this->session->set_userdata("basket", $basket);

        // On réaffiche le panier 
        redirect("basket/viewBasket");
    }

    public function emptyBasket()
    {
        // Suppression de la variable de session basket
        $this->session->unset_userdata('basket');

        // Reaffichage du panier
        redirect('Basket/viewBasket');
    }

    public function isLogged()
    {
        // On vérifie dans $_SESSION la présence de 'logged_in'
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            return true;
        }
        // On vérifie la présence de cookies de log
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
                    // Le second paramètre (true) de get_cookie() échappe les valeurs récupérées
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

    public function confirmInformations()
    {
        // Vérification que le client est loggé
        $isLogged = $this->isLogged();

        // Le client est loggé
        if ($isLogged === true)
        {
            // Récupération des données client pour affichage dans le formulaire au chargement de la vue
            $id = $_SESSION['user_id'];
            $this->load->model('CustomersModel');
            $customer = $this->CustomersModel->getCustomer($id);
            $View['customer'] = $customer;

            // Affichage de la vue
            $this->load->view('public/templates/header');
            $this->load->view('basket/confirmInformations', $View);
            $this->load->view('public/templates/footer');
        }
        else 
        // Le client n'est pas loggé
        {
            // Redirection vers la page d'home'
            redirect('Products/home');
        }
    }

    public function createOrder()
    {
        // Vérification que le client est loggé
        $isLogged = $this->isLogged();

        // Le client est loggé
        if ($isLogged === true)
        {
            // On récupère les infos utilisateur dans la session pour la création de la commande
            $user_id = $_SESSION['user_id'];
            $user_type = $_SESSION['type'];
            // Création de la commande
            $ord_date = date('Y-m-d');

            if($user_type == "Particulier")
            {
                $pay_method = "Comptant";
            }
            else if($user_type == "Professionnel")
            {
                $pay_method = "Différé";
            }
            
            $ord_status = 1; // 1er statut de la commande : "Validée"

            $data = array(

                'ord_date' => $ord_date,
                'ord_pay_method' => $pay_method,
                'ord_ost_id' => $ord_status,
                'ord_cus_id' => $user_id
            );

            // Création de la commande dans la bdd
            $this->load->model('OrdersModel');
            $this->OrdersModel->CreateOrder($data);

            // Récupération de l'ID de la commande nouvellement créée
            $id = $this->db->insert_id();

            // On récupère le panier dans $_SESSION
            $basket = $this->session->basket;

            foreach($basket as $item)
            {
                $ode_qty = $item['pro_qty'];
                $ode_tot_exc_tax = $item['pro_ppet'] + ($item['pro_ppet'] * $item['cus_coef']/100);
                $ode_tax_rate = 20;
                $ode_tot_all_tax_inc = ($ode_tot_exc_tax + $ode_tot_exc_tax * $ode_tax_rate/100);
                $ode_pro_id = $item['pro_id'];

                $line = array(

                    'ode_qty' => $ode_qty,
                    'ode_tot_exc_tax' => $ode_tot_exc_tax,
                    'ode_tax_rate' => $ode_tax_rate,
                    'ode_tot_all_tax_inc' => $ode_tot_all_tax_inc,
                    'ode_pro_id' => $ode_pro_id,
                    'ode_ord_id' => $id
                );

                $this->OrdersModel->CreateOrderDetailsLine($line);
            }

            // Redirection vers la page de succès
            $View['newId'] = $id;
            $this->load->view('public/templates/header');
            $this->load->view('Basket/createOrderSuccess', $View);
            $this->load->view('public/templates/footer');
        }
        else 
        // Le client n'est pas loggé
        {
            // Redirection vers la page d'home'
            redirect('Products/home');
        }
    }
}