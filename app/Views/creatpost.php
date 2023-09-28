
<?= \Config\Services::validation()->listErrors(); ?>

<?= form_open('/blog/createPost', ['class' => 'form']); ?>
    <div class="form-group">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Conteúdo:</label>
        <textarea name="content" id="content" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Criar Postagem</button>
    </div>
<?= form_close(); ?>
