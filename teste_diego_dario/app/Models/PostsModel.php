<?php

namespace App\Models;

use CodeIgniter\Model;
use Error;

class PostsModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $allowedFields = ['title', 'description', 'img_url', 'created_at', 'author_id'];
  
    public function getPosts($id = null)
    {
        if ($id == null) return $this->findAll();

        return $this->asArray()->where(['posts_id' => $id]);
    }

    public function create($data)
    {
        return $this->insert($data);
    }

    public function updatePost($id = null, $data = null)
    {
        if ($id != null && $data != null) return $this->update($id, $data);
    }

    public function getPostById($id)
    {
        return $this->asArray()->where(['post_id' => $id])->first();
        
    }
    public function getPostsByUser($id)
    {
        return $this->asArray()->where(['author_id' => $id])->findAll();
    }

    public function destroy($id)
    {
        return $this->delete($id);
    }
   
}
