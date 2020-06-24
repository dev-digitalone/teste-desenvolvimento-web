<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model 
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email', 'password'];

    public function getData($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['user_id' => $id])->first();
    }

    public function insertData($data)
    {
        return $this->insert($data);
    }

    public function checkPassword($data)
    {
        return $this->where(['email' => $data['email'], 'password' => md5($data['password'])])->first();
    }
}
