<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
 $routes->post('register', 'Auth::register');
 $routes->post('login', 'Auth::login');
 
 $routes->group('',['filter' => 'role:admin'], function ($routes) {
    $routes->resource('board');
    $routes->resource('list',  ['controller' => 'ListController']);
    $routes->resource('card');
    $routes->resource('customfield');
 });
 $routes->group('', ['filter' => 'role:user'], function ($routes) {
    $routes->resource('ticket');
    });
 $routes->resource('label');
 $routes->resource('checklist');
 $routes->resource('attachment');
 $routes->resource('duedate');
 
 $routes->resource('comment');
 $routes->resource('powerup');
 $routes->resource('automation');
 $routes->resource('employee');

 $routes->resource('attendance');
 $routes->resource('leave');
 $routes->resource('payroll');
 $routes->resource('performanceevaluation');