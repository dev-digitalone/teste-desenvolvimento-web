<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publicacao extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata("usuario_logado")) {
            $this->load->view('components/topo');
            $this->load->view('publicacao');
            $this->load->view('components/rodape');
        } else {
            header("Location: /teste-desenvolvimento-web/login");
        }
    }

    public function novaPublicacao()
    {

        $publicacao = array(
            "titulo" => $this->input->post("titulo"),
            "conteudo" => $this->input->post("conteudo"),
            "nomeUsuario" => $this->input->post("nomeUsuario"),
            "idUsuario" => $this->input->post("idUsuario"),
        );

        $this->load->model("publicacao_model");
        $this->publicacao_model->salva($publicacao);
    }

    public function editPublicacao(){

        $publicacao = array(
            "titulo" => $this->input->post("titulo"),
            "conteudo" => $this->input->post("conteudo"),
            "editado" => $this->input->post("editado"),
        );

        $id = $this->input->post("id");

        $this->load->model("publicacao_model");
        $this->publicacao_model->update($id, $publicacao);

    }
}
