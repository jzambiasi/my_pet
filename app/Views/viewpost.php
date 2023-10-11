

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Postagem</title>
</head>
<body>
    <h1>Visualizar Postagem</h1>

    <h2><?= $post['title']; ?></h2>
    <p><?= $post['content']; ?></p>

    <a href="<?= site_url('blog'); ?>">Voltar para o blog</a>
    
    <!-- Adicione um formulário para adicionar comentários -->
    <form action="<?= site_url('comment/addComment'); ?>" method="post">
        <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
        <textarea name="content" placeholder="Adicione seu comentário"></textarea>
        <button type="submit">Enviar Comentário</button>
    </form>

    <!-- Exiba a lista de comentários associados à postagem -->
    <?php if (!empty($comments)) : ?>
        <h3>Comentários:</h3>
        <ul>
            <?php foreach ($comments as $comment) : ?>
                <li><?= $comment['content']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Nenhum comentário ainda.</p>
    <?php endif; ?>
</body>
</html>
