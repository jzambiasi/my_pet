<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['post_id', 'content']; // Alterado 'comment' para 'content'

    public function addComment($postID, $commentText)
    {
        $data = [
            'post_id' => $postID,
            'content' => $commentText, // Alterado 'comment' para 'content'
        ];

        return $this->insert($data);
    }

    public function viewComments($postID)
    {
        return $this->where('post_id', $postID)->findAll();
    }
}
