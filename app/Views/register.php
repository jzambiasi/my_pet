<!-- register.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuário</title>
</head>
<body>
    <!-- Se houver mensagens de erro, exibi-las aqui -->
    <?php if (session('errors')) : ?>
        <div class="alert alert-danger">
            <?= session('errors') ?>
        </div>
    <?php endif; ?>

    <h1>Registro de Usuário</h1>
    <form method="post" action="/register">
        <!-- Seu formulário de registro aqui -->
    </form>
</body>
</html>
