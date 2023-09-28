<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rotas de autenticação
$routes->post('auth/index', 'Auth::index'); // Rota para a página de login específica
$routes->get('sair', 'Auth::sair'); // Rota para sair
$routes->get('criar', 'Auth::criar'); // Rota para criar algo (ajuste conforme necessário)
$routes->post('auth/authenticate', 'Auth::authenticate'); // Rota para autenticar (deve ser POST)
$routes->post('auth/createUser', 'Auth::createUser'); // Rota para criar usuário (deve ser POST)

// Rota POST para criar um post no blog
$routes->post('blog', 'BlogController::createPost'); // Substitua 'BlogController::createPost' pelo controlador e método apropriados para criar um post no blog.

$routes->get('blog', 'BlogController::index'); // Rota para a página inicial do blog
$routes->get('criarpost.php', 'CriarPostController::index'); // Rota para criar um post no blog
// Rota protegida por autenticação
$routes->get('painel', 'Home::index', ['filter' => 'auth']);
// Rota para definir idioma
$routes->get('idioma/{local}', 'LanguageController::definirIdioma');
// Rota para a página inicial do blog
$routes->get('/', 'HomeController::index');
// Rota para visualizar uma postagem específica
$routes->get('blog/viewPost/(:num)', 'HomeController::viewPost/$1');
// Rota para fazer logout
$routes->get('logout', 'Login::logout');
$routes->get('login', 'AuthController::login');
?>
