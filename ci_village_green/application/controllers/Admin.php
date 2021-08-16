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
            $this->load->model('ProduitsModel');
            $categories = $this->ProduitsModel->getCategories();
            $View["categories"] = $categories;
            $subCategories = $this->ProduitsModel->getSubCategories();
            $View["subCategories"] = $subCategories;

            // 1er chargement de la page ou soumission sans valeurs
            if(!$this->input->post() || ($this->input->post('subcategory-selector') === '' && $this->input->post('keyword-search') === ''))
            {
                $this->load->view('admin/header');
                $this->load->view('admin/ProductSearchForm', $View);
                $this->load->view('admin/footer');
            }
            else
            {
                // Si pas de saisie dans le champ de recherche par référence
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

    public function viewProduct($id)
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin')
        {
            $this->load->model('ProduitsModel');
            $product = $this->ProduitsModel->productById($id);
            $View["list"] = $product;

            $categories = $this->ProduitsModel->getCategories();
            $View["categories"] = $categories;

            $this->load->view('admin/header');
            $this->load->view('admin/ProductSearchForm', $View);
            $this->load->view('admin/ProductList', $View);
            $this->load->view('admin/footer');
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
		        $this->form_validation->set_rules('pro_label', 'Libellé', 'required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Pas plus de 50 caractères.'));
                $this->form_validation->set_rules('pro_ref', 'Référence', 'required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,15}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Pas plus de 15 caractères.'));
                $this->form_validation->set_rules('pro_cat_id', 'Sous-catégorie', 'required', array('required'=>'Le choix d\'une %s est requis'));
                $this->form_validation->set_rules('pro_desc', 'description', 'required|regex_match[/[a-zA-Zéèàêëäï,.\'\"\\-\\ ]{1,255}/]', array('required'=>'Le champ %s est requis','regex_match'=>'La description ne doit pas excéder 255 caractères.'));
                $this->form_validation->set_rules('pro_ppet', 'prix d\'achat HT', 'required|regex_match[/[0-9]{1,5}\.[0-9]{2}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Le prix doit être au format 1000.00'));
                $this->form_validation->set_rules('pro_spet', 'prix de vente HT', 'required|regex_match[/[0-9]{1,5}\.[0-9]{2}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Le prix doit être au format 1000.00'));
                $this->form_validation->set_rules('pro_phy_stk', 'stock', 'required|regex_match[/[0-9]{1,5}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Le nombre doit être un entier.'));
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
                    if($_FILES && $_FILES['pro_photo']['error'] === 0) // Y a-t-il eu upload de fichiers ?
                    {
                        $this->load->library('upload');
                       
                        // Récupération de l'extension du fichier uploadé
                        $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);

                        // Configuration
                            // Chemin de stockage du fichier
                        $config['upload_path'] = './assets/images/products/';

                            // Nom final du fichier
                        $config['file_name'] = $id . '.' . $extension;

                            // Ecrasement si fichier du même nom existe déjà
                        $config['overwrite'] = TRUE;

                            // Types autorisés
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|JPG|PNG'; 

                            // Initialisation de la config
                        $this->upload->initialize($config);

                            // Validation du fichier
                        if (!$this->upload->do_upload('pro_photo')) 
                        {
                            // Echec
                                // Récupération des erreurs
                            $uploadErrors = $this->upload->display_errors();
                            $View['uploadErrors'] = $uploadErrors;

                                // Récupération des erreurs dans le fichier php_error.log
                            error_log($uploadErrors, 0);

                            $this->load->library('session'); 
                            $this->session->set_flashdata('uploadErrorUser','Le téléchargement de la photo a échoué. Veuiller réessayer.');

                            $this->load->view('admin/header');
                            $this->load->view('admin/updateProduct', $View);
                            $this->load->view('admin/footer');
                        }
                        else
                        {
                            $data['pro_photo'] = $extension;

                            // Formulaire validé et upload validé, on met à jour la BDD
                            $this->load->model('produitsModel');
                            $this->produitsModel->UpdateProduct($id, $data);
                            $this->produitsModel->UpdateProductLastModifDate($id);

                            redirect("Admin/productList");
                        }
                    }
                    else
                    {
                    // Formulaire validé, on met à jour la BDD
                    $this->load->model('produitsModel');
                    $this->produitsModel->UpdateProduct($id, $data);
                    $this->produitsModel->UpdateProductLastModifDate($id);

                    redirect("Admin/updateProductSuccess");
                    }
                }
            }
        }
    }

    public function updateProductSuccess()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin') // Verification de la présence de la variable de session userId
        {
            $this->load->model('ProduitsModel');
            $categories = $this->ProduitsModel->getCategories();
            $View["categories"] = $categories;

            $this->load->view('admin/header');
            $this->load->view('admin/ProductSearchForm', $View);
            $this->load->view('admin/updateProductSuccess');
            $this->load->view('admin/footer');
        }
    }

    public function addProductSuccess()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin') // Verification de la présence de la variable de session userId
        {
            $this->load->model('ProduitsModel');
            $categories = $this->ProduitsModel->getCategories();
            $View["categories"] = $categories;

            $this->load->view('admin/header');
            $this->load->view('admin/ProductSearchForm', $View);
            $this->load->view('admin/addProductSuccess');
            $this->load->view('admin/footer');
        }
    }

    public function addProduct()
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin') // Verification de la présence de la variable de session userId
        {
            $this->load->model('ProduitsModel');
            $categories = $this->ProduitsModel->getCategories();
            $View["categories"] = $categories;

            $subCategories = $this->ProduitsModel->getSubCategories();
            $View["subCategories"] = $subCategories;

            $this->load->model('SuppliersModel');
            $suppliers = $this->SuppliersModel->getSuppliers();
            $View["suppliers"] = $suppliers;
            
            if(!$this->input->post())
            {
                $this->load->view('admin/header');
                $this->load->view('admin/addProduct', $View);
                $this->load->view('admin/footer');
            }
            else
            {
                // On va effectuer le contrôle des saisies utilisateur

                $data = $this->input->post();

				$this->form_validation->set_error_delimiters('<div class="fw-bold text-danger">', '</div>');
		        $this->form_validation->set_rules('pro_label', 'Libellé', 'required|regex_match[/[0-9a-zA-Zéèàêëäï\\-\\ ]{1,50}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Pas plus de 50 caractères.'));
                $this->form_validation->set_rules('pro_ref', 'Référence', 'required|regex_match[/[0-9a-zA-Zéèàêëäï\\-\\ ]{1,15}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Pas plus de 15 caractères.'));
                $this->form_validation->set_rules('pro_cat_id', 'Sous-catégorie', 'required', array('required'=>'Le choix d\'une %s est requis'));
                $this->form_validation->set_rules('pro_desc', 'description', 'required|regex_match[/[0-9a-zA-Zéèàêëäï,.\'\"\\-\\ ]{1,255}/]', array('required'=>'Le champ %s est requis','regex_match'=>'La description ne doit pas excéder 255 caractères.'));
                $this->form_validation->set_rules('pro_ppet', 'prix d\'achat HT', 'required|regex_match[/[0-9]{1,5}[0-9]{2}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Le prix doit être au format 1000.00'));
                $this->form_validation->set_rules('pro_spet', 'prix de vente HT', 'required|regex_match[/[0-9]{1,5}[0-9]{2}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Le prix doit être au format 1000.00'));
                $this->form_validation->set_rules('pro_phy_stk', 'stock', 'required|regex_match[/[0-9]{1,5}/]', array('required'=>'Le champ %s est requis','regex_match'=>'Le nombre doit être un entier.'));
                $this->form_validation->set_rules('pro_lock', 'verrou produit', 'required', array('required'=>'Le champ %s est requis'));
                $this->form_validation->set_rules('pro_sup_id', 'fournisseur', 'required', array('required'=>'Le choix d\'un %s est requis'));

                if($this->form_validation->run() == FALSE) // Echec de la validation, on réaffiche la vue formulaire
                {
                    $this->load->view('admin/header');
                    $this->load->view('admin/addProduct', $View);
                    $this->load->view('admin/footer');
                }
                else
                {
                    if($_FILES && $_FILES['pro_photo']['error'] === 0) // Y a-t-il eu upload de fichiers ?
                    {
                        $this->load->library('upload');
                       
                        // Récupération de l'extension du fichier uploadé
                        $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                        $data['pro_photo'] = $extension;

                        // On enregistre le nouveau produit en BDD
                        $this->load->model('produitsModel');
                        $this->produitsModel->AddProduct($data);

                        // Récupération de l'ID du produit nouvellement créé
                        $id = $this->db->insert_id();

                        // Configuration
                            // Chemin de stockage du fichier
                        $config['upload_path'] = './assets/images/products/';

                            // Nom final du fichier
                        $config['file_name'] = $id . '.' . $extension;

                            // Ecrasement si fichier du même nom existe déjà
                        $config['overwrite'] = TRUE;

                            // Types autorisés
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|JPG|PNG'; 

                            // Initialisation de la config
                        $this->upload->initialize($config);

                            // Validation du fichier
                        if (!$this->upload->do_upload('pro_photo')) 
                        {
                            // Echec
                                // Récupération des erreurs
                            $uploadErrors = $this->upload->display_errors();
                            $View['uploadErrors'] = $uploadErrors;

                                // Récupération des erreurs dans le fichier php_error.log
                            error_log($uploadErrors, 0);

                            $this->load->library('session'); 
                            $this->session->set_flashdata('uploadErrorUser','Le téléchargement de la photo a échoué. Veuiller réessayer.');

                            $this->load->view('admin/header');
                            $this->load->view('admin/addProduct', $View);
                            $this->load->view('admin/footer');
                        }
                        else
                        {
                            $View['newId'] = $id;
                            $this->load->view('admin/header');
                            $this->load->view('admin/addProductSuccess', $View);
                            $this->load->view('admin/footer');
                        }
                    }
                    else
                    {
                        // Formulaire validé, on met à jour la BDD
                        $this->load->model('produitsModel');
                        $this->produitsModel->AddProduct($data);

                        // Récupération de l'ID du produit nouvellement créé
                        $id = $this->db->insert_id();
                        $View['newId'] = $id;
                        $this->load->view('admin/header');
                        $this->load->view('admin/addProductSuccess', $View);
                        $this->load->view('admin/footer');
                    }
                }
            }
        }
    }

public function deleteProduct($id)
    {
        if(isset($this->session->userId) && $this->session->userId == 'Admin') // Verification de la présence de la variable de session userId
        {
            // Chargement des infos relative au produit spécifié en paramètre
            $this->load->model('ProduitsModel');
            $product = $this->ProduitsModel->productById($id);
            $View["product"] = $product;

            // 1er affichage de la page
            if(!$this->input->post())
            {
                // Chargement de la vue de demande de confirmation pour la suppression
                $this->load->view('admin/header');
                $this->load->view('admin/deleteProductConfirm', $View);
                $this->load->view('admin/footer');
            }
            else
            {
                $data = $this->input->post();

                $this->form_validation->set_error_delimiters('<div class="fw-bold text-danger">', '</div>');
		        $this->form_validation->set_rules('confirm', 'case', 'required|regex_match[/[ok]/]', array('required'=>'Vous devez cocher la %s pour lancer la suppression.','regex-match'=>'Merci de cocher la case.'));
            
                // Si échec de la validation, on réaffiche la vue formulaire
                if($this->form_validation->run() == FALSE) 
                {
                    $this->load->view('admin/header');
                    $this->load->view('admin/deleteProductConfirm', $View);
                    $this->load->view('admin/footer');
                }
                else
                {
                    // Sinon on efface la ligne produit en BDD
                    $this->load->model('ProduitsModel');
                    $this->ProduitsModel->DeleteProduct($data['pro_id']);

                    // Chargment de la page de succès
                    $this->load->view('admin/header');
                    $this->load->view('admin/deleteProductSuccess');
                    $this->load->view('admin/footer');
                }
            }
        }
    }
}
