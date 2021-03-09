<?php
class Panel extends CI_Controller {
    public function  __construct() {
        parent::__construct(); 

        $this->load->library('form_validation');
        
        $this->load->model('session_model');
        $this->load->model('users_model');
        $this->load->model('posts_model');

        if(!$this->session_model->verify_session()) {
            redirect(base_url('login'));            
        }
    }

    public function index() {
        $this->user_list();
    }

    public function user_list() {
        $data['users'] = $this->users_model->getUsers();
        $data['title'] = 'Gerenciar Usuários';
        $this->load->view('template/header', $data);
        $this->load->view('users_panel/user_list', $data);
        $this->load->view('template/footer');
    }

    public function user_register() {
        $data['title'] = 'Inserir um novo usuário';

        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Senha', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('users_panel/user_register', $data);
            $this->load->view('template/footer');
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
                
            $data['title'] = 'Alterar dados do usuário';

            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pass', 'Senha', 'required');

            if($this->form_validation->run() === FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('users_panel/user_edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->users_model->edit($data['id']);
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

    public function post_list() {
        $data['posts'] = $this->posts_model->getPosts();
        $data['title'] = 'Gerenciar Publicações';
        $this->load->view('template/header', $data);
        $this->load->view('posts_panel/post_list', $data);
        $this->load->view('template/footer');
    }

    public function post_create() {
        $data['title'] = 'Criar um novo post';

        $this->form_validation->set_rules('title', 'Título', 'required');
        $this->form_validation->set_rules('description', 'Descrição', 'required');
        $this->form_validation->set_rules('img_url', 'URL Imagem', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('posts_panel/post_create', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'img_url' => $this->input->post('img_url'),
                'author' => $this->session_model->get_session_id()
            ); 
            $this->posts_model->create($data);
            redirect(base_url('panel/post_list'));            
        }
    }

    
    public function post_edit($id) {
        if(!empty($id)) {

            $data = array();
            $data = $this->posts_model->getPost($id);

            $this->form_validation->set_rules('title', 'Título', 'required');
            $this->form_validation->set_rules('description', 'Descrição', 'required');
            $this->form_validation->set_rules('img_url', 'URL Imagem', 'required');

            if($this->form_validation->run() === FALSE) {
                
                $data['post_title'] = $data['title'];
                $data['title'] = 'Alterar postagem';

                $this->load->view('template/header', $data);
                $this->load->view('posts_panel/post_edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->posts_model->edit($data['id']);
                redirect(base_url('panel/post_list'));            
            }

        } else {
            redirect(base_url('panel/post_list'));            
        }
    }

    public function post_delete($id) {
        if(!empty($id)) {
            $this->posts_model->delete($id);
        }
        redirect(base_url('panel/post_list'));            
    }
}