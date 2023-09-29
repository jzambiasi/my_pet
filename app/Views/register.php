<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuário</title>
</head>
<body>
    <h1>Registro de Usuário</h1>
    
    <!-- Exibir mensagens de erro, se houver -->
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= esc($error) ?>
        </div>
    <?php endif; ?>
 
    <?php if (isset($success)): ?>
        <div class="alert alert-success">
            <?= esc($success) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/register">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
