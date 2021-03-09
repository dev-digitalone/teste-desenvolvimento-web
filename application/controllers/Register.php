<?php

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
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

        //regras de validação dos campos input
        $rules_config = array(
            array(
                    'field' => 'name',
                    'label' => 'Nome',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'Você deve digitar um  %s.',
                    ),
            ),
            array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => array('required', 'valid_email', 'is_unique[Users.email]'),
                    'errors' => array(
                            'required' => 'Você deve digitar um  %s.',
                            'valid_email' => 'O email deve ser válido.',
                            'is_unique' => 'O email digitado já está cadastrado.'
                    ),
            ),
            array(
                    'field' => 'password',
                    'label' => 'Senha',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'Você deve digitar uma %s.',
                    ),
            ),
            array(
                    'field' => 'passconf',
                    'label' => 'Confirme sua senha',
                    'rules' => array('required','matches[password]'),
                    'errors' => array(
                            'required' => 'Você deve confirmar a senha.',
                            'matches' => 'A senha está incorreta.',
                    ),
            ),
        );

        $this->form_validation->set_rules($rules_config);

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

    public function recover($data = NULL) {
       $data = array();
       $data['title'] = "Recuperar Senha";
       $this->form_validation->set_rules('email', 'Email', 'required');

       if($this->form_validation->run()) {
            $data_user = $this->users_model->isEmailRegistred($this->input->post('email'));

            if(empty($data_user)) {
                $this->session->set_flashdata('error', 'Email inválido.');
                redirect(base_url('register/recover'));
                exit;
            }

           $verification_key = md5(rand());
           $this->session_model->generate_email_key($data_user['id'], $verification_key);

           $subject = "Recuperação de senha";
           $message = "<h1>Recuperar Senha</h1>";
           $message .= "<p><a href='".base_url()."register/verify_mail/".$verification_key."'>Clique nesse link para escolher a sua nova senha.</a></p>";
           $config = array(
               'protocol' => 'mail',
               //'smtp_host' => 'localhost',
               //'smtp_port' => 25,
               //'smtp_user' => 'xxxxxx',
               //'smtp_pass' => 'xxxxxx',
               'mailtype' => 'html',
               'charset' => 'iso-8859-1',
               'wordwrap' => TRUE
           );
           //$this->load->library('email', $config);
           $this->load->library('email');
           $this->email->set_newline('\r\n');
           $this->email->from('geovane7881@yahoo.com');
           $this->email->to($this->input->post('email'));
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->set_header("MIME-Version:", "1.0");
           $this->email->set_header("Content-type:", "text/html");
           $this->email->set_header("From:", "Website <admin@example.com>");

           if($this->email->send()) {
                $this->session->set_flashdata('message', 'Por favor verifique a caixa de entrada do seu email.');
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
        //if($this->uri->segment(3))  {
        //    $verification_key = $this->uri->segment(3);
        if(isset($verification_key) && !empty($verification_key)) {
            $user_id = $this->session_model->verify_email_key($verification_key);
            if(!empty($user_id)) {
                //$data['message'] = '<h1 align="center">sucesso</h1>';
                //pagina de configurar nova senha
                $this->session->unset_userdata(array('error', 'message'));
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
                $this->form_validation->set_rules('pass', 'Senha', 'required');

                if($this->form_validation->run()) {
                    $data = array();
                    $data['password'] = $this->encryption->encrypt($this->input->post('pass'));
                    $this->users_model->edit($user_id, $data);
                    //$this->session->unset_userdata('error');
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
