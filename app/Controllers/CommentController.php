<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CommentModel;

class CommentController extends Controller
{
    public function __construct()
    {
        // Carregue o modelo de comentários
        $this->commentModel = new CommentModel();
    }

    public function addComment()
    {
        // Lógica para adicionar um comentário
    }

    public function viewComments($postId)
    {
        // Lógica para visualizar os comentários associados à postagem
    }
}
?>