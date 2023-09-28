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

    public function createPost()
{
    // Verifica se o formulário foi submetido via POST
    if ($this->request->getMethod() === 'post') {
        // Recupera os dados do formulário
        $postData = $this->request->getPost();

        // Verifica se 'title' está presente no array $postData
        if (!isset($postData['title'])) {
            return redirect()->back()->withInput()->with('error', 'O campo "title" é obrigatório.');
        }

        // Validação dos campos (você pode adicionar validações personalizadas aqui)

        // Cria um novo registro de postagem
        $postModel = new PostModel();
        $result = $postModel->createPost([
            'title' => $postData['title'],
            'content' => $postData['content'],
        ]);

        if ($result) {
            // Redireciona ou exibe uma mensagem de sucesso
            return redirect()->to('/blog')->with('success', 'Postagem criada com sucesso.');
        } else {
            // Exibe uma mensagem de erro
            return redirect()->back()->withInput()->with('error', 'Erro ao criar a postagem.');
        }
    }

    // Se não for um POST, você pode exibir o formulário de criação de postagem
    return view('blog/create_post');
}
}
