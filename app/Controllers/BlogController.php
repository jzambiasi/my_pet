<?php

namespace App\Controllers;

use App\Models\PostModel;

class BlogController extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $data['posts'] = $postModel->findAll();

        return view('blog', $data);
    }

    public function viewPost($postId)
    {
        // Aqui você pode adicionar a lógica para exibir uma postagem específica do blog
        // $postId é um parâmetro da URL que permite identificar a postagem a ser exibida

        // Exemplo de carregamento de visualização (substitua com sua lógica)
        return view('blog/view_post', ['postId' => $postId]);
    }
}
