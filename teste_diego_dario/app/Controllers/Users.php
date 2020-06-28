<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Users extends Controller
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

		if (!$this->validate($rules)) return $this->registration();

		$user = array(
			'name' => $this->request->getVar('name'),
			'email' => $this->request->getVar('email'),
			'password' => md5($this->request->getVar('password'))
		);

		$usersModel->create($user);
		$session->setFlashdata('messageRegisterOk', 'Registered Successfully. Please, login.');
		return redirect()->to('/');
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
		}
		$user['isLoggedIn'] = TRUE;
		$user['id'] = $userRow['user_id'];
		$user['name'] = $userRow['name'];
		$session->set($user);
		return redirect()->to('/dashboard');
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

	public function forgotPassword()
	{
		$data['title'] = 'ForgotPass';
		return view('forgotpass', $data);
	}

	public function emailExists($email)
	{
		$usersModel = new UsersModel();
		$user = $usersModel->getByEmail($email);	
		return $user ? true : false;
	}

	public function resetlink()
	{
		$session = \Config\Services::session();
		$email = $this->request->getVar('email');

		$rules = [
			'email' => 'trim|required|min_length[6]|max_length[50]|valid_email',
		];

		if(!$this->validate($rules)) {
			$session->setFlashdata('loginFail', 'Incorrect please supply a valid email address.');
			return redirect()->to('/forgotpassword');
		}

		if (!$this->emailExists($email))	{
			$session->setFlashdata('loginFail', ' Incorrect email or (your e-mail is not registered).');
			return redirect()->to('/forgotpassword');
		}

		$rng = rand(1000, 9999);
		$message = "Please clik on password link below to retrieve your credentials <br>
		<a href='".base_url('reset?tokan=').$rng.">Reset Link </a>";

		$session->setFlashdata('messageRegisterOk', $message);

		$data['title'] = 'Link Reset Password';
		echo($message);
	}
}
