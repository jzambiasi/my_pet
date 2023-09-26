<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\UserService;

class Auth extends BaseController
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
        return view('blog');
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

        // Verificar autenticação
        if ($this->userService->authenticate($email, $password)) {
            // Autenticado com sucesso, redirecionar para a área restrita
            return redirect()->to('/dashboard');
        } else {
            // Falha na autenticação, redirecionar de volta ao login com mensagem de erro
            return redirect()->to('/login')->with('error', 'Usuário inválido');
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
                $errors = [];
                foreach ($validation->getErrors() as $field => $error) {
                    $errors[] = $error;
                }
                $error_message = implode('<br>', $errors);

                // Redirecione para a página de registro com erros de validação
                return redirect()->to('/register')->withInput()->with('errors', $error_message);
            }
        } else {
            // Se não for uma solicitação POST, redirecione para a página de registro
            return redirect()->to('/register');
        }
    }
}
