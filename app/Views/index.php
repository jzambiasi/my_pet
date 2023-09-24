<!-- app/Views/home/index.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Blog My Pet</title>
</head>

<body>
    <h1>Bem-vindo ao Meu Blog</h1>

    <?php if (!session()->get('user_id')) : ?>
        <!-- Formulário de login -->
        <form action="<?= site_url('auth/authenticate'); ?>" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Entrar</button>
        </form>
        <!-- Link para a página de registro -->
        <p>Não tem uma conta? <a href="<?= site_url('auth/register'); ?>">Registre-se</a></p>
    <?php endif; ?>

    <?php foreach ($posts as $post) : ?>
        <h2><a href="<?= site_url('home/viewPost/' . $post['id']); ?>"><?= $post['title']; ?></a></h2>
        <p><?= $post['content']; ?></p>
    <?php endforeach; ?>
</body>

</html>