<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{
    public function signUp()
    {
        if(!$this->input->post())
        {
            $this->load->view('public/templates/header');
            $this->load->view('public/signup');
            $this->load->view('public/templates/footer');
        }
        else
        {
            $data = $this->input->post();

				$this->form_validation->set_error_delimiters('<div class="fw-bold text-danger text-center">', '</div>');
		        $this->form_validation->set_rules('cus_mail', 'email', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_pass', 'mot de passe', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_pass_confirm', 'confirmation mot de passe', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_firstname', 'prénom', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_lastname', 'nom', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_bil_address', 'adresse', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_bil_postalcode', 'code postal', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_bil_city', 'ville', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_type', 'statut', 'required', array('required'=>'Le champ %s n\'est pas complété.'));
                $this->form_validation->set_rules('cus_phone', 'numéro de téléphone mobile', 'required', array('required'=>'Le champ %s n\'est pas complété.'));

                if($this->form_validation->run() == FALSE) // Echec de la validation, on réaffiche la vue formulaire
                {
                    $this->load->view('public/templates/header');
                    $this->load->view('public/signup');
                    $this->load->view('public/templates/footer');
                }
        }
    }
}