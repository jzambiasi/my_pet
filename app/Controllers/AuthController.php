<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Services\UserService; // Importe a classe UserService

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
  
    public function index()
    {
        // Página de login
        return view('login');
    }

    public function register()
    {
        // Página de registro
        return view('register');
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        if ($this->userService->authenticate($email, $password)) {
            $_SESSION['loggedin'] = true;
            return redirect()->to('/dashboard');
        } else {
            $error = 'Usuário ou senha incorretos.';
            return view('login', ['error' => $error]);
        }
    }

    public function showRegistrationForm()
    {
        // Página de registro
        return view('register');
    }         

    public function createUser()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Verifique se o email já está em uso
        $existingUser = $this->userService->getUserByEmail($email);
    
        if ($existingUser !== null) {
            // O email já está em uso, retorne uma mensagem de erro
            $error = 'O email já está em uso.';
            return view('register', ['error' => $error]);
        }
    
        // Crie o novo usuário
        $result = $this->userService->createUser($email, $password);
    
        if ($result) {
            // Registro bem-sucedido, redirecione para a página de login ou outra página desejada
            return redirect()->to('/login')->with('success', 'Usuário criado com sucesso! Faça o login.');
        } else {
            // Erro ao criar o usuário, retorne uma mensagem de erro
            $error = 'Erro ao criar o usuário. Tente novamente mais tarde.';
            return view('register', ['error' => $error]);
        }
    }
    

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
