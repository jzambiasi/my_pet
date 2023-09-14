<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;

class Auth extends BaseController
{

    private $_userModel;

    public function __construct()
    {
        $this->_userModel = new UserModel();
    }

    public function index()
    {
        echo view('login');
    }

    public function register()
    {
        echo view('register');
    }

    public function authenticate(){
       
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
   
        $user = $this->_userModel->getUser($email);
       
        if($user && password_verify($senha, $user->password)){
            session()->set('isLoggedIn', true);
            return redirect()->to('/dashboard');
        }else{
            session()->setFlashdata('error', 'Usuário inválido');
            return redirect()->back();
        }
    }

    public function createUser(){

        // dados do formulário via POST
        $email = $this->request->getPost('email');
        $password =  $this->request->getPost('password');
        
        $user = new User();
       
        $user->email = $email;
        $user->password = $password;
    
        if($this->_userModel->save($user)){
            session()->setFlashdata('success', 'Login criado com sucesso');
            return redirect()->to('/');
        }else{
            return redirect()->back()->withInput()->with('errors', $this->_userModel->errors()); 
        }

    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
