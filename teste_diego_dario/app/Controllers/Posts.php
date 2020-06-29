<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostsModel;

class Posts extends Controller
{

	public function insertPost()
	{
		$rules = [
			'title' => 'required|min_length[3]|max_length[50]',
			'description' => 'required|min_length[6]|max_length[50]',
			'img_url' => 'required|min_length[3]|max_length[50]',
		];

		$postsModel = new PostsModel();
		$session = \Config\Services::session();

		if (!$this->validate($rules)) {
			$session->setFlashdata('postFail', ' Incorrect title or message.');
			return redirect()->to('/dashboard');
		}

		$newPost = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'img_url' => $this->request->getVar('img_url'),
			'author_id' => $this->request->getVar('author_id')
		);

		$postsModel->create($newPost);

		$session->setFlashdata('messageRegisterOk', 'Posted Successfully');
		return redirect()->to('/dashboard');
	}

	public function renderPosts()
	{
		$postsModel = new PostsModel();

		$posts = $postsModel
			->select('*')
			->join('users', 'users.user_id = posts.author_id')
			->orderBy('posts.created_at', 'DESC')
			->find();

		$param = ['posts' => $posts, 'title' => 'Dashboard'];
		return view('dashboard', $param);
	}

	public function editPost($id)
	{
		$rules = [
			'title' => 'required|min_length[3]|max_length[50]',
			'description' => 'required|min_length[6]|max_length[50]',
			'img_url' => 'required|min_length[3]|max_length[50]',
		];

		$session = \Config\Services::session();
		$postsModel = new PostsModel();

		if (!$this->validate($rules)) {
			$session->setFlashdata('postFail', ' Incorrect title or message.');
			return redirect()->to('/dashboard');
		}

		$newPost = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'img_url' => $this->request->getVar('img_url'),
			'author_id' => $this->request->getVar('author_id')
		);

		$postsModel->updatePost(intval($id), $newPost);
		$session->setFlashdata('messageRegisterOk', 'Edited Successfully');
		return redirect()->to('/dashboard');
	}

	public function deletePost($id = null)
	{
		$postsModel = new PostsModel();
		$session = \Config\Services::session();

		if ($id == null) {
			$session->setFlashdata('postFail', 'Incorrect id.');
			return redirect()->to('/dashboard');
		}

		$postsModel->destroy($id);
		$session->setFlashdata('messageRegisterOk', 'Deleted Successfully');
		return redirect()->to('/dashboard');
	}
}
