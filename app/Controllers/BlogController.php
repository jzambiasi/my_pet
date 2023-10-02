<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class BlogController extends Controller
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
    
            // Validação dos campos (você pode adicionar validações personalizadas aqui)
            $validation = \Config\Services::validation();
            $validation->setRules([
                'title' => 'required',
                'content' => 'required',
            ]);
    
            if (!$validation->withRequest($this->request)->run()) {
                // Redireciona de volta ao formulário com erros de validação
                return redirect()->back()->withInput()->with('error', $validation->getErrors());
            }
    
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
        return $this->showCreatePostForm();
    }
    

    public function showCreatePostForm()
    {
        // Carregue a lista de categorias (substitua com a lógica real)
        $categorias = [
            ['id' => 1, 'nome' => 'Categoria 1'],
            ['id' => 2, 'nome' => 'Categoria 2'],
            // Adicione mais categorias conforme necessário
        ];

        // Corrija o nome do arquivo de visualização para 'createpost.php'
        return view('createpost', [
            'categorias' => $categorias, // Passando a lista de categorias para a view
        ]);
    }
}
