<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publicacao extends CI_Controller
{

    public function index()
    {
        $this->load->view('components/topo');
        $this->load->view('publicacao');
        $this->load->view('components/rodape');
    }

    public function novaPublicacao()
    {

        $publicacao = array(
            "titulo" => $this->input->post("titulo"),
            "conteudo" => $this->input->post("conteudo"),
            "idUsuario" => $this->input->post("idUsuario"),
        );

        $this->load->model("publicacao_model");
        $this->publicacao_model->salva($publicacao);
    }
}
