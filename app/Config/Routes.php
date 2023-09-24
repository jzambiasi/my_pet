<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('auth/index', 'Auth::index'); // Rota para a página de login específica
$routes->get('sair', 'Auth::sair'); // Rota para sair
$routes->get('criar', 'Auth::criar'); // Rota para criar algo (ajuste conforme necessário)
$routes->get('registrar', 'Auth::registrar'); // Rota para registrar (ajuste conforme necessário)
$routes->post('autenticar', 'Auth::autenticar'); // Rota para autenticar (deve ser POST)
$routes->post('criarUsuario', 'Auth::criarUsuario'); // Rota para criar usuário (deve ser POST)
$routes->get('painel', 'Home::index', ['filter' => 'auth']); // Rota protegida por autenticação
$routes->get('idioma/{local}', 'LanguageController::definirIdioma'); // Rota para definir idioma
$routes->get('/', 'Auth::index'); // Rota padrão, mantenha-a por último
