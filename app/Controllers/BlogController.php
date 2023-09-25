<?php

namespace App\Controllers;

class BlogController extends BaseController
{
    public function index()
    {
        // Aqui você pode adicionar a lógica para exibir a página inicial do blog
        // Pode carregar modelos, buscar dados do banco de dados e passá-los para a visualização

        // Exemplo de carregamento de visualização (substitua com sua lógica)
        return view('blog'); // Suponhamos que você tenha uma visualização em 'app/Views/blog/index.php'
    }

    public function viewPost($postId)
    {
        // Aqui você pode adicionar a lógica para exibir uma postagem específica do blog
        // $postId é um parâmetro da URL que permite identificar a postagem a ser exibida

        // Exemplo de carregamento de visualização (substitua com sua lógica)
        return view('blog', ['postId' => $postId]); // Suponhamos que você tenha uma visualização em 'app/Views/blog/view_post.php'
    }
}

