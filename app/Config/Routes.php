<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Auth::login');
$routes->match(['get','post'],'login','Auth::login');
$routes->get('logout','Auth::logout');

$routes->get('forgot-password','Auth::forgotPassword');

$routes->group('', ['filter'=>'auth'], function($routes){

    $routes->get('dashboard','CustomerController::index');

    $routes->get('customers/list','CustomerController::list');

    $routes->get('customers/create','CustomerController::create');
    $routes->post('customers/store','CustomerController::store');

    $routes->get('customers/edit/(:num)',
        'CustomerController::edit/$1');

    $routes->post('customers/update/(:num)',
        'CustomerController::update/$1');
});


$routes->get('copy-data', 'CustomerCopyController::index');
$routes->post('api/copy-customers', 'CustomerCopyController::copyCustomers');