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
            "nomeUsuario" => $this->session->nome,
            "idUsuario" => $this->session->id,
        );

        $this->load->model("publicacao_model");
        $this->publicacao_model->salva($publicacao);
    }

    public function setFoto(){

        $id = $this->input->post("id");

        if (isset($_FILES['foto'])) {
            
            $extensoes = array('.jpg', '.jpeg', '.png');

            $ext = strtolower(substr($_FILES['foto']['name'], -4));
            $new_name = 'anexo-'.$id . $ext;
            $dir = './img/anexos-pub/';
            $fotoAntiga = $dir.'anexo-'.$id;

            foreach($extensoes as $extensao){
                $fotoSub = $fotoAntiga.$extensao;

                if(file_exists($fotoSub)){
                    unlink($fotoSub);
                }
            }

            move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name);
            echo ("Imagem enviada com sucesso!");

            $publicacao = array(
                "fotoAnexo" => $new_name,
            );

            $this->load->model("publicacao_model");
            $this->publicacao_model->update($id, $publicacao);        
        }
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

    public function deletar()
    {
        $id = $this->input->post("id");

        $extensoes = array('.jpg', '.jpeg', '.png');
      
        $anexo = './img/anexos-pub/anexo-'.$id;


        foreach($extensoes as $extensao){
            $fotoDel = $anexo.$extensao;

            if(file_exists($fotoDel)){
                unlink($fotoDel);
            }
        }

        $this->load->model("publicacao_model");
        $this->publicacao_model->deletar_publicacao($id);
        header("Location: /teste-desenvolvimento-web/minhasPublicacoes");
    }

    public function pesquisar(){

        $pesquisa = $this->input->post("pesquisa");

        $this->load->model("publicacao_model");
        $publicacoes = $this->publicacao_model->pesquisarPublicacao($pesquisa);

        $dadosPublicacoes = array("publicacoes" => $publicacoes);

        if ($this->session->userdata("usuario_logado")){
			$this->load->view('components/topo');
			$this->load->view('publicacoesFiltradas', $dadosPublicacoes);
			$this->load->view('components/rodape');
			}else {
				header("Location: /teste-desenvolvimento-web/login");
			}
    }
}
