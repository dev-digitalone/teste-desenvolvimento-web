<?php

class Register extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('users_model');
        $this->load->model('session_model');

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

        if($this->form_validation->run('register_user') === FALSE) {
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

    public function recover($data = NULL) {

       $data = array();
       $data['title'] = "Recuperar Senha";

       if($this->form_validation->run('recover_email')) {
            $data_user = $this->users_model->isEmailRegistred($this->input->post('email'));

            if(empty($data_user)) {
                $this->session->set_flashdata('error', 'Email inválido.');
                redirect(base_url('register/recover'));
                exit;

            }

           $verification_key = md5(rand());
           $this->session_model->generate_email_key($data_user['id'], $verification_key);

           $subject = "Link";
           $message = "<h1>Recuperar Senha</h1>";
           $message .= "<p><a href='".base_url()."register/verify_mail/".$verification_key."'>Clique nesse link para escolher a sua nova senha.</a></p>";

           $this->load->library('email');
           $this->email->set_newline('\r\n');
           $this->email->from('geo.zn13@gmail.com', 'Administrador');
           $this->email->to($this->input->post('email'));
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->set_header("MIME-Version", "1.0");
           $this->email->set_header("Content-type", "text/html");
           $this->email->set_header("From", "Sistema de Publicações <geo.zn13@gmail.com>");

           if($this->email->send()) {
                $this->session->set_flashdata('message', 'Por favor verifique a caixa de entrada e spam do seu email.');
                redirect(base_url('register/recover'));

           } else {
                $this->session->set_flashdata('error', 'Erro ao enviar email');
                redirect(base_url('register/recover'));

           }
       } else {
           $this->load->view('template/header', $data);
           $this->load->view('recover', $data);
           $this->load->view('template/footer');

       }
    }

    public function verify_mail($verification_key) {

        $data = array('error' => '');

        if(isset($verification_key) && !empty($verification_key)) {

            $user_id = $this->session_model->verify_email_key($verification_key);

            if(!empty($user_id)) {
                $this->session->set_userdata(array('verification_key' => $verification_key));
                $this->set_new_pass($user_id);

            } else {
                $this->session->set_flashdata('error', 'Link de recuperação de senha inválido.');
                redirect(base_url('register/recover'));

            }

        } else {
            redirect(base_url());
        }

    }

    public function set_new_pass($user_id) {

        if(isset($user_id) && !empty($user_id)) {

            if(!empty($this->session->verification_key)) {
                $data['title'] = "Insira sua nova senha";
                $data['id'] = $user_id;

                if($this->form_validation->run('set_new_pass')) {
                    $data = array();
                    $data['password'] = $this->encryption->encrypt($this->input->post('pass'));
                    $this->users_model->edit($user_id, $data);
                    $this->session->set_flashdata('message', 'Senha alterada com sucesso');
                    redirect(base_url('login'));

                } else {
                    $this->load->view('template/header', $data);
                    $this->load->view('recover_password', $data);
                    $this->load->view('template/footer');

                }
            } else {
                redirect(base_url());

            }
        } else {
            redirect(base_url());

        }
    }
}
