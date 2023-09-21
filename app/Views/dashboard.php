<?php
    echo "Email do usuário:". session('email');
    echo "<br>";
    echo "Data e hora login:". session('data_login');
    echo "<hr>";
    echo "Data e hora cadastro:". session('data_cad');
    echo "<br>";
    echo lang('App.welcome');
?>

<a href="/language/en/">English</a> | <a href="/language/pt-BR/">Português</a>

