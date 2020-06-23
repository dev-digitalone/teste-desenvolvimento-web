<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$this->load->view('components/topo');
		$this->load->view('home');
		$this->load->view('components/rodape');
	}
}
