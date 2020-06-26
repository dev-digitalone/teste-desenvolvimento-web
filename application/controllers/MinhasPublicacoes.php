<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MinhasPublicacoes extends CI_Controller
{

    public function index()
    {
        $this->load->model("publicacao_model");
        $publicacoes = $this->publicacao_model->buscarTodasPorUsuario($this->session->id);
        $dadosPublicacoes = array("publicacoes" => $publicacoes);

        if ($this->session->userdata("usuario_logado")) {
            $this->load->view('components/topo');
            $this->load->view('minhasPublicacoes', $dadosPublicacoes);
            $this->load->view('components/rodape');
        } else {
            header("Location: /teste-desenvolvimento-web/login");
        }
    }

    public function editar()
    {

        $id = $this->input->post('id');

        $this->load->model("publicacao_model");
        $publicacao = $this->publicacao_model->buscarPorId($id);
        $dadosPublicacao = array("publicacao" => $publicacao);

        $this->load->view('components/topo');
        $this->load->view('editarPublicacao', $dadosPublicacao);
        $this->load->view('components/rodape');
    }
}
