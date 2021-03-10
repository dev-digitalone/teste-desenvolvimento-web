<?php
class Panel extends CI_Controller {

    public function  __construct() {

        parent::__construct(); 

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

        if($this->form_validation->run('register_user') === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('users_panel/user_register', $data);
            $this->load->view('template/footer');

        } else {
            $encrypted_password = $this->encryption->encrypt($this->input->post('password'));
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

        if(!empty($id) && !empty($this->users_model->getUser($id))) {

            $data = array();

            //preenchendo os dados do usuário para os values  do formulário
            $data = $this->users_model->getUser($id);

            if($this->form_validation->run('edit_user') === FALSE) {
                $data['title'] = 'Alterar dados do usuário';
                $this->load->view('template/header', $data);
                $this->load->view('users_panel/user_edit', $data);
                $this->load->view('template/footer');

            } else {
        
                //preciso do array $first_data que contém os dados originais do usuário para saber
                //se devo criptografar a senha
                $first_data = $data;

                $data = array(
                       'name' => $this->input->post('name'),
                       'email' => $this->input->post('email')
                ); 

                //só encriptar se for uma senha diferente, pra não encriptar duas vezes
                $password = $this->input->post('password');
                if($password != $first_data['password']) {
                    $data['password'] = $this->encryption->encrypt($password);
                }

                $data['id'] = $id;
                $this->users_model->edit($data);
                redirect(base_url('panel'));            

            }
        } else {
            redirect(base_url('panel'));            

        }
    }

    public function user_delete($id) {

        if(!empty($id) && $id != $this->session->id) {
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

        if($this->form_validation->run('post') === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('posts_panel/post_create', $data);
            $this->load->view('template/footer');
        } else {
            
            //validando url da imagem
            $image_url = $this->input->post('img_url');
            if (getimagesize($image_url)) {
                $image_url = urlencode($image_url);
            } else {
                $this->session->set_flashdata('error', 'URL inválida.');
                redirect(base_url('panel/post_create'));
                exit;
            }

            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'img_url' => $image_url,
                'author' => $this->session_model->get_session_id()
            ); 
            $this->posts_model->create($data);
            redirect(base_url('panel/post_list'));            
        }
    }
    
    public function post_edit($id) {

        if(!empty($id) && !empty($this->posts_model->getPost($id))) {
            $data = array();
            $data = $this->posts_model->getPost($id);

            if($this->form_validation->run('post') === FALSE) {
                //conflito com o valor title retornado da tabela Posts
                $data['post_title'] = $data['title'];
                $data['title'] = 'Alterar postagem';

                $this->load->view('template/header', $data);
                $this->load->view('posts_panel/post_edit', $data);
                $this->load->view('template/footer');

            } else {
                //validando url da imagem
                $image_url = $this->input->post('img_url');
                if (getimagesize($image_url)) {
                    $image_url = urlencode($image_url);
                } else {
                    $this->session->set_flashdata('error', 'URL inválida.');
                    redirect(base_url('panel/post_edit/'.$id));
                    exit;
                }
                $data['img_url'] = $image_url;

                $this->posts_model->edit($id);
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