<?php

namespace App\Controllers;

class CriarPostController extends BaseController
{
    public function index()
    {
        // Lógica para exibir a página de criação de posts
        return view('/view_post');
    }
}