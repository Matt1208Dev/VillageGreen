<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function getCustomer($id)
    {
        $this->load->model('CustomersModel');
        $customer = $this->CustomersModel->getCustomer();
        $View['customer'] = $customer;
    }

    public function signUp()
    {
        if (!$this->input->post()) 
        {
            // Pas d'entrées dans $_POST, 1er affichage de la page
            $this->load->view('public/templates/header');
            $this->load->view('customers/signup');
            $this->load->view('public/templates/footer');
        }
        else 
        {
            // Contrôle de saisie du formulaire
            $data = $this->input->post();

            $this->form_validation->set_error_delimiters('<div class="fw-bold text-danger text-center">', '</div>');
            $this->form_validation->set_rules("cus_mail", "email", "required|regex_match[/[a-zA-Z0-9.!#$%&’*+_`-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/]", array("required" => "Le champ %s n'est pas complété.", "regex_match" => "Merci de n'utiliser que des majuscules, minuscules et/ou les caractères suivants : .!#$%&’*+_`-"));
            $this->form_validation->set_rules('cus_pass', 'mot de passe', 'required|regex_match[/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le mot de passe doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule et un caractères spécial.'));
            $this->form_validation->set_rules('cus_pass_confirm', 'confirmation mot de passe', "required|regex_match[/" . $_POST['cus_pass'] . "/]", array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le mot de passe ne correspond pas à celui saisi précédemment.'));
            $this->form_validation->set_rules('cus_firstname', 'prénom', 'required|regex_match[/[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,30}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => '30 caractères maximum, les caractères spéciaux suivants sont acceptés : -èàùìòéãõäëïüöâêîôû.'));
            $this->form_validation->set_rules('cus_lastname', 'nom', 'required|regex_match[/[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,50}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => '50 caractères maximum, les caractères spéciaux suivants sont acceptés : -èàùìòéãõäëïüöâêîôû.'));
            $this->form_validation->set_rules('cus_sex', 'statut', 'required', array('required' => 'Merci de cocher un genre.'));
            $this->form_validation->set_rules('cus_bil_address', 'adresse', 'required|regex_match[/[a-zA-Z0-9\-\' ,èàùìòéãõäëïüöâêîôû]{1,255}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
            $this->form_validation->set_rules('cus_bil_postalcode', 'code postal', 'required|regex_match[/^[0-9]{5}$/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le code postal doit comprendre 5 chiffres.'));
            $this->form_validation->set_rules('cus_bil_city', 'ville', 'required|regex_match[/[a-zA-Z\-\' ,èàùìòéãõäëïüöâêîôû]{1,50}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
            $this->form_validation->set_rules('cus_type', 'statut', 'required', array('required' => 'Merci de cocher un %s.'));
            $this->form_validation->set_rules('cus_phone', 'numéro de téléphone mobile', 'required|regex_match[/^0[67]{1}[0-9]{8}$/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le numéro de téléphone mobile doit être composé de 10 chiffres, commencer par 06 ou 07 et écris au format 06XXXXXXXX.'));

            if ($this->form_validation->run() == FALSE) // Echec de la validation, on réaffiche la vue formulaire
            {
                $this->load->view('public/templates/header');
                $this->load->view('customers/signup');
                $this->load->view('public/templates/footer');
            }
            else
            {
                // Affectation du coefficient prix selon profil client
                if ($data['cus_type'] === 'Particulier') 
                {
                    $data['cus_coef'] = 40;
                } 
                else 
                {
                    $data['cus_coef'] = 20; // Professionnel
                }

                // Par défaut nous allons affecter à l'adresse de livraison les mêmes valeurs que celles de facturation
                $data['cus_del_address'] = $data['cus_bil_address'];
                $data['cus_del_postalcode'] = $data['cus_bil_postalcode'];
                $data['cus_del_city'] = $data['cus_bil_city'];


                // Hachage du password du client/utilisateur
                $data['cus_pass'] = password_hash($data['cus_pass'], PASSWORD_DEFAULT);

                // Destruction des entrées 'cuss_pass_confirm' et 'cus_xxx' qui ne seront pas stockées en bdd
                unset($data['cus_pass_confirm'], $data['cus_xxx']);

                // Insertion des données en bdd
                $this->db->insert('customers', $data);

                redirect('Customers/signUpSuccess');
            }
        }
    }

    public function signUpSuccess()
    {
        // Affichage de la page d'inscription réussie
        $this->load->view('public/templates/header');
        $this->load->view('customers/signUpSuccess.php');
        $this->load->view('public/templates/footer');
    }

    public function login()
    {
        $this->load->model('CustomersModel');

        if (!$this->input->post()) 
        {
            // Pas d'entrées dans $_POST, 1er affichage de la page
            $this->load->view('public/templates/header');
            $this->load->view('home');
            $this->load->view('public/templates/footer');
        } 
        else 
        {
            // On récupère les données saisies par l'utilisateur
            $mail = html_escape($this->input->post('cus_mail'));
            $pass = html_escape($this->input->post('cus_pass'));
            $stayConnected = html_escape($this->input->post('stay-connected'));

            // On récupère l'URI de la page qui appelle la fonction
            $current_uri = substr($this->session->uri, 1);

            // On vérifie que le mail saisi renvoi un résultat en bdd
            $checkLogin = $this->CustomersModel->checkLogin($mail);

            // Un résultat est trouvé
            if ($checkLogin) 
            {
                // Si les mots de passe correspondent
                if (password_verify($pass, $checkLogin[0]->cus_pass)) 
                {

                    // On initialise ses variables de sessions
                    $userInfos = array(
                        'user_id'   => $checkLogin[0]->cus_id,
                        'username'  => $checkLogin[0]->cus_firstname,
                        'email'     => $checkLogin[0]->cus_mail,
                        'type'      => $checkLogin[0]->cus_type,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($userInfos);

                    // Si "Rester connecté" est coché
                    if ($stayConnected == 'yes') 
                    {
                        // On initialise des cookies
                        set_cookie('user_id', $checkLogin[0]->cus_id, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                        set_cookie('username', $checkLogin[0]->cus_firstname, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                        set_cookie('email', $checkLogin[0]->cus_mail, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                        set_cookie('type', $checkLogin[0]->cus_type, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                        set_cookie('logged_in', TRUE, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                    }

                    // On recharge la vue actuelle
                    redirect($current_uri);

                }
                // Si les mots de passe ne correspondent pas
                else 
                {
                    // Message d'erreur pour le password
                    $errorMsg['cus_pass'] = 'Mot de passe erroné';
                    $View['errorMsg'] = $errorMsg;
                    // On réaffiche la page d'accueil
                    $this->load->view('public/templates/header', $View);
                    $this->load->view('home');
                    $this->load->view('public/templates/footer');
                }
            }
            // Pas de résultat
            else 
            {
                // Message d'erreur pour le mail
                $errorMsg['cus_mail'] = 'Email inconnu';
                $View['errorMsg'] = $errorMsg;
                // On réaffiche la page d'accueil
                $this->load->view('public/templates/header', $View);
                $this->load->view('home');
                $this->load->view('public/templates/footer');
            }
        }
    }

    public function logOut()
    {
        // Destruction de $_SESSION
        session_destroy();

        // Si le cookie "logged_in" pour le maintien du log existe
        if (isset($_COOKIE['logged_in'])) 
        {
            // On l'efface
            delete_cookie('logged_in');
        }

        // Redirection vers la page d'accueil
        redirect('Products/home');
    }

    public function isLogged()
    {
        // On vérifie dans $_SESSION la présence de 'logged_in'
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) 
        {
            return true;
        }
        // On vérifie la présence de cookies de log
        else if (get_cookie('logged_in', true) === '1') 
        {
            // Le second paramètre (true) de get_cookie() échappe les valeurs récupérées
            $cus_id =  get_cookie('user_id', true);
            $cus_firstname = get_cookie('username', true);
            $cus_mail = get_cookie('email', true);
            $cus_type = get_cookie('type', true);
            $logged_in = get_cookie('logged_in', true);

            // On compare les valeurs à celles en bdd
            $this->load->model('CustomersModel');
            $checkCookies = $this->CustomersModel->checkCustomerCookieLogin($cus_id, $cus_firstname, $cus_mail, $cus_type);

            // Elles correspondent
            if ($checkCookies === true) 
            {
                // On groupe les variables de sessions dans un tableau
                $userInfos = array(
                    
                    'user_id'   => $cus_id,
                    'username'  => $cus_firstname,
                    'email'     => $cus_mail,
                    'type'      => $cus_type,
                    'logged_in' => $logged_in
                );

                // et on les initialise
                $this->session->set_userdata($userInfos);

                // On renouvelle les cookies
                set_cookie('user_id', $cus_id, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                set_cookie('username', $cus_firstname, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                set_cookie('email', $cus_mail, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                set_cookie('type', $cus_type, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);
                set_cookie('logged_in', TRUE, time() + (3600 * 24 * 7), 'localhost', '/', '', false, true);

                return true;
            }
            // Elles ne correspondent pas
            else 
            {
                // On supprime les cookies erronés
                delete_cookie('user_id');
                delete_cookie('username');
                delete_cookie('email');
                delete_cookie('type');
                delete_cookie('logged_in');

                return false;
            }
        }
        // Pas de cookie trouvé, ni de variable de session 'logged_in'
        else 
        {
            return false;
        }
    }

    public function myAccount()
    {
        // Vérification que le client est loggé
        $isLogged = $this->isLogged();

        // Le client est loggé
        if ($isLogged === true) 
        {
            $this->load->view('public/templates/header');
            $this->load->view('Customers/myAccount/home');
            $this->load->view('public/templates/footer');
        }
    }

    public function updateInformation()
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

            // Pas de valeurs dans $_POST
            if (!$this->input->post()) 
            {
                // 1er affichage de la page
                $this->load->view('public/templates/header');
                $this->load->view('Customers/myAccount/updateInformation', $View);
                $this->load->view('public/templates/footer');
            } 
            else
            {
                // Contrôle de saisie du formulaire
                $data = $this->input->post();
                $id = $this->input->post('cus_id');

                // Règles de validation 
                $this->form_validation->set_error_delimiters('<div class="fw-bold text-danger">', '</div>');
                $this->form_validation->set_rules("cus_mail", "email", "required|regex_match[/[a-zA-Z0-9.!#$%&’*+_`-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/]", array("required" => "Le champ %s n'est pas complété.", "regex_match" => "Merci de n'utiliser que des majuscules, minuscules et/ou les caractères suivants : .!#$%&’*+_`-"));
                $this->form_validation->set_rules('cus_firstname', 'prénom', 'required|regex_match[/[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,30}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => '30 caractères maximum, les caractères spéciaux suivants sont acceptés : -èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_lastname', 'nom', 'required|regex_match[/[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,50}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => '50 caractères maximum, les caractères spéciaux suivants sont acceptés : -èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_sex', 'statut', 'required', array('required' => 'Merci de cocher un genre.'));
                $this->form_validation->set_rules('cus_bil_address', 'adresse', 'required|regex_match[/[a-zA-Z\-\',èàùìòéãõäëïüöâêîôû]{1,255}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_bil_postalcode', 'code postal', 'required|regex_match[/^[0-9]{5}$/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le code postal doit comprendre 5 chiffres.'));
                $this->form_validation->set_rules('cus_bil_city', 'ville', 'required|regex_match[/[a-zA-Z\-\',èàùìòéãõäëïüöâêîôû]{1,50}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_del_address', 'adresse', 'required|regex_match[/[a-zA-Z\-\',èàùìòéãõäëïüöâêîôû]{1,255}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_del_postalcode', 'code postal', 'required|regex_match[/^[0-9]{5}$/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le code postal doit comprendre 5 chiffres.'));
                $this->form_validation->set_rules('cus_del_city', 'ville', 'required|regex_match[/[a-zA-Z\-\',èàùìòéãõäëïüöâêîôû]{1,50}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_type', 'statut', 'required', array('required' => 'Merci de cocher un %s.'));
                $this->form_validation->set_rules('cus_phone', 'numéro de téléphone mobile', 'required|regex_match[/^0[67]{1}[0-9]{8}$/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le numéro de téléphone mobile doit être composé de 10 chiffres, commencer par 06 ou 07 et écris au format 06XXXXXXXX.'));

                // Si le champ password a été rempli
                if ($data['cus_pass'] !== '') 
                {
                    // On énonce les règles de validation le concernant
                    $this->form_validation->set_rules('cus_pass', 'mot de passe', 'required|regex_match[/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/]', array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le mot de passe doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule et un caractères spécial.'));
                    $this->form_validation->set_rules('cus_pass_confirm', 'confirmation mot de passe', "required|regex_match[/^" . $_POST['cus_pass'] . "$/]", array('required' => 'Le champ %s n\'est pas complété.', 'regex_match' => 'Le mot de passe ne correspond pas à celui saisi précédemment.'));
                } 
                else 
                {
                    // Sinon on détruit les variables pour ne pas écraser le mot de passe enregistré en bdd
                    unset($data['cus_pass'], $data['cus_pass_confirm']);
                }

                // Contrôle de saisie
                if ($this->form_validation->run() == FALSE) 
                {
                    // Echec de la validation, on réaffiche la vue formulaire
                    $this->load->view('public/templates/header');
                    $this->load->view('Customers/myAccount/updateInformation', $View);
                    $this->load->view('public/templates/footer');
                } 
                else 
                {
                    // Validation OK
                    // Le mot de passe fait partie des champs à mettre à jour
                    if (isset($data['cus_pass'])) 
                    {
                        // Hachage du password du client/utilisateur
                        $data['cus_pass'] = password_hash($data['cus_pass'], PASSWORD_DEFAULT);

                        // Destruction de l'entrée 'cuss_pass_confirm' qui ne sera pas stockée en bdd
                        unset($data['cus_pass_confirm']);
                    }

                    // Affectation du coefficient prix selon profil client
                    if ($data['cus_type'] === 'Particulier') 
                    {
                        $data['cus_coef'] = 40;
                    } 
                    else 
                    {
                        $data['cus_coef'] = 20; // Professionnel
                    }

                    // Mise à jour des données en bdd
                    $this->db->where('cus_id', $id);
                    $this->db->update('customers', $data);

                
                    
                    redirect('Customers/updateInformationSuccess');
                    
                }
            }
        } 
        else // Le client n'est pas loggé
        {
            // Redirection vers la page d'home'
            redirect('Products/home');
        }
    }

    public function updateInformationSuccess()
    {
        // Affichage de la page de modification réussie
        $this->load->view('public/templates/header');
        $this->load->view('customers/myAccount/updateInformationSuccess');
        $this->load->view('public/templates/footer');
    }

    public function myOrders()
    {
        // Vérification que le client est loggé
        $isLogged = $this->isLogged();

        // Le client est loggé
        if ($isLogged === true) 
        {
            // Récupération de l'ID du client dans $_SESSION
            $id = $this->session->user_id;

            // Requête de récupération de ses commandes
            $this->load->model('OrdersModel');
            $ordersId = $this->OrdersModel->getOrdersIdByCustomerId($id);

            // Tri du tableau en ordre décroissant
            rsort($ordersId);

            $allOrders = array();

            // Pour chaque commande, Nous allons récupérer les informations relatives à/aux ligne(s) produit qu'elle contient
            for($i=0; $i < count($ordersId); $i++)
            {
                $line = $this->OrdersModel->getOrderLinesByOrderId($ordersId[$i]->ord_id);
                array_push($allOrders, $line);
            }

            // Chargement de la vue "mes commandes"
            $View['orders'] = $allOrders;
            $this->load->view('public/templates/header');
            $this->load->view('Customers/myAccount/myOrders', $View);
            $this->load->view('public/templates/footer');
        }
        else // Le client n'est pas loggé
        {
            // Redirection vers la page d'home'
            redirect('Products/home');
        }
    }

    public function cancelOrderDetailsLine()
    {
        // Vérification que le client est loggé
        $isLogged = $this->isLogged();

        // Le client est loggé
        if ($isLogged === true) 
        {
            // Récupération de l'ID de la ligne à annuler et de la commande
            $ode_id = $this->input->post('ode_id');
            $ode_ord_id = $this->input->post('ode_ord_id');
            // $pro_id = $this->input->post('pro_id');
            // $ode_qty = $this->input->post('ode_qty');

            // Mise à jour du statut de la ligne à "Annulée" en bdd
            $this->load->model('OrdersModel');
            $this->OrdersModel->cancelOrderDetailsLine($ode_id);
            

            // Retour en stock de la quantité annulée. Trigger after_update_order_details fonctionnel en bdd.
            // $this->load->model('ProductsModel');

            // // On récupère la valeur en bdd du stock de l'ID produit entré en paramètre
            // $oldStk = $this->ProductsModel->getProductStk($pro_id);

            // // On additionne la quantité entrée en paramètre du stock actuel pour déterminer la nouvelle valeur
            // $newStk = $oldStk[0]->pro_phy_stk + $ode_qty;

            // // Mise à jour en base du stock
            // $this->ProductsModel->updateProductStk($pro_id, $newStk);


            // On contrôle ensuite le statut des éventuelles autres lignes de la commande
            $order = $this->OrdersModel->getOrderLinesByOrderId($ode_ord_id);

            $canceled = true;
            foreach($order as $line)
            {
                // Si au moins une des lignes n'est pas en statut "Annulée"
                if($line->ode_ost_id !== '8')
                {
                    $canceled = false;
                }
            }

            if($canceled == false)
            {
                // On laisse "En cours" le statut global de commande

                // On réaffiche la vue "mes commandes"
                redirect('Customers/myOrders');
            }
            else
            {
                // Sinon on passe le statut global de la commande sur "Annulée"
                $this->OrdersModel->cancelOrderLine($ode_ord_id);

            }

                // On réaffiche la vue "mes commandes"
                redirect('Customers/myOrders');

        }
        else // Le client n'est pas loggé
        {
            // Redirection vers la page d'accueil'
            redirect('Products/home');
        }
    }

    public function orderDetails($id)
    {
        // Vérification que le client est loggé
        $isLogged = $this->isLogged();

        // Le client est loggé
        if ($isLogged === true) 
        {
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->CustomerOrderDetails($id);

            $View["order"] = $query;

            $this->load->view('public/templates/header');
            $this->load->view('Customers/myAccount/orderDetails', $View);
            $this->load->view('public/templates/footer');


        }
        else // Le client n'est pas loggé
        {
            // Redirection vers la page d'accueil'
            redirect('Products/home');
        }
    }
}
