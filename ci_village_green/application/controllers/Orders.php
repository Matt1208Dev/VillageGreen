<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
    public function OrderList()
    { 
        if (isset($this->session->com_username))
        {
            // $_POST ne contient pas de valeurs
            if(!$this->input->post())
            {
                $this->load->view('Admin/header');
                $this->load->view('Admin/OrderSearchForm');
                $this->load->view('Admin/footer');
            }
            else
            {
                $this->form_validation->set_error_delimiters('<div class="fw-bold text-danger">', '</div>');
                $this->form_validation->set_rules("cus_id", "ID client", "integer", array("integer" => "L' %s ne doit contenir que des nombres entiers."));
                $this->form_validation->set_rules("ord_id", "N° de commande client", "integer", array("integer" => "Le %s ne doit contenir que des nombres entiers."));
                $this->form_validation->set_rules("cus_lastname", "Nom", "regex_match[/[a-zA-ZÀ-ÖÙ-öù-ü]{1,50}/]", array("regex_match" => "Le %s ne doit contenir que des caractères alphabétique."));
                $this->form_validation->set_rules("cus_firstname", "Prénom", "regex_match[/[a-zA-ZÀ-ÖÙ-öù-ü]{1,30}/]", array("regex_match" => "Le %s ne doit contenir que des caractères alphabétique."));

                if ($this->form_validation->run() == FALSE) // Echec de la validation, on réaffiche la vue formulaire
                {
                    $this->load->view('Admin/header');
                    $this->load->view('Admin/OrderSearchForm');
                    $this->load->view('Admin/footer');
                }
                else
                {
                    // Récupération du contenu des variables de $_POST si elles existent
                    // Si un numéro de commande est renseigné, on récupère sa valeur et on appelle la fonction OrderById()
                    if($this->input->post('ord_id') && $this->input->post('cus_id') !== NULL)
                    {
                        $id = $this->input->post('ord_id');

                        $this->load->model('OrdersModel');
                        $query = $this->OrdersModel->OrderById($id);

                        $aView["list"] = $query;

                        $this->load->view('Admin/header');
                        $this->load->view('Admin/OrderSearchForm', $aView);
                        $this->load->view('Admin/OrderList', $aView);
                        $this->load->view('Admin/footer');
                    }
                    // Si un numéro de client est renseigné, on récupère sa valeur et on appelle la fonction OrderByCustomerId()
                    else if($this->input->post('cus_id') && $this->input->post('cus_id') !== NULL)
                    {
                        $id = $this->input->post('cus_id');

                        $this->load->model('OrdersModel');
                        $query = $this->OrdersModel->OrderByCustomerId($id);

                        $aView["list"] = $query;

                        $this->load->view('Admin/header');
                        $this->load->view('Admin/OrderSearchForm', $aView);
                        $this->load->view('Admin/OrderList', $aView);
                        $this->load->view('Admin/footer');
                    }
                    // Si un nom COMPLET est renseigné, on récupère les valeur et on appelle la fonction OrderByFullName()
                    else if(($this->input->post('cus_lastname') && $this->input->post('cus_lastname') !== NULL) && ($this->input->post('cus_firstname') && $this->input->post('cus_firstname') !== NULL))
                    {
                        $cus_lastname = $this->input->post('cus_lastname');
                        $cus_firstname = $this->input->post('cus_firstname');

                        $this->load->model('OrdersModel');
                        $query = $this->OrdersModel->OrderByFullName($cus_lastname, $cus_firstname);

                        $aView["list"] = $query;

                        $this->load->view('Admin/header');
                        $this->load->view('Admin/OrderSearchForm', $aView);
                        $this->load->view('Admin/OrderList', $aView);
                        $this->load->view('Admin/footer');
                    }
                    // Si un nom de famille est renseigné, on récupère sa valeur et on appelle la fonction OrderByCustomerName()
                    else if($this->input->post('cus_lastname') && $this->input->post('cus_lastname') !== NULL)
                    {
                        $cus_lastname = $this->input->post('cus_lastname');

                        $this->load->model('OrdersModel');
                        $query = $this->OrdersModel->OrderByCustomerName($cus_lastname);

                        $aView["list"] = $query;

                        $this->load->view('Admin/header');
                        $this->load->view('Admin/OrderSearchForm', $aView);
                        $this->load->view('Admin/OrderList', $aView);
                        $this->load->view('Admin/footer');
                    }
                    // Si un prénom est renseigné, on récupère sa valeur et on appelle la fonction OrderByCustomerFirstname()
                    else if($this->input->post('cus_firstname') && $this->input->post('cus_firstname') !== NULL)
                    {
                        $cus_firstname = $this->input->post('cus_firstname');

                        $this->load->model('OrdersModel');
                        $query = $this->OrdersModel->OrderByCustomerFirstName($cus_firstname);

                        $aView["list"] = $query;

                        $this->load->view('Admin/header');
                        $this->load->view('Admin/OrderSearchForm', $aView);
                        $this->load->view('Admin/OrderList', $aView);
                        $this->load->view('Admin/footer');
                    }
                    else if($this->input->post('ord_id') === '' && $this->input->post('cus_id') === '' && $this->input->post('cus_firstname') === '' && $this->input->post('cus_lastname') === '')
                    {
                        $this->load->view('Admin/header');
                        $this->load->view('Admin/OrderSearchForm');
                        $this->load->view('Admin/footer');
                    }
                }
            }
            
        }
        else
        {
            $this->load->view('admin/login');
        }
    }

    public function RunningOrder()
    { 
        if (isset($this->session->com_username))
        {
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->RunningOrder();

            $aView["list"] = $query;

            if($this->db->affected_rows() != 0)
            {
                $this->load->view('Admin/header');
                $this->load->view('Admin/OrderSearchForm', $aView);
                $this->load->view('Admin/OrderList', $aView);
                $this->load->view('Admin/footer');
            }
            else
            {
                $this->load->view('Admin/header');
                $this->load->view('Admin/OrderSearchForm');
                $this->load->view('Admin/footer');
            }
        }
        else
        {
            $this->load->view('admin/login');
        }
    }

    public function AllOrders()
    { 
        if (isset($this->session->com_username))
        {
            // On charge toutes les commandes
            $this->load->model('OrdersModel');
            $query = $this->OrdersModel->AllOrders();

            $aView["list"] = $query;

            $this->load->view('Admin/header');
            $this->load->view('Admin/OrderSearchForm');
            $this->load->view('Admin/OrderList', $aView);
            $this->load->view('Admin/footer');
        }
    }

    public function OrderByMonthInterval($nb)
    { 
        if (isset($this->session->com_username))
        {
            $nb = $this->security->xss_clean($nb);
            if(!is_numeric($nb))
            {
                $this->load->view('Admin/header');
                $this->load->view('Admin/OrderSearchForm');
                $this->load->view('Admin/footer');
            }
            else
            {
                $this->load->model('OrdersModel');
                $query = $this->OrdersModel->OrderByMonthInterval($nb);

                $aView["list"] = $query;

                if($this->db->affected_rows() != 0)
                {
                    $this->load->view('Admin/header');
                    $this->load->view('Admin/OrderSearchForm', $aView);
                    $this->load->view('Admin/OrderList', $aView);
                    $this->load->view('Admin/footer');
                }
                else
                {
                    $this->load->view('Admin/header');
                    $this->load->view('Admin/OrderSearchForm');
                    $this->load->view('Admin/footer');
                }
            }
        }
        else
        {
            $this->load->view('admin/login');
        }
    }

    public function OrderByDayInterval($nb)
    { 
        if (isset($this->session->com_username))
        {
            $nb = $this->security->xss_clean($nb);
            if(!is_numeric($nb))
            {
                $this->load->view('Admin/header');
                $this->load->view('Admin/OrderSearchForm');
                $this->load->view('Admin/footer');
            }
            else
            {
                $this->load->model('OrdersModel');
                $query = $this->OrdersModel->OrderByDayInterval($nb);

                $aView["list"] = $query;
                
                if($this->db->affected_rows() != 0)
                {
                    $this->load->view('Admin/header');
                    $this->load->view('Admin/OrderSearchForm', $aView);
                    $this->load->view('Admin/OrderList', $aView);
                    $this->load->view('Admin/footer');
                }
                else
                {
                    $this->load->view('Admin/header');
                    $this->load->view('Admin/OrderSearchForm');
                    $this->load->view('Admin/footer');
                }
            }
        }
        else
        {
            $this->load->view('admin/login');
        } 
    }

    public function orderDetails($id)
    { 
        if (isset($this->session->com_username))
        {
            $id = $this->security->xss_clean($id);
            if(!is_numeric($id))
            {
                $this->load->view('Admin/header');
                $this->load->view('Admin/OrderSearchForm');
                $this->load->view('Admin/footer');
            }
            else
            {
                $this->load->model('OrdersModel');
                $query = $this->OrdersModel->OrderDetails($id);
                $order_status = $this->OrdersModel->getOrderStatus($id);

                $aView["order"] = $query;
                $aView["order_status"] = $order_status;


                $this->load->view('Admin/header');
                $this->load->view('Admin/OrderSearchForm', $aView);
                $this->load->view('Admin/orderDetails', $aView);
                $this->load->view('Admin/footer');
            }
        }
        else
        {
            $this->load->view('admin/login');
        }
    }
}