<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuário</title>
</head>
<body>
    <h1>Registro de Usuário</h1>

    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <?= session('errors') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/createUser') ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Criar usuário</button>
    </form>
</body>
</html>
