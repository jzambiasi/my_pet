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
            $commentText = $this->request->getPost('comment_text');

            // Valide os dados, se necessário

            // Inicialize o modelo de comentários
            $commentModel = new CommentModel();

            // Crie um array com os dados do comentário
            $commentData = [
                'post_id' => $postID,
                'comment_text' => $commentText,
                // Outros campos, se houver
            ];

            // Insira o comentário no banco de dados
            $commentModel->insert($commentData);

            // Redirecione de volta à página de visualização da postagem ou faça qualquer outra ação necessária
            return redirect()->to(site_url('viewpost' . $postID));
        }
    }

    public function viewComments()
    {
        // Lógica para exibir os comentários
    }
}
