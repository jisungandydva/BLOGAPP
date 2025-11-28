<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ========================= FRONTEND =========================

// Halaman khusus profil tiap anggota
$routes->get('/team/adinda', 'Team::adinda');
$routes->get('/team/merri', 'Team::merri');
$routes->get('/team/fierdhiva', 'Team::fierdhiva');

// Detail anggota (dinamis by ID)
$routes->get('/team/detail/(:num)', 'Team::teamDetail/$1');

// Halaman umum
$routes->get('/', 'Frontend::home');
$routes->get('/about', 'Frontend::about');
$routes->get('/contact', 'Frontend::contact');
$routes->get('/team', 'Frontend::team');
$routes->get('/blog', 'Frontend::blog');
$routes->get('/blog/(:segment)', 'Frontend::detail/$1');


// ========================= TEST MODEL =========================
$routes->get('/testmodel', 'TestModel::index');


// ========================= USER MANAGEMENT =========================
$routes->group('users', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('create', 'UserController::create');
    $routes->post('store', 'UserController::store');
    $routes->get('edit/(:num)', 'UserController::edit/$1');
    $routes->post('update/(:num)', 'UserController::update/$1');
    $routes->get('delete/(:num)', 'UserController::delete/$1');
});


// ========================= AUTH =========================
$routes->get('/register', 'AuthController::register');
$routes->post('/register/process', 'AuthController::processRegister');
$routes->get('/login', 'AuthController::login');
$routes->post('/login/process', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');


// ========================= DASHBOARD =========================
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);


// ========================= MEMBERS CRUD =========================
$routes->group('members', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'MemberController::index');
    $routes->get('create', 'MemberController::create');
    $routes->post('store', 'MemberController::store');
    $routes->get('edit/(:num)', 'MemberController::edit/$1');
    $routes->post('update/(:num)', 'MemberController::update/$1');
    $routes->get('delete/(:num)', 'MemberController::delete/$1');
});


// ========================= POSTS CRUD =========================
$routes->group('posts', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'PostController::index');
    $routes->get('create', 'PostController::create');
    $routes->post('store', 'PostController::store');
    $routes->get('edit/(:num)', 'PostController::edit/$1');
    $routes->post('update/(:num)', 'PostController::update/$1');
    $routes->post('delete/(:num)', 'PostController::delete/$1');
});


// ========================= SETTINGS =========================
$routes->get('/settings', 'SettingsController::index');
$routes->post('/settings/update', 'SettingsController::update');


// ========================= BLOG CRUD DASHBOARD =========================
$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
    $routes->get('blog', 'BlogController::index');
    $routes->get('blog/create', 'BlogController::create');
    $routes->post('blog/store', 'BlogController::store');
    $routes->get('blog/edit/(:num)', 'BlogController::edit/$1');
    $routes->post('blog/update/(:num)', 'BlogController::update/$1');
    $routes->post('blog/delete/(:num)', 'BlogController::delete/$1');
});


// ========================= TEAM CRUD DASHBOARD =========================
$routes->group('dashboard/team', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Team::index');
    $routes->get('create', 'Team::create');
    $routes->post('store', 'Team::store');
    $routes->get('edit/(:num)', 'Team::edit/$1');
    $routes->post('update/(:num)', 'Team::update/$1');
    $routes->get('delete/(:num)', 'Team::delete/$1');
});

// ========================= SOSMED CRUD =========================
$routes->group('dashboard/sosmed', [
    'namespace' => 'App\Controllers\Dashboard',
    'filter' => 'auth'
], function($routes) {

    $routes->get('/', 'SosmedController::index');            // list data
    $routes->get('create', 'SosmedController::create');      // form tambah
    $routes->post('store', 'SosmedController::store');       // proses tambah
    $routes->get('edit/(:num)', 'SosmedController::edit/$1'); // form edit
    $routes->post('update/(:num)', 'SosmedController::update/$1'); // proses edit
    $routes->get('delete/(:num)', 'SosmedController::delete/$1'); // hapus data
});

$routes->get('/team/adinda', 'Frontend::adinda');

// ========================= SKILLS CRUD (DASHBOARD) =========================
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard', 'filter' => 'auth'], function($routes) {

    $routes->get('skills', 'SkillsController::index');
    $routes->get('skills/create', 'SkillsController::create');
    $routes->post('skills/store', 'SkillsController::store');
    $routes->get('skills/edit/(:num)', 'SkillsController::edit/$1');
    $routes->post('skills/update/(:num)', 'SkillsController::update/$1');
    $routes->get('skills/delete/(:num)', 'SkillsController::delete/$1');

});
