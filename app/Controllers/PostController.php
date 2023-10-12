<?php

namespace App\Controllers;

class PostController extends BaseController
{
    public function show($postId)
    {
        $postModel = new \App\Models\PostModel();
        $post = $postModel->find($postId); // Recupera o post com base no ID

        return view('post', ['post' => $post]);
    }
<<<<<<< HEAD

    public function viewPost($postId)
    {
        // Lógica para recuperar os detalhes da postagem com o ID $postId
        $postModel = new \App\Models\PostModel(); // Inicialize o modelo PostModel
        $post = $postModel->find($postId); // Recupera o post com base no ID
    
        return view('view_post', ['post' => $post]);
    }
=======
>>>>>>> 3eaab76671dd74846e82fca60e4c46a8c69bb0cf
}
