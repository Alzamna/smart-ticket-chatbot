<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'User::index');

// Informasi 
$routes->get('/informasi', 'User::informasi');

// Pendaftaran
$routes->get('/pendaftaran', 'User::pendaftaran');
$routes->post('/pendaftaran/save', 'User::simpan_pendaftaran'); 

// Status
$routes->get('/cek-status', 'User::cek_status');
$routes->post('/cek-status', 'User::hasil_status');

// Chatbot
$routes->get('/chatbot', 'Chatbot::index');
$routes->post('/chatbot/sendMessage', 'Chatbot::sendMessage');
$routes->get('/chatbot/reset', 'Chatbot::reset');

// Pengaduan
$routes->get('/pengaduan', 'User::pengaduan');
$routes->post('/pengaduan/save', 'User::simpan_pengaduan');


// Login & Logout
$routes->get('/b0/login', 'Auth::index');  
$routes->post('/b0/login', 'Auth::login');
$routes->get('/b0/logout', 'Auth::logout');

// Admin 
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');

    // Tiket
    $routes->get('tickets', 'Admin::tickets');
    $routes->get('tickets/add', 'Admin::add_ticket');
    $routes->post('tickets/save', 'Admin::save_ticket');
    $routes->get('tickets/edit/(:num)', 'Admin::edit_ticket/$1');
    $routes->post('tickets/update/(:num)', 'Admin::update_ticket/$1');
    $routes->get('tickets/delete/(:num)', 'Admin::delete_ticket/$1');

    // Layanan
    $routes->get('services', 'Admin::services');
    $routes->get('services/add', 'Admin::add_service');
    $routes->post('services/save', 'Admin::save_service');
    $routes->get('services/edit/(:num)', 'Admin::edit_service/$1');
    $routes->post('services/update/(:num)', 'Admin::update_service/$1');
    $routes->get('services/delete/(:num)', 'Admin::delete_service/$1');

    // Kendaraan
    $routes->get('vehicles', 'Admin::vehicles');
    $routes->get('vehicles/add', 'Admin::add_vehicle');
    $routes->post('vehicles/save', 'Admin::save_vehicle');
    $routes->get('vehicles/edit/(:num)', 'Admin::edit_vehicle/$1');
    $routes->post('vehicles/update/(:num)', 'Admin::update_vehicle/$1');
    $routes->get('vehicles/delete/(:num)', 'Admin::delete_vehicle/$1');

    // Berita
    $routes->get('berita', 'Admin::berita');
    $routes->get('berita/create', 'Admin::berita_create');
    $routes->post('berita/store', 'Admin::berita_store');
    $routes->get('berita/edit/(:num)', 'Admin::berita_edit/$1');
    $routes->post('berita/update/(:num)', 'Admin::berita_update/$1');
    $routes->get('berita/delete/(:num)', 'Admin::berita_delete/$1');


    // Pengaduan
    $routes->get('complaints', 'Admin::complaints');
    $routes->get('complaints/edit/(:num)', 'Admin::edit_complaint/$1');
    $routes->post('complaints/edit/(:num)', 'Admin::edit_complaint/$1');
    $routes->post('complaints/update/(:num)', 'Admin::update_complaint/$1');
    $routes->get('complaints/delete/(:num)', 'Admin::delete_complaint/$1');


});

