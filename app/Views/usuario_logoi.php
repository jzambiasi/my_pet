<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* CSS personalizado */
        @keyframes changerColor {
            0%{
                background-color: #005e9f;
            }
            25% {
                background-color: #002546;
            }
            50%{
                background-color: #156a96;
            }
            60%{
                background-color: #002546;
            }
            75% {
                background-color: #156a96;
            }
            100%{
                background-color: #005e9f;
            }
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #723172;
            animation: changerColor 10s infinite;
        }

        .container {
            float: left;
            justify-content: center; /* Centralizar horizontalmente */
            align-items: center; /* Centralizar verticalmente */
            height: 110vh; /* 100% da altura da janela de visualização */
            width: 0%;
        }

        .login-container {
            position: relative;
            width: 300px;
            height: 100%;
            right: 25%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            position: relative;    
            top: 20%;
        }

        .errologin {
            color: red;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            padding: 1px;
        }

        label {
            font-weight: bold;
            position: relative;
            width: 80%; /* Expande os campos de entrada para ocupar toda a largura */
            padding: 15px;
            border-radius: 10px;
            font-size: 16px;
            top: 170px;
            align-items: center;
        }

        input[type="text"],
        input[type="password"]{
            position: relative;
            width: 80%; /* Expande os campos de entrada para ocupar toda a largura */
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            top: 180px;
        }
        

        .checkbox{
            align-items: left;
            font: bold;
            position: relative;
            width: 80%; /* Expande os campos de entrada para ocupar toda a largura */
            padding: 0px;
            margin-bottom: 15px;
            font-size: 16px;
            top: 190px; 
        }


        input[type="text"]:hover,
        input[type="password"]:hover{
            transform: scale(1.1); /* Escala o botão para 110% do tamanho original */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);

        }
      .register-link {
        position: relative;
        top: 320px;
        font-size: 18px;
      }
     
 
      button[type="submit"] {
      position: relative;    
            font-size: 18px;
            color: #fff;
            width: 100%;
            background: #723172;
            border: none;
            border-radius: 20px;
            padding: 14px 15px;
            transition: .5s ease;
            top: 250px;
            animation: changerColor 10s infinite;
 
        }
        button[type="submit"]:hover {
            background: #4ca356;
        }

        /* Estilos para a imagem */
        .img {
            width: 320px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h1>Login to continue</h1>
            <h2 class="errologin">
                <?php if (session()->has('errologin')) : ?>
                    <div><?= session()->getFlashdata('errologin') ?></div>
                <?php endif; ?>
            </h2>
            <form action="/login" method="post">
                <label for="nome">Username:</label>
                <input type="text" name="nome" required placeholder="User"><br>
                    <div class=""></div>
                <label for="senha">Password:</label>
                <input type="password" name="senha" id="senha" required placeholder="Password">
                    <div class="checkbox">
                <input type="checkbox" id="mostrarSenha" onclick="mostrarOcultarSenha()"> Show password<br>
                </div>
                <div class="submit">
                    <button type="submit" class="btn-register">Login</button>
                </div>
                <div class="register-link">
                Não tem uma conta?<a href="usuarios/adicionar">Cadastrar</a>
            </div>
            </form>
           
        </div>
        <div class="img">
<img src="../../assets/imgs/imagemLogin.png">
    </div>
    </div>

    <script>
        // Função para mostrar/ocultar a senha  
        function mostrarOcultarSenha() {
            var senhaInput = document.getElementById("senha");
            var mostrarSenhaCheckbox = document.getElementById("mostrarSenha");

            if (mostrarSenhaCheckbox.checked) {
                senhaInput.type = "text"; // Altera para "text" para mostrar a senha
            } else {
                senhaInput.type = "password"; // Volta para "password" para ocultar a senha
            }
        }
    </script>
</body>
</html> -->