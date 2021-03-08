<?php

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('users_model');
    }

    public function index() {
        $data = array(
            'title' => 'Registrar'
        );
        $this->load->view('template/header', $data);
        $this->load->view('register', $data);
        $this->load->view('template/footer');
    }

    public function validation() {
        $data = array();

        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Senha', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $encrypted_password = $this->encryption->encrypt($this->input->post('password'));
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $encrypted_password,
            );
            $id = $this->users_model->register($data);
            redirect(base_url());            
        }
    }
}