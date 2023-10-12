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
    $routes->add('comment/addComment/(:num)', 'CommentController::addComment/$1');
    // Rota para a página inicial do blog
    $routes->get('/', 'HomeController::index');
    $routes->get('logout', 'AuthController::logout');
    
    // Rota para a página de criação de postagens
    $routes->get('createpost', 'BlogController::showCreatePostForm');
    $routes->post('createpost', 'AuthController::createPost');
    
    // Rota para visualizar uma postagem específica
    $routes->get('viewPost/(:num)', 'HomeController::viewPost/$1');
    
    // Rota para o painel do administrador (com filtro de autenticação)
    $routes->get('painel', 'AdminController::dashboard', ['filter' => 'auth']);
    
    // Rota para definir o idioma
    $routes->get('idioma/(:any)', 'LanguageController::definirIdioma/$1');
    
    // Rota para o método metodoCreatePost no controlador CriatePostController
    $routes->post('criatepost/metodoCreatePost', 'CriatePostController::metodoCreatePost');
    $routes->get('createpost', 'CriatePostController::index');
    
    // Rota para a página de criar algo (ajuste conforme necessário)
    $routes->get('criar', 'AuthController::criar');
    $routes->get('blog/view/(:num)', 'AuthController::viewPost/$1');
    $routes->get('post/(:num)', 'AuthController::viewPost/$1');

    $routes->get('comment/addComment/1', 'CommentController::addComment');

    $routes->post('comment/addComment', 'CommentController::addComment');
    $routes->add('viewpost/(:num)', 'PostController::viewPost/$1');
    $routes->get('comment/viewComments', 'CommentController::viewComments');
    // Rota para a página de usuários
    $routes->get('usuarios', 'Usuarios::index', ['as' => 'login']);
    $routes->get('usuarios/adicionar', 'Usuarios::adicionar');
    $routes->post('usuarios/add', 'Usuarios::add');
    $routes->post('usuarios/login', 'Usuarios::login');
    $routes->get('localizador_petshops', 'PetShopController::localizador');

});
