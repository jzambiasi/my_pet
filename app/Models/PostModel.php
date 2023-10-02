<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id'; // Nome da chave primária
    protected $allowedFields = ['title', 'content']; // Campos permitidos para inserção/atualização

    public function getAllPosts()
    {
        return $this->findAll();
    }

    public function getPostById($id)
    {
        return $this->find($id);
    }

    public function createPost($data)
{
    return $this->save($data);
}


    public function updatePost($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletePost($id)
    {
        return $this->delete($id);
    }
}