<body>
    <div>
        <h1>Meu Blog</h1>
    </div>  

    <?php if (session()->get('user_id')) : ?>
        <!-- Usuário logado -->
        <p>Bem-vindo, <?= session()->get('user_name'); ?>!</p>
       
    <?php else : ?>
        <a type="button" href="<?= site_url('/createpost'); ?>">Criar post</a>
          
       
        
    <?php endif; ?>

    <h3 style="font-size: 20px">
        <span>Ter um animal de estimação pode trazer inúmeros benefícios
        para a nossa vida. Além de nos proporcionarem companhia e alegria,
        os pets têm um impacto positivo em nossa saúde física, emocional e social.
        Vamos explorar a importância de ter um pet e como eles podem melhorar a nossa qualidade de vida.
        Ter um pet vai além do simples ato de cuidar de um animal.
        Eles se tornam parte de nossa família e trazem inúmeros benefícios para a nossa vida.
        Desde proporcionar companheirismo e alegria até melhorar nossa saúde física e emocional, os pets têm um papel fundamental
        em nosso bem-estar geral.
        Se você ainda não tem um pet, considere a possibilidade de adotar um.
        A relação especial que você irá construir com seu animal de estimação será
        recompensadora e transformadora.
        Contribua também para aumentar as experiências que
        você tem com seu animalzinho.
        </span>
    </h3>
   
</body>
</html>
