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
}
