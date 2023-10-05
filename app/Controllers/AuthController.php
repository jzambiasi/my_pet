<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Services\UserService;
use CodeIgniter\HTTP\RequestInterface;

class AuthController extends Controller
{
    protected $userService;
    protected $request;

    public function __construct()
    {
        // Obtenha as dependências usando o Service Container
        $this->userService = service('userService');
        $this->request = service(RequestInterface::class);
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
            return redirect()->to('/blog');
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
        $postData = $this->request->getPost();

        if ($this->userService->createUser($postData)) {
            return redirect('/');
        }

        // Se o método errors() existir na classe UserService
        // você pode usá-lo para obter os erros
        $errors = method_exists($this->userService, 'errors') ? $this->userService->errors() : [];

        return redirect()->back()->withInput()->with('errors', $errors);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
