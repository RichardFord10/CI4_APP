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
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
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

//Command Line Tool Routes
$routes->cli('apptools/make_locations/(:segment)', 'AppTools::make_locations/$1');
$routes->cli('apptools/assign_random_location_to_items', 'AppTools::assign_random_location_to_items');
$routes->cli('apptools/add_random_items_to_items_table/(:segment)', 'AppTools::add_random_items_to_items_table/$1');



//Dashboard Routes
$routes->get('dashboard', 'Dashboard::index');
$routes->match(['get', 'post'], 'dashboard', 'Dashboard::index');



//Home routes
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::index');

//location routes
$routes->get('/locations', 'Locations::index');
$routes->match(['get', 'post'], 'locations/create', 'Locations::create');
$routes->match(['get', 'post'], 'locations/edit', 'Locations::edit');
$routes->match(['get', 'post'], 'locations/delete', 'Locations::delete');




//Charts Routes
$routes->get('/dashboard', 'Charts::bar_chart_js');

//API
$routes->get('pages/makeup', 'ApiController::index');
$routes->get('pages/makeup', 'ApiController::send_makeup_api_request');
$routes->get('/makeup', 'ApiController::index');


//item routes
$routes->get('items/ajax', 'Items::get_all_ajax');
$routes->match(['get', 'post'], 'items/create', 'Items::create');
$routes->match(['get', 'post'], 'items/edit', 'Items::edit');
$routes->match(['get', 'post'], 'items/delete', 'Items::delete');
$routes->get('items', 'Items::index');
$routes->get('items/view', 'Items::view');


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
$routes->get('pages/dashboard', 'Dashboard::index',['filter' => 'auth']);
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
