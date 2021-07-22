<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function login()
    {
        if($this->input->post())
        {
            $data = $this->input->post();
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules("id", "Identifiant", "required|regex_match[/Admin/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "L'identifiant est erroné"));
            $this->form_validation->set_rules("pass", "Mot de passe", "required|regex_match[/Admin/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "L'identifiant est erroné"));

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admin/login');
            }
            else
            {
                $this->load->view('admin/home');
            }
        }
        else
        {
            $this->load->view('admin/login'); 
        }
    }

    public function home()
    {
        
    }
}