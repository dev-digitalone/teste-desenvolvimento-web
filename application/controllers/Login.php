<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function autenticar()
    {
        $this->load->model("usuario_model");
        $email = $this->input->post("email-login");
        $senha = md5($this->input->post("senha-login"));
        $usuario = $this->usuario_model->logarUsuario($email, $senha);


        $newdata = array(
            'nome' => $usuario['nome'],
            'id' => $usuario['id'],
        );

        $this->session->set_userdata($newdata);

        if ($usuario) {
            $this->session->set_userdata("usuario_logado", $usuario);
			$this->session->set_flashdata("success", "Logado com sucesso!");
			header("Location: /teste-desenvolvimento-web/home");
        } else {
			$this->session->set_flashdata("danger", "Usuário ou senha inválidos!");
			header("Location: /teste-desenvolvimento-web/login");
        }

    }

    public function logout() {
        $this->session->unset_userdata("usuario_logado");
        $this->session->set_flashdata("success", "Deslogado com sucesso");
        header("Location: /teste-desenvolvimento-web/login");
    }
}
