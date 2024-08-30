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

 $routes->resource('report');
 $routes->resource('employeecard');
 $routes->resource('publicemployeeprofile');
 $routes->resource('employeecertificate');
 $routes->resource('trainingcertificate');
 $routes->resource('timesheet');

 $routes->resource('log');
 $routes->resource('branding');
 $routes->resource('subscription');

 $routes->group('selfservice', function ($routes) {
   $routes->get('dashboard/(:num)',
   'SelfServicePortal::getDashboard/$1');
   $routes->put('profile/(:num)',
   'SelfServicePortal::updateProfile/$1');
   $routes->put('billing/(:num)',
   'SelfServicePortal::manageBilling/$1');
   });

 $routes->group('', ['filter' => 'tenant'], function ($routes) {
   $routes->resource('board');
   $routes->resource('list');
   $routes->resource('card');
   $routes->resource('customfield');
   $routes->resource('employee');
   $routes->resource('attendance');
   $routes->resource('leave');
   $routes->resource('payroll');
   $routes->resource('performanceevaluation');
   $routes->resource('report');
   $routes->resource('employeecard');
   $routes->resource('publicemployeeprofile');
   $routes->resource('employeecertificate');
   $routes->resource('trainingcertificate');
   $routes->resource('timesheet');
   $routes->resource('log');
   });

   $routes->resource('form');
   $routes->resource('finance');

   $routes->group('meeting', function ($routes) {
      $routes->post('zoom', 'Meeting::createZoomMeeting');
      $routes->post('teams', 'Meeting::createTeamsMeeting');
      $routes->post('google', 'Meeting::createGoogleMeet');
      });
     

      $routes->resource('onboarding');
      $routes->group('smtpconfig', function ($routes) {
         $routes->get('/', 'SMTPConfig::index');
         $routes->post('update', 'SMTPConfig::update');
         });