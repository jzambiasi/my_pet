<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\UserService;
use CodeIgniter\Debug\Toolbar\Collectors\Log as LogCollector;

class Auth extends BaseController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        echo view('login');
    }

    public function register()
    {
        echo view('register');
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Adiciona mensagens de log para depuração
        log_message('debug', 'Email recebido: ' . $email);
        log_message('debug', 'Senha recebida: ' . $password);

        // Verifica se o email e a senha são strings válidas
        if (!is_string($email) || !is_string($password)) {
            log_message('debug', 'Dados de email ou senha inválidos.');
            return redirect()->back()->with('error', 'Dados inválidos');
        }

        if ($this->userService->authenticate($email, $password)) {
            return redirect()->to('/dashboard');
        }

        log_message('debug', 'Autenticação falhou.');
        return redirect()->back()->with('error', 'Usuário inválido');
    }

    public function createUser()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();

            $validation->setRules([
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]'
            ]);

            if ($validation->withRequest($this->request)->run()) {
                $email    = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                // Verifica se a senha é uma string válida
                if (!is_string($password)) {
                    log_message('debug', 'Senha inválida.');
                    return redirect()->back()->with('error', 'Senha inválida');
                }

                // Hash da senha
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Adiciona mensagens de log para depuração
                log_message('debug', 'Email recebido: ' . $email);
                log_message('debug', 'Senha recebida: ' . $password);

                // Falta fazer a atualização deste trecho
                if ($this->userService->createUser($email, $hashedPassword)) {
                    return redirect()->to('/dashboard');
                } else {
                    log_message('debug', 'Erro ao criar o usuário.');
                    return redirect()->back()->with('error', 'Erro ao criar o usuário.');
                }
            } else {
                log_message('debug', 'Dados do formulário não são válidos.');
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        } else {
            return redirect()->to('register');
        }
    }
}
