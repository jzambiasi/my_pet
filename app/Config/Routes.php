    <?php
    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */

    // Rotas de autenticação
    $routes->get('auth/index', 'Auth::index'); // Rota para a página de login específica
    $routes->get('sair', 'Auth::sair'); // Rota para sair
    $routes->get('criar', 'Auth::criar'); // Rota para criar algo (ajuste conforme necessário)
    $routes->get('auth/register', 'Auth::register'); // Rota para a página de registro
    $routes->post('autenticar', 'Auth::autenticar'); // Rota para autenticar (deve ser POST)
    $routes->post('criarUsuario', 'Auth::criarUsuario'); // Rota para criar usuário (deve ser POST)
    $routes->get('register', 'Auth::showRegisterForm');
    $routes->post('createUser', 'Auth::createUser');
    $routes->get('blog', 'BlogController::index');
    $routes->get('criarpost.php', 'CriarPostController::index');

    // Rota protegida por autenticação
    $routes->get('painel', 'Home::index', ['filter' => 'auth']);

    // Rota para definir idioma
    $routes->get('idioma/{local}', 'LanguageController::definirIdioma');

    // Rota para a página inicial do blog
    $routes->get('/', 'HomeController::index');

    // Rota para visualizar uma postagem específica
    $routes->get('blog/viewPost/(:num)', 'HomeController::viewPost/$1');

    // Rota para autenticar o login
    $routes->post('Controllers/auth', 'Login::auth');
    $routes->post('auth/authenticate', 'Auth::authenticate');
    // Rota para fazer logout
    $routes->get('logout', 'Login::logout');
    ?>
// Rotas de autenticação
$routes->get('auth/index', 'Auth::index'); // Rota para a página de login específica
$routes->get('sair', 'Auth::sair'); // Rota para sair
$routes->get('criar', 'Auth::criar'); // Rota para criar algo (ajuste conforme necessário)
$routes->get('auth/register', 'Auth::register'); // Rota para a página de registro
$routes->post('autenticar', 'Auth::autenticar'); // Rota para autenticar (deve ser POST)
$routes->post('criarUsuario', 'Auth::criarUsuario'); // Rota para criar usuário (deve ser POST)
$routes->get('register', 'Auth::showRegisterForm');
$routes->post('createUser', 'Auth::createUser');
$routes->get('blog', 'BlogController::index');
$routes->get('criarpost.php', 'CriarPostController::index');
// Rota protegida por autenticação
$routes->get('painel', 'Home::index', ['filter' => 'auth']);
// Rota para definir idioma
$routes->get('idioma/{local}', 'LanguageController::definirIdioma');
// Rota para a página inicial do blog
$routes->get('/', 'HomeController::index');
// Rota para visualizar uma postagem específica
$routes->get('blog/viewPost/(:num)', 'HomeController::viewPost/$1');
// Rota para autenticar o login
$routes->post('auth/authenticate', 'AuthController::authenticate');
// Rota para fazer logout
$routes->get('logout', 'Login::logout');
$routes->get('login', 'AuthController::login');

?>
