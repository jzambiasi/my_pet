<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Rotas de autenticação e registro
    $routes->get('login', 'AuthController::showLoginForm');
    $routes->post('login', 'AuthController::authenticate');
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::createUser');
    $routes->get('sair', 'AuthController::logout');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('blog', 'BlogController::index');
    // Rota para a página inicial do blog
    $routes->get('/', 'HomeController::index');

    // Rota para visualizar uma postagem específica
    $routes->get('viewPost/(:num)', 'HomeController::viewPost/$1');

    // Rota para a página de criação de postagens
    $routes->get('createpost', 'BlogController::showCreatePostForm');
    $routes->post('createpost', 'BlogController::createPost');

    // Rota para o painel do administrador (com filtro de autenticação)
    $routes->get('painel', 'AdminController::dashboard', ['filter' => 'auth']);
    
    // Rota para definir o idioma
    $routes->get('idioma/(:any)', 'LanguageController::definirIdioma/$1');

    // Rota para o método metodoCreatePost no controlador CriatePostController
    $routes->post('criatepost/metodoCreatePost', 'CriatePostController::metodoCreatePost');
    $routes->get('createpost', 'CriatePostController::index');
    
    // Rota para a página de criar algo (ajuste conforme necessário)
    $routes->get('criar', 'AuthController::criar');
    
    // Rota para a página de usuários
    $routes->get('usuarios', 'Usuarios::index', ['as' => 'login']);
    $routes->get('usuarios/adicionar', 'Usuarios::adicionar');
    $routes->post('usuarios/add', 'Usuarios::add');
    $routes->post('usuarios/login', 'Usuarios::login');
});
