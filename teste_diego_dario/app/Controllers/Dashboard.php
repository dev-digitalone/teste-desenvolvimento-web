<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;


class Dashboard extends BaseController
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		return view('home', $data);
	}

	public function registration()
	{
		$data['title'] = 'Registration';
		return view('register', $data);
	}

	public function contact()
	{
		$data['title'] = 'Contato';
		return view('contact', $data);
	}

	public function dashboard()
	{
		$data['title'] = 'Dashboard';
		return view('dashboard', $data);
	}

	public function insertUser()
	{
		$rules = [
			'name' => 'required|min_length[3]|max_length[50]',
			'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
			'password' => 'required|min_length[6]|max_length[60]'
		];

		$usersModel = new UsersModel();
		$session = \Config\Services::session();

		if ($this->validate($rules)) {
			$user = array(
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'password' => md5($this->request->getVar('password'))
			);

			$usersModel->create($user);
			$session->setFlashdata('messageRegisterOk', 'Registered Successfully. Please, login.');

			return redirect()->to('/');
		} else {
			return $this->registration();
		}
	}

	public function loginUser()
	{

		$rules = [
			'email' => 'required|min_length[6]|max_length[50]|valid_email',
			'password' => 'required|min_length[5]|max_length[60]',
		];

		$usersModel = new UsersModel();
		$session = \Config\Services::session();

		if (!$this->validate($rules)) return $this->index();

		$user = array(
			'id' => '',
			'email' => $this->request->getVar('email'),
			'password' => $this->request->getVar('password'),
			'name' => '',
			'isLoggedIn' => FALSE
		);
		if (!($userRow = $usersModel->isAuthenticated($user))) {
			$session->setFlashdata('loginFail', ' Incorrect username (your e-mail) or password.');
			return redirect()->to('/');
		} else {
			//$orders_model = new OrdersModel();
			$user['isLoggedIn'] = TRUE;
			$user['id'] = $userRow['user_id'];
			$user['name'] = $userRow['name'];
			//$data['orders'] = $orders_model->getOrdersbyCustomer($data['id']);
			$session->set($user);
			return redirect()->to('/dashboard');
		}
	}

	public function logout()
	{
		$session = \Config\Services::session();
		
		$data['isLoggedIn'] = FALSE;
		$data['name'] = "";
		$data['email'] = "";
		$data['password'] = "";
		$session->set($data);
		$session->destroy();
		return redirect()->to('/');
	}
}
