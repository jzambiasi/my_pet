<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CommentModel;

class CommentController extends Controller
{
    protected $commentModel;
    protected $userModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
        $this->userModel = new UserModel(); // Substitua "UserModel" pelo nome da sua classe de modelo de usuário.
    }

    public function addComment()
    {
        if ($this->request->getMethod() === 'post') {
            $postID = $this->request->getPost('post_id');
            $commentText = $this->request->getPost('content');
            $userID = $this->request->getPost('user_id'); // Supondo que você tenha um campo "user_id" no seu formulário.

            // Valide os dados, se necessário

            // Verifique se o usuário com o ID especificado existe
            if (!$this->userModel->find($userID)) {
                return redirect()->to(site_url('blog/viewpost/' . $postID))->with('error', 'Usuário não encontrado.');
            }

            // Crie um array com os dados do comentário
            $commentData = [
                'post_id' => $postID,
                'content' => $commentText,
                'user_id' => $userID,
                // Outros campos, se houver
            ];

            // Insira o comentário no banco de dados
            $this->commentModel->insert($commentData);

            // Redirecione de volta à página de visualização da postagem
            return redirect()->to(site_url('blog/viewpost/' . $postID))->with('success', 'Comentário adicionado com sucesso.');
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
?????????????????????