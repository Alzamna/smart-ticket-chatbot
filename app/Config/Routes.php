<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tiketing', 'Tiketing::index');
$routes->get('/tiketing/create', 'Tiketing::create');
$routes->post('/tiketing/store', 'Tiketing::store');
$routes->get('/tiketing/(:num)', 'Tiketing::show/$1');
$routes->post('/tiketing/update_status/(:num)', 'Tiketing::updateStatus/$1');

$routes->post('/documents/upload/(:num)', 'Documents::upload/$1');

$routes->get('/chatbot', 'Chatbot::index');
$routes->post('/chatbot/sendMessage', 'Chatbot::sendMessage');
$routes->get('/chatbot/reset', 'Chatbot::reset');



$routes->get('/documents/upload/(:num)', 'Documents::upload/$1');
$routes->post('/documents/upload/(:num)', 'Documents::upload/$1');

