<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content'];

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
        $query = $this->db->table('categorias')
            ->select('nome')
            ->distinct()
            ->get();

        return $query->getResultArray();
    }

    public function findByCategory($category)
    {
        return $this->select('*')
            ->join('categorias', 'categorias.id = posts.tipo_post_id')
            ->where('categorias.nome', $category)
            ->findAll();
    }
}
