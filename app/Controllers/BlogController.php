<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class BlogController extends Controller
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $data['posts'] = $this->postModel->findAll();

        return view('blog', $data);
    }

    public function createPost()
    {
        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getPost();
    
            $validation = \Config\Services::validation();
            $validation->setRules([
                'title' => 'required',
                'content' => 'required',
            ]);
    
            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('error', $validation->getErrors());
            }
    
            $result = $this->postModel->createPost([
                'title' => $postData['title'],
                'content' => $postData['content'],
            ]);
    
            if ($result) {
                return redirect()->to('/blog')->with('success', 'Postagem criada com sucesso.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Erro ao criar a postagem.');
            }
        }
    
        return $this->showCreatePostForm();
    }
    

    public function showCreatePostForm()
    {
        $categorias = [
            ['id' => 1, 'nome' => 'Categoria 1'],
            ['id' => 2, 'nome' => 'Categoria 2'],
            // Adicione mais categorias conforme necessário
        ];

        return view('createpost', [
            'categorias' => $categorias,
        ]);
    }
}
