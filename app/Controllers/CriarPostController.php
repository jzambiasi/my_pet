<?php

namespace App\Controllers;

class CriarPostController extends BaseController
{
    public function index()
    {
        // Lógica para exibir a página de criação de posts
        return view('criarpost'); // Suponhamos que você tenha uma visualização em 'app/Views/criarpost/index.php'
    }
}