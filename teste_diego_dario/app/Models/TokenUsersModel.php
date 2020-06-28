<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenUsersModel extends Model
{
    protected $table = 'token_users';
    protected $primaryKey = 'token_id';
    protected $allowedFields = ['email', 'token', 'created_at'];

    public function getTokens($email = null)
    {
        if ($email == null) return $this->findAll();

        return $this->asArray()->where(['email' => $email]);
    }

    public function create($token)
    {
        return $this->insert($token);
    }

}
