<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoriaModel;
use CodeIgniter\Controller;

class PostController extends BaseController
{
    public function createPost()
    {
        // Coletar dados do formulário
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $category_id = $this->request->getPost('category_id'); // Alterei a variável para 'category_id'

        // Validar os dados usando as ferramentas de validação do CodeIgniter
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[5]',
            'content' => 'required|min_length[10]',
            'category_id' => 'required', // Certifique-se de que a categoria seja fornecida no formulário
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Se a validação falhar, redirecione de volta ao formulário de criação com mensagens de erro
            return redirect()->to('/createpost')->withInput()->with('errors', $validation->getErrors());
        }

        // Criar a postagem associando-a à categoria correta
        $postModel = new PostModel();
        $postData = [
            'title' => $title,
            'content' => $content,
            'tipo_post_id' => $category_id, // Aqui associamos a postagem à categoria
        ];

        // Chame o método createPost do modelo
        if ($postModel->createPost($postData)) {
            // Post criado com sucesso, redirecione para a página de blog ou para onde desejar
            return redirect()->to('/blog');
        } else {
            // Lidar com erros, se a criação do post falhar
            // Você pode redirecionar de volta ao formulário de criação com mensagens de erro, por exemplo
        }
    }
}
