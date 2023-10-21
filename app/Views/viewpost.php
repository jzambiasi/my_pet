<!DOCTYPE html>
<html>

<head>
    <title>Visualizar Postagem</title>
</head>

<body>
  
    <h1>Visualizar Postagem</h1>

    <h2><?= $post['title']; ?></h2>
<p><?= substr($post['content'], 0, 50); ?>...</p>
<a href="<?= site_url('blog/viewpost/' . $post['id']); ?>">Leia mais</a>


    <a href="<?= site_url('blog'); ?>">Voltar para o blog</a>

    <?php
        if (session()->has('success')) {
            echo "<br>";
            echo session()->getFlashdata('success');
        }
    ?>
    <form action="<?= site_url('addComment'); ?>" method="post">
    <input type="hidden" name="tipo_post_id" value="<?= $post['tipo_post_id']; ?>"> 
        <input type="hidden" name="tipo_post_id" value="<?= session()->get('user_id'); ?>">
        <textarea name="content" placeholder="Adicione seu comentário"></textarea>
        <button type="submit">Enviar Comentário</button>
    </form>

    <div class="comment-container">
        <?php if (!empty($comments)) : ?>
            <h3>Comentários:</h3>
            <ul>
                <?php foreach ($comments as $comment) : ?>
                    <li><?= $comment->content; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Nenhum comentário ainda.</p>
        <?php endif; ?>
    </div>
</body>

</html>
