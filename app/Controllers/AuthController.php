<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    private $userService;

    public function __construct()
    {
        // Injeção de dependência será feita automaticamente pelo CodeIgniter
        $this->userService = service('user_service');
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

    public function showRegisterForm()
    {
        // Página de registro
        return view('register');
    }

    public function createUser()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();

            // Valide os dados do formulário
            if ($validation->run($this->request->getPost(), 'register')) {
                // Se a validação passar, continue com o processo de registro
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                // Chame o método createUser com os dois argumentos
                $result = $this->userService->createUser($email, $password);

                if ($result) {
                    // Registro bem-sucedido, redirecionar para a página de login com mensagem de sucesso
                    return redirect()->to('/login')->with('success', 'Usuário registrado com sucesso!');
                } else {
                    // Erro ao inserir no banco de dados, redirecionar para a página de registro com mensagem de erro
                    return redirect()->to('/register')->with('error', 'Erro ao registrar usuário.');
                }
            } else {
                // Dados do formulário não são válidos, crie uma mensagem de erro única
                $errors = implode('<br>', $validation->getErrors());

                // Redirecione para a página de registro com erros de validação
                return redirect()->to('/register')->withInput()->with('errors', $errors);
            }
        } else {
            // Se não for uma solicitação POST, redirecione para a página de registro
            return redirect()->to('/register');
        }
    }
}
