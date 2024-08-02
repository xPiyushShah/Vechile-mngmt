<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/customer','Home::customer');

$routes->get('/custAdd', 'Home::custAdd');
$routes->post('addData', 'Home::addData');
$routes->get('Home/getData', 'Home::getData');
$routes->get('edit/(:num)', 'Home::edit/$1');
$routes->post('update/(:num)', 'Home::update/$1');

//vechile  routing

$routes->get('/vechile','Home::vechile');
$routes->get('/vechiled', 'Home::vechiled');
$routes->post('vechSave', 'Home::vechSave');
$routes->get('Home/vechgetData', 'Home::vechgetData');
$routes->get('edits/(:num)', 'Home::edits/$1');
$routes->post('updates/(:num)', 'Home::updates/$1');

//purchase routing
$routes->get('purchase','Home::purchase');
$routes->get('/purshow', 'Home::purshow');
$routes->post('Home/pursave', 'Home::pursave');
$routes->get('Home/purData', 'Home::purData');
$routes->get('edited/(:num)', 'Home::edited/$1');
$routes->post('updated/(:num)', 'Home::updated/$1');

$routes->get('fetchData', 'Home::fetchData');  // fetching




// above routing is for route an datat of api lead
