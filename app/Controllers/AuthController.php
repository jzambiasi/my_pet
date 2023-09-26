<?php
namespace App\Controllers;

class AuthController extends BaseController {

    public function authenticate() {
        // Verifique se a solicitação é um POST
        if ($this->request->isAJAX() && $this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Validação dos campos
            if (empty($email) || empty($password)) {
                // Campos em branco, redirecionar com mensagem de erro
                return redirect()->to('login')->with('error', 'Por favor, preencha todos os campos.');
            }

            // Autenticação (exemplo simples, você deve implementar uma lógica real de autenticação)
            if ($this->authenticateUser($email, $password)) {
                // Autenticação bem-sucedida, redirecionar para a página principal
                return redirect()->to('blog');
            } else {
                // Autenticação falhou, redirecionar com mensagem de erro
                return redirect()->to('login')->with('error', 'Credenciais inválidas.');
            }
        } else {
            // Se a solicitação não for um POST, redirecionar para a página de login
            return redirect()->to('login');
        }
    }

    private function authenticateUser($email, $password) {
        // Aqui você deve implementar a lógica de autenticação real (exemplo simples)
        $validEmail = 'email';
        $hashedPassword = password_hash('password', PASSWORD_BCRYPT);

        // Verifique se o email é válido e se a senha corresponde ao hash armazenado
        return ($email === $validEmail && password_verify($password, $hashedPassword));
    }

   public function login() {
        return view('login');
    }

}

?>