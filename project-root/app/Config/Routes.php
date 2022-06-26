<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Home routes
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::index');

//item routes
$routes->match(['get', 'post'], 'items/create', 'Items::create');
$routes->match(['get', 'post'], 'items/edit', 'Items::edit');
$routes->match(['get', 'post'], 'items/delete', 'Items::delete');
$routes->get('items', 'Items::index');
$routes->get('items/view', 'Items::view');
$routes->get('items/create', 'Items::get_by_distinct');


//blog routes
$routes->match(['get', 'post'], 'blog/create', 'Blog::create');
$routes->match(['get', 'post'], 'blog/edit', 'Blog::edit');
$routes->match(['get', 'post'], 'blog/delete', 'Blog::delete');
$routes->get('blog', 'Blog::index');
$routes->get('blog/view', 'Blog::view');

//pages routes
$routes->get('(:any)', 'Pages::view/$1');
$routes->get('pages/login', 'Login::index');
$routes->get('pages/register', 'Register::index');
$routes->get('pages', 'Pages::index');
$routes->get('page/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('pages/login', 'Login::index');
$routes->get('pages/home', 'Home::index');


//login/register routes
$routes->match(['get','post'], 'register/save', 'Register::save');
$routes->match(['get','post'], 'login/auth', 'Login::auth');






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
