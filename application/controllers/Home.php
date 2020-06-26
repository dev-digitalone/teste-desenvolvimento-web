<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$this->load->model("publicacao_model");
		$publicacoes = $this->publicacao_model->buscarTodas();
		$dadosPublicacoes = array("publicacoes" => $publicacoes);

		if ($this->session->userdata("usuario_logado")){
			$this->load->view('components/topo');
			$this->load->view('home', $dadosPublicacoes);
			$this->load->view('components/rodape');
			}else {
				header("Location: /teste-desenvolvimento-web/login");
			} 

	}
}
