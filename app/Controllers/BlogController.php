<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostModel;
use CodeIgniter\Controller;

class BlogController extends Controller
{
    private $postModel;
    private $commentModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
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
            $postData = $this->request->getVar();

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

    public function view($postID)
    {
        // Recupere os detalhes da postagem com base no ID
        $post = $this->postModel->find($postID);
    
        if ($post) {
            // Recupere os comentários associados a esta postagem
            $comments = $this->commentModel->where('post_id', $postID)->findAll();
    
            // Se a postagem existe, carregue a visualização e passe os dados da postagem e os comentários para ela
            return view('viewpost', ['post' => $post, 'comments' => $comments]);
        } else {
            // Se a postagem não existe, você pode redirecionar para uma página de erro ou fazer o que for apropriado.
            return redirect()->to('/blog')->with('error', 'A postagem não foi encontrada.');
        }
    }

    public function viewByCategory($category)
    {
        $posts = $this->postModel->findByCategory($category);

        return view('category', ['category' => $category, 'posts' => $posts]);
    }
}
