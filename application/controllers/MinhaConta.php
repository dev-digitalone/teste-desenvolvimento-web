<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MinhaConta extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata("usuario_logado")) {
            $this->load->view('components/topo');
            $this->load->view('minhaConta');
            $this->load->view('components/rodape');
        } else {
            header("Location: /teste-desenvolvimento-web/login");
        }
    }

    public function editNome()
    {

        $usuario = array(
            "nome" => $this->input->post("nome"),
        );

        $id = $this->session->id;

        $this->load->model("usuario_model");
        $this->usuario_model->update($id, $usuario);

        header("Location: /teste-desenvolvimento-web/login/logout");
    }


    public function editEmail()
    {

        $usuario = array(
            "email" => $this->input->post("email"),
        );

        $id = $this->session->id;

        $this->load->model("usuario_model");


        if(!$this->usuario_model->verificaEmail($usuario['email'])){
            $this->usuario_model->update($id, $usuario);
        }else{
            $emailExistente = true;
            echo ($emailExistente);
        }
    }

    public function redefineSenha()
    {

        $usuario = array(
            "senha" => md5($this->input->post("senha")),
        );



            $id = $this->session->id;

            $this->load->model("usuario_model");
            $this->usuario_model->update($id, $usuario);

            header("Location: /teste-desenvolvimento-web/login/logout");
  
    }

    public function setFoto()
    {

        $id = $this->session->id;

        if (isset($_FILES['foto'])) {

            $extensoes = array('.jpg', '.jpeg', '.png');

            $ext = strtolower(substr($_FILES['foto']['name'], -4));
            $new_name = 'user-' . $id . $ext;
            $dir = './img/fotos-usuarios/';
            $fotoAntiga = $dir . 'user-' . $this->session->id;

            foreach ($extensoes as $extensao) {
                $fotoSub = $fotoAntiga . $extensao;

                if (file_exists($fotoSub)) {
                    unlink($fotoSub);
                }
            }

            move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name);
            echo ("Imagem enviada com sucesso!");

            $usuario = array(
                "foto" => $new_name,
            );

            $this->load->model("usuario_model");
            $this->usuario_model->update($id, $usuario);

            header("Location: /teste-desenvolvimento-web/login/logout");
        }
    }
}
