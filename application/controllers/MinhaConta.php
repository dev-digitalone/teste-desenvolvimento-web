<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MinhaConta extends CI_Controller {

	public function index()
	{	
		if ($this->session->userdata("usuario_logado")){
			$this->load->view('components/topo');
			$this->load->view('minhaConta');
			$this->load->view('components/rodape');
			}else {
				header("Location: /teste-desenvolvimento-web/login");
			} 
    }
    
    public function editUsuario(){

        $usuario = array(
            "senha" => $this->input->post("senha"),
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
        );

        $id = $this->input->post("id");

        $this->load->model("usuario_model");
        $this->usuario_model->update($id, $usuario);

        header("Location: /teste-desenvolvimento-web/login/logout");

    }

    public function redefineSenha(){

        $usuario = array(
            "senha" => md5($this->input->post("senha")),
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
        );

        $id = $this->input->post("id");

        $this->load->model("usuario_model");
        $this->usuario_model->update($id, $usuario);

        header("Location: /teste-desenvolvimento-web/login/logout");

    }

    public function setFoto(){

        $id = $this->input->post("id");

        if (isset($_FILES['foto'])) {
            $ext = strtolower(substr($_FILES['foto']['name'], -4));
            $new_name = 'user-'.$id . $ext;
            $dir = './img/fotos-usuarios/';
            $fotoAntiga = $dir.$new_name;

            if(file_exists($fotoAntiga)){
                unlink($fotoAntiga);
            }

            
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name);
            echo ("Imagem enviada com sucesso!");

            header("Location: /teste-desenvolvimento-web/minhaConta");
            
        }
    }
}
