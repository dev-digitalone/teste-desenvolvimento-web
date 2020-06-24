<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;


class Home extends BaseController
{
	public function index()
	{
		return view('login');
	}

	public function registration()
	{
		echo view('common/headerRegister');
		echo view('formRegister');
		echo view('common/footer');
	}

	public function insertData()
	{
		$rules = [
			'name' => 'required|min_length[3]|max_length[50]',
			'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users_email]',
			'password' => 'required|min_length[6]|max_length[60]'
		];

		$users_model = new UsersModel();
		
		if ($this->validate($rules)) {
			$data = array(
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'password' => md5($this->request->getVar('password'))
			);
			$users_model->insertData($data);
			$this->session->setFlashdata('messageRegisterOk', 'Registered Successfully. Please, login.');
			return redirect()->to('/');
		}
		else {
			return $this->registration();
		}
	}

}
