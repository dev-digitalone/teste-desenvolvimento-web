<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostsModel;

class Posts extends Controller 
{
    public function index()
	{
		$data['title'] = 'Dashboard';
		return view('dashboard', $data);
    }
    
    public function inserPost()
	{
		$rules = [
			'title' => 'required|min_length[3]|max_length[50]',
			'description' => 'required|min_length[6]|max_length[50]',
			'img_url' => 'required|min_length[2]|max_length[50]'
		];

		if (!$this->validate($rules)) return $this->index();
        
		$postsModel = new PostsModel();
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');

        $newPost = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
            'img_url' => $this->request->getVar('img_url'),
            'author_id' => $user_id
		);

        $user_id != null ?
        $postsModel->create($newPost) : null;

		$session->setFlashdata('messageRegisterOk', 'Posted Successfully');

    }
}
