<?php if (session('errors')): ?>
    <div class="alert alert-danger"><?= implode('<br>', session('errors')) ?></div>
<?php endif; ?>

<form method="post" action="/createUser">


    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Criar usuário</button>
</form>
