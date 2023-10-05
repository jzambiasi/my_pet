<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Criação de Post</title>
</head>
<body>
    <h1>Formulário de Criação de Post</h1>
        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">Conteúdo:</label>
            <textarea name="content" id="content" rows="5" required></textarea>
        </div>
        <div>
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" required>
                <option value="">Selecione a Categoria</option>
                <option value="cachorro">Cachorro</option>
                <option value="gato">Gato</option>
                <option value="peixe">Peixe</option>
                <option value="passaros">Pássaros</option>
                <option value="diversos">Diversos</option>
            </select>
        </div>
        <div>
            <button type="submit">Criar Postagem</button>
        </div>
    </form>
</body>
</html>
