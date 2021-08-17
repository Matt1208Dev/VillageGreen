<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller 
{
    public function signUp()
    {
        if(!$this->input->post())
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
		        $this->form_validation->set_rules("cus_mail", "email", "required|regex_match[/[a-zA-Z0-9.!#$%&’*+_`-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/]", array("required"=>"Le champ %s n'est pas complété.", "regex_match"=>"Merci de n'utiliser que des majuscules, minuscules et/ou les caractères suivants : .!#$%&’*+_`-"));
                $this->form_validation->set_rules('cus_pass', 'mot de passe', 'required|regex_match[/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/]', array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'Le mot de passe doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule et un caractères spécial.'));
                $this->form_validation->set_rules('cus_pass_confirm', 'confirmation mot de passe', "required|regex_match[/". $_POST['cus_pass'] ."/]", array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'Le mot de passe ne correspond pas à celui saisi précédemment.'));
                $this->form_validation->set_rules('cus_firstname', 'prénom', 'required|regex_match[/[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,30}/]', array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'30 caractères maximum, les caractères spéciaux suivants sont acceptés : -èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_lastname', 'nom', 'required|regex_match[/[a-zA-Z\-èàùìòéãõäëïüöâêîôû]{1,50}/]', array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'50 caractères maximum, les caractères spéciaux suivants sont acceptés : -èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_sex', 'statut', 'required', array('required'=>'Merci de cocher un genre.'));
                $this->form_validation->set_rules('cus_bil_address', 'adresse', 'required|regex_match[/[a-zA-Z\-\',èàùìòéãõäëïüöâêîôû]{1,255}/]', array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_bil_postalcode', 'code postal', 'required|regex_match[/^[0-9]{5}$/]', array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'Le code postal doit comprendre 5 chiffres.'));
                $this->form_validation->set_rules('cus_bil_city', 'ville', 'required|regex_match[/[a-zA-Z\-\',èàùìòéãõäëïüöâêîôû]{1,50}/]', array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'Attention, seuls les caractères spéciaux suivants sont acceptés : -\',èàùìòéãõäëïüöâêîôû.'));
                $this->form_validation->set_rules('cus_type', 'statut', 'required', array('required'=>'Merci de cocher un %s.'));
                $this->form_validation->set_rules('cus_phone', 'numéro de téléphone mobile', 'required|regex_match[/^0[67]{1}[0-9]{8}$/]', array('required'=>'Le champ %s n\'est pas complété.', 'regex_match'=>'Le numéro de téléphone mobile doit être composé de 10 chiffres, commencer par 06 ou 07 et écris au format 06XXXXXXXX.'));

                if($this->form_validation->run() == FALSE) // Echec de la validation, on réaffiche la vue formulaire
                {
                    $this->load->view('public/templates/header');
                    $this->load->view('customers/signup');
                    $this->load->view('public/templates/footer');
                }
                else
                {
                    // Affectation du coefficient prix selon profil client
                    if($data['cus_type'] === 'Particulier')
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
        $this->load->view('public/templates/header');
        $this->load->view('customers/signUpSuccess.php');
        $this->load->view('public/templates/footer');
    }

    public function login()
    {
        $this->load->model('CustomersModel');

        if(!$this->input->post())
        {
            // Pas d'entrées dans $_POST, 1er affichage de la page
            $this->load->view('public/templates/header');
            $this->load->view('customers/login');
            $this->load->view('public/templates/footer');
        }
        else
        {
            $mail = $this->input->post('cus_mail');
            $pass = $this->input->post('cus_pass');
            $stayConnected = $this->input->post('stay-connected');
            $checkLogin = $this->CustomersModel->checkLogin($mail);
            $View['checkLogin'] = $checkLogin;
            $View['stayconnected'] = $stayConnected;

            if($checkLogin)
            {
                // Si les mots de passe correspondent
                if(password_verify($pass, $checkLogin[0]->cus_pass))
                {
                    // On initialise ses variables de sessions
                    $userInfos = array
                                    (
                                        'user_id'   => $checkLogin[0]->cus_id,
                                        'username'  => $checkLogin[0]->cus_firstname,
                                        'email'     => $checkLogin[0]->cus_mail,
                                        'type'      => $checkLogin[0]->cus_type,
                                        'logged_in' => TRUE
                                    );
                
                    $this->session->set_userdata($userInfos);

                    // Si "Rester connecté" est coché
                    if($stayConnected == 'yes')
                    {
                        // On initialise des cookies
                        set_cookie('user_id', $checkLogin[0]->cus_id, 3600*24*365);
                        set_cookie('username', $checkLogin[0]->cus_firstname, 3600*24*365);
                        set_cookie('email', $checkLogin[0]->cus_mail, 3600*24*365);
                        set_cookie('type', $checkLogin[0]->cus_type, 3600*24*365);
                        set_cookie('logged_in', TRUE, 3600*24*365);
                    }

                    redirect('Produits/accueil');
                }
                // Si les mots de passe ne correspondent pas
                else
                {
                    
                }
            }
            else
            {

            }

            $this->load->view('customers/login', $View);
        }
    }

    public function logOut()
    {
        session_destroy();
        redirect('Produits/accueil');
    }
}