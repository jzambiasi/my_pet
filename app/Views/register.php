<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuário</title>
</head>
<body>
    <h1>Registro de Usuário</h1>
    
    <!-- Exibir mensagens de erro, se houver -->
    <?php if (session('errors')) : ?>
        <div class="alert alert-danger">
            <?php foreach (session('errors') as $error) : ?>
                <?= $error ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/register">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
