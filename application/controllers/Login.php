<?php

class Login extends CI_Controller {
   public function __construct() {
        parent::__construct();
        //$this->load->model('users_model'); 
        $this->load->model('session_model');
   } 

   public function index() {
        $data = array();
        $data['title'] = 'Login';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if($this->form_validation->run() === FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('login', $data);
            $this->load->view('template/footer');

        } else {

            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $user_id = $this->session_model->verify_login($email, $pass);

            if(!empty($user_id)) {

                $session_data = array(
                    'email' => $email,
                    'id' => $user_id
                );

                //$this->session->unset_userdata(array('error', 'message'));
                $this->session->set_userdata($session_data);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'E-mail e ou senha inválidos.');
                redirect(base_url('login'));
            }
       }
   }

   public function logout() {
      //$session_items = array(
      //     'email',
           //'error',
           //'message' 
      // );
      //$this->session->unset_userdata($session_items);
      $this->session->sess_destroy();
      redirect(base_url('login'));
   }
}