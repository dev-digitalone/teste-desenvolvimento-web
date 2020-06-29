<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function novoUsuario()
    {

        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha")),
        );

        $this->load->model("usuario_model");
        
        if(!$this->usuario_model->verificaEmail($usuario['email'])){
            $this->usuario_model->salva($usuario);
        }else{
            $emailExistente = true;
            echo ($emailExistente);
        }
    }
}


