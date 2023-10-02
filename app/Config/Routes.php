<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('painel', 'AdminController::dashboard', ['filter' => 'auth']);

$routes->get('register', 'AuthController::showRegistrationForm');
$routes->get('login', 'AuthController::index'); // Rota para a página de login
$routes->post('login', 'AuthController::authenticate'); // Rota para autenticar (deve ser POST)
 // Rota para criar usuário (deve ser POST)

$routes->get('sair', 'AuthController::sair'); // Rota para sair
$routes->get('criar', 'AuthController::criar'); // Rota para criar algo (ajuste conforme necessário)

// Rota corrigida para a página de registro

$routes->post('register', 'AuthController::createUser');

// Restante das rotas
$routes->get('blog', 'BlogController::index'); // Rota para a página inicial do blog
$routes->get('idioma/(:any)', 'LanguageController::definirIdioma/$1'); // Rota para definir idioma
$routes->get('/', 'HomeController::index'); // Rota para a página inicial do blog
$routes->get('viewPost/(:num)', 'HomeController::viewPost/$1'); // Rota para visualizar uma postagem específica
$routes->get('logout', 'Login::logout'); // Rota para fazer logout
$routes->get('createPost', 'BlogController::showCreatePostForm');
$routes->post('createPost', 'BlogController::createPost');








?>
