<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $allowedFields    = ['email', 'senha'];
    protected $returnType = User::class;


    public function getUser($email){
      
        return $this->where('email', $email)->first();
    }
}
