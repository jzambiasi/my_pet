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
            // Valide os dados do formulário
            $validationRules = [
                'title' => 'required|min_length[5]|max_length[255]',
                'content' => 'required',
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }

            // Recupere os dados do formulário
            $postData = $this->request->getPost();

            // Insira os dados no banco de dados usando o modelo PostModel
            $post = [
                'title' => $postData['title'],
                'content' => $postData['content'],
            ];

            $this->postModel->insert($post);

            return redirect()->to('/blog')->with('success', 'Postagem criada com sucesso.');
        }

        return $this->showCreatePostForm();
    }

    public function showCreatePostForm()
    {
        return view('createpost');
    }
}
