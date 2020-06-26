<?php 

namespace App\Models;
use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'posts_id';
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

    public function update($id, $data)
    {
        $this->update($id, $data);
    }

    public function getPostsByUser($id)
    {
        $this->asArray()->where(['author_id' => $id])->findAll();
    }

    public function destroy($id = null)
    {
        if($id != null ) $this->delete($id);
    }
}
