<?php
namespace App\Services;

use App\Entities\User;
use App\Models\UserModel;

class UserService
{
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }
    public function authenticate($email, $senha)
    {
        $user = $this->userModel->getUser($email);

        if ($user && password_verify($senha, $user->password)) {
            return $user; // Retorna o usuário autenticado
        } else {
            throw new \Exception('Falha na autenticação'); // Lança uma exceção em caso de falha
        }
    }

    public function createUser($email, $password)
    {
        $user = new User();

        $user->email = $email;
        $user->password = $password;

        if ($this->userModel->save($user)) {
            return true; // Retorna true em caso de sucesso
        } else {
            return false; // Retorna false em caso de falha
        }
    }
}
?>