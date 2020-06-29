<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rodape extends CI_Controller {

	public function index()
	{	
		$this->load->view('components/rodape');
	}
}
