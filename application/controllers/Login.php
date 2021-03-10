<?php

class Login extends CI_Controller {
   public function __construct() {

        parent::__construct();

        $this->load->model('session_model');

   } 

   public function index() {

        $data = array();
        $data['title'] = 'Login';

        if($this->form_validation->run('login') === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('login', $data);
            $this->load->view('template/footer');

        } else {
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $user_id = $this->session_model->verify_login($email, $pass);

            //faz login
            if(!empty($user_id)) {
                $this->session_model->login(array('email' => $email, 'id' => $user_id));
                redirect(base_url('panel'));

            } else {
                $this->session->set_flashdata('error', 'E-mail e ou senha inválidos.');
                redirect(base_url('login'));

            }
       }
   }

   public function logout() {
      $this->session->sess_destroy();
      redirect(base_url('login'));
   }
}