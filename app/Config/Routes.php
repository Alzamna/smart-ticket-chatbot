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

// Admin 
// Login & Logout
$routes->get('/b0/login', 'Auth::index');  
$routes->post('/b0/login', 'Auth::login');
$routes->get('/b0/logout', 'Auth::logout');


// Area admin (pakai filter auth kalau sudah aktif)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    
    $routes->get('tickets', 'Admin::tickets');
    $routes->get('tickets/add', 'Admin::add_ticket');
    $routes->post('tickets/save', 'Admin::save_ticket');
    $routes->get('tickets/edit/(:num)', 'Admin::edit_ticket/$1');
    $routes->post('tickets/update/(:num)', 'Admin::update_ticket/$1');
    $routes->get('tickets/delete/(:num)', 'Admin::delete_ticket/$1');

    $routes->get('complaints', 'Admin::complaints');
    $routes->post('complaints/update/(:num)', 'Admin::update_complaint/$1');
    $routes->get('complaints/delete/(:num)', 'Admin::delete_complaint/$1');


});

