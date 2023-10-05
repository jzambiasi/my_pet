<?php

namespace App\Controllers;

use App\Models\PostModel; // Importe o modelo aqui

class CriatePostController extends BaseController
{
    public function index()
    {
        // Lógica para exibir a página de criação de posts
        return view('createpost'); 
    }

    public function metodoCreatePost()
    {
        if ($this->request->getMethod() === 'post') {
            // Recupere os dados do formulário
            $titulo = $this->request->getPost('titulo');
            $conteudo = $this->request->getPost('conteudo');

            // Valide o campo 'title'
            if (empty($titulo)) {
                // Redirecione de volta ao formulário com uma mensagem de erro
                return redirect()->back()->withInput()->with('error', 'O campo de título não pode estar vazio.');
            }

            // Crie uma instância do modelo PostModel
            $postModel = new PostModel();

            // Faça a lógica de inserção no banco de dados usando o modelo PostModel
            $data = [
                'title' => $titulo,
                'content' => $conteudo,
            ];
            $postModel->createPost($data);

            // Redirecione para alguma página de sucesso ou exiba uma mensagem de sucesso
            return redirect()->to('createpost')->with('success', 'Postagem criada com sucesso.');
        }

        // Se a solicitação não for POST, redirecione para a página de criação de posts
        return view('/createpost'); // Corrija o nome da view aqui
    }
}
