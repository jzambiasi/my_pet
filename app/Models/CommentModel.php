<?php

namespace App\Models;
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CommentModel; // Importe a classe CommentModel

class CommentController extends Controller
{
    protected $commentModel; // Defina a propriedade $commentModel

    public function __construct()
    {
        // Obtenha as dependências usando o Service Container
        $this->commentModel = new CommentModel(); // Inicialize o modelo CommentModel
    }

    public function addComment()
    {
        // Lógica para adicionar um comentário
    }

    public function viewComments()
    {
        // Lógica para exibir os comentários
    }
}

?>