<?php
class Panel extends CI_Controller {
    public function  __construct() {
        parent::__construct(); 

        //$this->load->library('form_validation');

        $this->load->model('users_model');

        if(!$this->users_model->verify_session()) {
            redirect(base_url('login'));            
        }
    }

    public function index() {
        $this->user_list();
    }

    public function user_list() {
        $data['users'] = $this->users_model->getUsers();
        $data['title'] = 'Gerenciar Usuários';
        $this->load->view('panel_template/header', $data);
        $this->load->view('users_panel/user_list', $data);
        $this->load->view('panel_template/footer');
    }

    public function user_register() {
        $data['title'] = 'Inserir um novo usuário';

        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Senha', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('panel_template/header', $data);
            $this->load->view('users_panel/user_register', $data);
            $this->load->view('panel_template/footer');
        } else {
            $encrypted_password = $this->encryption->encrypt($this->input->post('pass'));
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $encrypted_password
            ); 
            $this->users_model->register($data);
            redirect(base_url('panel'));            
        }
    }

    public function user_edit($id) {
        if(!empty($id)) {

            $data = array();
            $data = $this->users_model->getUser($id);
                
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Alterar dados do usuário';

            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pass', 'Senha', 'required');

            if($this->form_validation->run() === FALSE) {
                $this->load->view('panel_template/header', $data);
                $this->load->view('users_panel/user_edit', $data);
                $this->load->view('panel_template/footer');
            } else {
                $this->users_model->edit($id);
                redirect(base_url('panel'));            
            }

        } else {
            redirect(base_url('panel'));            
        }
    }

    public function user_delete($id) {
        if(!empty($id)) {
            $this->users_model->delete($id);
        }
        redirect(base_url('panel'));            
    }
}