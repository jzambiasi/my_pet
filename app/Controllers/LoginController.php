<?php
namespace App\Controllers;

class AuthController extends BaseController {

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Consulte o banco de dados para obter o usuário pelo email
        $user = $this->userService->getUserByEmail($email);
    
        if ($user && password_verify($password, $user->password)) {
            // Credenciais corretas, redirecionar para a página principal
            $_SESSION['loggedin'] = true;
            return redirect()->to('/blog'); // Redirecionar para a página principal
        } else {
            // Credenciais incorretas, exibir mensagem de erro
            $erro = 'Usuário ou senha incorretos.';
            return view('login', ['erro' => $erro]);
        }
    }
    

        
    }


?>