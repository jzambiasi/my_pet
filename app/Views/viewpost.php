<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Postagem</title>
</head>
<body>
    <h1>Visualizar Postagem</h1>

    <h2><?= esc($post['title']); ?></h2>
    <p><?= esc($post['content']); ?></p>

    <a href="<?= site_url('blog'); ?>">Voltar para o blog</a>

    <!-- Adicione um formulário para adicionar comentários -->
    <form id="comment-form" action="<?= site_url('comment/addComment'); ?>" method="post">
        <input type="hidden" name="post_id" value="<?= esc($post['id']); ?>">
        <textarea name="comment_text" id="comment_text" placeholder="Adicione seu comentário"></textarea>
        <button type="submit" id="submit-comment">Enviar Comentário</button>
    </form>

    <!-- Exiba a lista de comentários associados à postagem -->
    <?php if (!empty($comments)) : ?>
        <h3>Comentários:</h3>
        <ul>
            <?php foreach ($comments as $comment) : ?>
                <li><?= esc($comment['comment_text']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Nenhum comentário ainda.</p>
    <?php endif; ?>

    <script>
    // Adicione um evento para enviar o comentário via AJAX
    document.getElementById('comment-form').addEventListener('submit', function (e) {
        e.preventDefault();
        var commentText = document.getElementById('comment_text').value;
        var postID = <?= isset($post['id']) ? $post['id'] : 'null' ?>;

        if (postID !== null) {
            // Realize uma requisição AJAX para adicionar o comentário
            // Substitua este trecho com a lógica de AJAX para adicionar o comentário
            // Atualize a lista de comentários após adicionar o comentário
        }
    });
</script>
</body>
</html>
