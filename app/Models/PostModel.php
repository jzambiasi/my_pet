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

    public function getAllCategories()
    {
        // Substitua 'categorias' pelo nome da sua tabela de categorias
        $query = $this->db->table('categorias')
            ->select('nome')
            ->distinct()
            ->get();

        return $query->getResultArray();
    }
    // Dentro do arquivo PostModel.php

    public function findByCategory($category)
    {
        // Use o Query Builder para consultar os posts com base na categoria
        return $this->select('*')
        ->join('categorias', 'categorias.id = tipo_post_id')
        ->where('categorias.nome', $category)
        ->findAll();

    }
}
