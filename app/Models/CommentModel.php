<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments'; // Nome da tabela de comentários
    protected $primaryKey = 'id'; // Chave primária da tabela
    protected $allowedFields = ['post_id', 'content'];

    public function addComment($postID, $commentText)
    {
        $data = [
            'post_id' => $postID,
            'comment' => $commentText,
        ];

        return $this->insert($data); // Insere o comentário no banco de dados e retorna o resultado
    }

    public function viewComments($postID)
    {
        // Lógica para exibir os comentários de uma postagem específica
        return $this->where('post_id', $postID)->findAll(); // Consulta os comentários relacionados à postagem
    }
}