<!-- login.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <!-- Se houver mensagens de erro, exibi-las aqui -->
    <?php if (isset($erro)) : ?>
        <div class="alert alert-danger">
            <?php echo $erro; ?>
        </div>
    <?php endif; ?>

    <h2>Login</h2>
    <form action="/login" method="post">
        <!-- Seu formulário de login aqui -->
    </form>
</body>
</html>
