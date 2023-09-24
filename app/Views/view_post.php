<!-- app/Views/home/view_post.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Postagem</title>
</head>
<body>
    <h1>Visualizar Postagem</h1>

    <h2><?= $post['title']; ?></h2>
    <p><?= $post['content']; ?></p>

    <a href="<?= site_url('home'); ?>">Voltar para a Página Inicial</a>
</body>
</html>
