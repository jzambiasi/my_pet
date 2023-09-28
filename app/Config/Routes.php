<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('login', 'AuthController::index'); // Rota para a página de login
$routes->post('login', 'AuthController::authenticate'); // Rota para autenticar (deve ser POST)
$routes->post('register', 'AuthController::createUser'); // Rota para criar usuário (deve ser POST)

$routes->get('auth/index', 'AuthController::index'); // Rota para a página de login (caso você ainda precise dela)
$routes->get('sair', 'AuthController::sair'); // Rota para sair
$routes->get('criar', 'AuthController::criar'); // Rota para criar algo (ajuste conforme necessário)
$routes->post('auth/authenticate', 'AuthController::authenticate'); // Rota para autenticar (deve ser POST)
$routes->post('auth/createUser', 'AuthController::createUser'); // Rota para criar usuário (deve ser POST)

// Rota corrigida para a página de registro
$routes->match(['get', 'post'], 'register', 'AuthController::register');

// Restante das rotas
$routes->post('blog', 'BlogController::createPost'); // Rota POST para criar um post no blog
$routes->post('blog/create', 'BlogController::createPost');
$routes->get('blog', 'BlogController::index'); // Rota para a página inicial do blog
$routes->get('criarpost', 'CriarPostController::create'); // Rota para criar um post no blog
$routes->get('painel', 'Home::index', ['filter' => 'auth']); // Rota protegida por autenticação
$routes->get('idioma/(:any)', 'LanguageController::definirIdioma/$1'); // Rota para definir idioma
$routes->get('/', 'HomeController::index'); // Rota para a página inicial do blog
$routes->get('blog/viewPost/(:num)', 'HomeController::viewPost/$1'); // Rota para visualizar uma postagem específica
$routes->get('logout', 'Login::logout'); // Rota para fazer logout

?>
