<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('auth/index', 'AuthController::index'); // Rota para a página de login
$routes->get('sair', 'AuthController::sair'); // Rota para sair
$routes->get('criar', 'AuthController::criar'); // Rota para criar algo (ajuste conforme necessário)
$routes->post('auth/authenticate', 'AuthController::authenticate'); // Rota para autenticar (deve ser POST)
$routes->post('auth/createUser', 'AuthController::createUser'); // Rota para criar usuário (deve ser POST)

// Rotas para o blog
$routes->post('blog', 'BlogController::createPost'); // Rota POST para criar um post no blog
$routes->post('blog/create', 'BlogController::createPost');
$routes->get('blog', 'BlogController::index'); // Rota para a página inicial do blog
$routes->get('criarpost', 'CriarPostController::create'); // Rota para criar um post no blog

// Rota protegida por autenticação
$routes->get('painel', 'Home::index', ['filter' => 'auth']);

// Rota para definir idioma
$routes->get('idioma/(:any)', 'LanguageController::definirIdioma/$1');

// Rota para a página inicial do blog
$routes->get('/', 'HomeController::index');

// Rota para visualizar uma postagem específica
$routes->get('blog/viewPost/(:num)', 'HomeController::viewPost/$1');

// Rota para fazer logout
$routes->get('logout', 'Login::logout');

// Rotas de registro e login
$routes->get('login', 'AuthController::login');
$routes->get('register', 'AuthController::register');

?>
