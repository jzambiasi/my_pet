<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::createUser');
 $routes->get('painel', 'AdminController::dashboard', ['filter' => 'auth']);
 
 $routes->get('login', 'AuthController::showLoginForm'); // Rota para a página de login
 $routes->post('login', 'AuthController::authenticate'); // Rota para autenticar (deve ser POST)
 
 $routes->get('sair', 'AuthController::logout'); // Rota para sair
 
 $routes->get('criar', 'AuthController::criar'); // Rota para criar algo (ajuste conforme necessário)
 
 $routes->get('blog', 'BlogController::index'); // Rota para a página inicial do blog
 $routes->get('idioma/(:any)', 'LanguageController::definirIdioma/$1'); // Rota para definir idioma
 $routes->get('/', 'HomeController::index'); // Rota para a página inicial do blog
 $routes->get('viewPost/(:num)', 'HomeController::viewPost/$1'); // Rota para visualizar uma postagem específica
 
 $routes->get('createPost', 'BlogController::showCreatePostForm');
 $routes->post('createPost', 'BlogController::createPost');
 
 // Rota para o método metodoCreatePost no controlador CriatePostController
 $routes->post('createpost', 'CriatePostController::metodoCreatePost');
 $routes->get('createpost', 'CriatePostController::index');
 
 $routes->get('usuarios', 'Usuarios::index', ['as' => 'login']);
 $routes->get('usuarios/adicionar', 'Usuarios::adicionar');
 $routes->post('usuarios/add', 'Usuarios::add');
 $routes->post('usuarios/login', 'Usuarios::login');
 $routes->post('criatepost/metodoCreatePost', 'CriatePostController::metodoCreatePost');
 
?>