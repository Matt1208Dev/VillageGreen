<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function login()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            redirect('Admin/home');;
        }
        else if($this->input->post())
        {
            $data = $this->input->post();
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules("id", "Identifiant", "required|regex_match[/Admin/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "L'identifiant est erroné"));
            $this->form_validation->set_rules("pass", "Mot de passe", "required|regex_match[/Admin/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Mot de passe erroné"));

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admin/login');
            }
            else
            {
                $this->session->set_userdata('userId', 'Admin');
                redirect('Admin/home');
            }
        }
        else
        {
            $this->load->view('admin/login'); 
        }
    }
    
    public function sessionDestroy()
    {
        session_destroy();
        redirect('Produits/accueil');
    }

    public function home()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            $this->load->view('admin/header');
            $this->load->view('admin/home');
            $this->load->view('admin/footer');
        }
        else
        {
            redirect('Produits/accueil');
        }
    }

    public function productList()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            if(!$this->input->post())
            {
                $this->load->model('ProduitsModel');
                // $list = $this->ProduitsModel->productList();
                // $View["list"] = $list;

                $categories = $this->ProduitsModel->getCategories();
                $View["categories"] = $categories;

                $this->load->view('admin/header');
                $this->load->view('admin/ProductSearchForm', $View);
                // $this->load->view('admin/productList', $View);
                $this->load->view('admin/footer');
            }
            else
            {
                if($this->input->post('keyword-search') === '')
                {
                    $this->load->model('ProduitsModel');

                    $categories = $this->ProduitsModel->getCategories();
                    $View["categories"] = $categories;

                    $catId = $this->input->post('subcategory-selector');
                    // $this->load->model('ProduitsModel');
                    $list = $this->ProduitsModel->productList($catId);
                    $View["list"] = $list;

                    $this->load->view('admin/header');
                    $this->load->view('admin/ProductSearchForm', $View);
                    $this->load->view('admin/productList', $View);
                    $this->load->view('admin/footer');
                }
                else
                {
                    $keyword = $this->input->post('keyword-search');
                    $this->load->model('ProduitsModel');

                    $categories = $this->ProduitsModel->getCategories();
                    $View["categories"] = $categories;

                    $list = $this->ProduitsModel->productByKeyword($keyword);
                    $View["list"] = $list;

                    $this->load->view('admin/header');
                    $this->load->view('admin/ProductSearchForm', $View);
                    $this->load->view('admin/productList', $View);
                    $this->load->view('admin/footer');
                }
            }
        }
        else
        {
            redirect('Produits/accueil');
        }
    }

    public function updateProduct($id)
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin') // Verification de la présence de la variable de session userId
        {
            $this->load->model('ProduitsModel');
            $product = $this->ProduitsModel->productDetails($id);
            $View["product"] = $product;

            $categories = $this->ProduitsModel->getCategories();
            $View["categories"] = $categories;

            $subCategories = $this->ProduitsModel->getSubCategories();
            $View["subCategories"] = $subCategories;

            $this->load->model('SuppliersModel');
            $suppliers = $this->SuppliersModel->getSuppliers();
            $View["suppliers"] = $suppliers;

            if(!$this->input->post()) // Verification de la présence de valeurs dans $_POST
            {
                // 1er affichage de la page

                $this->load->view('admin/header');
                $this->load->view('admin/updateProduct', $View);
                $this->load->view('admin/footer');

            }
            else
            {
                // On va effectuer le contrôle des saisies utilisateur

                $data = $this->input->post();

				$this->form_validation->set_error_delimiters('<div class="fw-bold text-danger">', '</div>');
		        $this->form_validation->set_rules('pro_label', 'Libellé', 'required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/]', array('required'=>'Le champ %s est requis','regex-match'=>'Pas plus de 50 caractères.'));
                $this->form_validation->set_rules('pro_ref', 'Référence', 'required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,15}/]', array('required'=>'Le champ %s est requis','regex-match'=>'Pas plus de 15 caractères.'));
                $this->form_validation->set_rules('pro_cat_id', 'Sous-catégorie', 'required', array('required'=>'Le choix d\'une %s est requis'));
                $this->form_validation->set_rules('pro_desc', 'description', 'required|regex_match[/[a-zA-Zéèàêëäï,.\'\"\\-\\ ]{1,255}/]', array('required'=>'Le champ %s est requis','regex-match'=>'La description ne doit pas excéder 255 caractères.'));
                $this->form_validation->set_rules('pro_ppet', 'prix d\'achat HT', 'required|regex_match[/[0-9]{1,5}[0-9]{2}/]', array('required'=>'Le champ %s est requis','regex-match'=>'Le prix doit être au format 1590.90'));
                $this->form_validation->set_rules('pro_spet', 'prix de vente HT', 'required|regex_match[/[0-9]{1,5}[0-9]{2}/]', array('required'=>'Le champ %s est requis','regex-match'=>'Le prix doit être au format 1590.90'));
                $this->form_validation->set_rules('pro_phy_stk', 'stock', 'required|regex_match[/[0-9]{1,5}/]', array('required'=>'Le champ %s est requis','regex-match'=>'Le nombre doit être un entier.'));
                $this->form_validation->set_rules('pro_lock', 'verrou produit', 'required', array('required'=>'Le champ %s est requis'));
                $this->form_validation->set_rules('pro_sup_id', 'fournisseur', 'required', array('required'=>'Le choix d\'un %s est requis'));

                if($this->form_validation->run() == FALSE) // Echec de la validation, on réaffiche la vue formulaire
                {
                    $this->load->view('admin/header');
                    $this->load->view('admin/updateProduct', $View);
                    $this->load->view('admin/footer');
                }
                else
                {
                    // Formulaire validé, on met à jour la BDD
                    $this->load->model('produitsModel');
                    $this->produitsModel->UpdateProduct($id, $data);
                    $this->produitsModel->UpdateProductLastModifDate($id);

                    redirect("Admin/productList");
                }
            }
        }
    }
}

