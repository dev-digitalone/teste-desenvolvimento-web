<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\TokenUsersModel;
use Error;

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
			'password' => md5($this->request->getVar('password')),
			'avatar' => $this->request->getVar('avatar')
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
		$encrypter = \Config\Services::encrypter();
		$tokenModel = new TokenUsersModel();
		$email = $this->request->getVar('email');

		$rules = [
			'email' => 'trim|required|min_length[6]|max_length[50]|valid_email',
		];

		if (!$this->validate($rules)) {
			$session->setFlashdata('loginFail', 'Incorrect please supply a valid email address.');
			return redirect()->to('/forgotpassword');
		}

		if (!$this->emailExists($email)) {
			$session->setFlashdata('loginFail', "Incorrect email  or (your e-mail is not registered).");
			return redirect()->to('/forgotpassword');
		}

		$token = $encrypter->encrypt(random_bytes(32));

		$user_token = [
			'email' => $email,
			'token' => $token,
		];

		$tokenModel->create($user_token);
		
		if ($this->sendEmail($user_token)) {
			$session->setFlashdata('messageRegisterOk', 'Please check your email to reset your password!');
			return redirect()->to('/forgotpassword');
		}

		$session->setFlashdata('loginFail', "Send email fail.");
		//return redirect()->to('/forgotpassword');
	}

	public function sendEmail($token)
	{
		$email = \Config\Services::email();

		$config['protocol'] = 'smtp';
		$config['SMTPHost'] = 'smtps.bol.com.br';
		$config['SMTPUser'] = 'devtest@bol.com.br';
		$config['SMTPPass'] = 'fRQSLLJcxa4@KGe';
		$config['SMTPPort'] = '587';
		$config['newline'] = "\r\n";

		$email->initialize($config);

		$message = 'Clink this link to reset your password:<a href="' 
		. base_url() . '/changepassword?email=' 
		. urlencode($token['email']) . '&token=' . urlencode($token['token']) . '>
			Reset Password
			</a>';

		$email->setFrom('devtest@bol.com.br', 'Dev CI 4 Test App');
		$email->setTo($token['email']);
		$email->setSubject('Reset Link');
		$email->setMessage($message);

		$email->send();
		echo $email->printDebugger();
	}
}
