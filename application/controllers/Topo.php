<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topo extends CI_Controller {

	public function index()
	{	
		$this->load->view('components/topo');
	}
}
