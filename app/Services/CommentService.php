<?php

namespace App\Services;

use App\Entities\Comment;
use App\Models\CommentModel;

class CommentService
{
    protected $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function createComment($comment)
    {
        $comment = new Comment($comment);

        if ($this->commentModel->insert($comment)) {
            return true;
        } else {
            return false;
        }
    }

    public function readComment($id)
    {
        return $this->commentModel->find($id);
    }

    public function updateComment($id, $commentData)
    {
        $comment = new Comment($commentData);

        if ($this->commentModel->update($id, $comment)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteComment($id)
    {
        return $this->commentModel->delete($id);
    }

    // Novo método para buscar um usuário pelo email
    public function getUserByEmail($email)
    {
        $user = $this->userModel->select('password')->where('email', $email)->first();

        return $user ? $user->password : null;
    }
}