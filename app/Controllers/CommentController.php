<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CommentModel;

class CommentController extends Controller
{
    protected $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function addComment()
    {
        if ($this->request->getMethod() === 'post') {
            $postID = $this->request->getPost('post_id');
            $commentText = $this->request->getPost('content');

            // Valide os dados, se necessário

            // Crie um array com os dados do comentário
            $commentData = [
                'post_id' => $postID,
                'content' => $commentText,
                // Outros campos, se houver
            ];

            // Insira o comentário no banco de dados
            $this->commentModel->insert($commentData);

            // Redirecione de volta à página de visualização da postagem
            return redirect()->to(site_url('blog/viewpost/' . $postID));

        }
    }

    public function viewComments($postId)
    {
        // Recupere os comentários associados a uma postagem específica
        $comments = $this->commentModel->where('post_id', $postId)->findAll();
               // Carregue a visualização com os comentários
        return view('/viewpost', ['content' => $comments]);
    }
}
