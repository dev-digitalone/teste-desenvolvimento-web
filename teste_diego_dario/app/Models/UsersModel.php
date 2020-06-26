<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model 
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email', 'password'];

    public function getUsers($id = null)
    {
        if ($id == null) return $this->findAll();
        
        return $this->asArray()->where(['user_id' => $id]);
    }

    public function create($data)
    {
        return $this->insert($data);
    }

    public function isAuthenticated($data)
    {
        return $this->where(['email' => $data['email'], 'password' => md5($data['password'])])->first();
    }
}
