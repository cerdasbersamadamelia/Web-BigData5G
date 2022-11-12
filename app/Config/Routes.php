<?php

namespace Config;

use App\Controllers\Recommendation;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// The first page that appears
$routes->get('/', 'Home::home');

/*
 * --------------------------------------------------------------------
 * ADMIN 
 * --------------------------------------------------------------------
 */
// Limitations, other than admin can't enter admin's -> url/controller/method
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);

// Create user
$routes->get('/admin/create', 'Admin::create', ['filter' => 'role:admin']);

// Delete user
$routes->delete('/admin/(:num)', 'Admin::delete/$1', ['filter' => 'role:admin']);

// Detail user
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
// $routes->get('/admin/(:any)', 'Admin::detail/$1', ['filter' => 'role:admin']);

// Role Update Validation
$routes->get('/admin/role_update_validation', 'Admin::role_update_validation', ['filter' => 'role:admin']);

/*
 * --------------------------------------------------------------------
 * DATA ENGINEER
 * --------------------------------------------------------------------
 */
// Limitations, other than data_engineer can't enter data_engineer's -> url/controller/method
$routes->get('/dataengineer', 'Dataengineer::index', ['filter' => 'role:data engineer']);
$routes->get('/dataengineer/index', 'Dataengineer::index', ['filter' => 'role:data engineer']);

// Update data IMEI and Payload
$routes->get('/dataengineer/updateimei', 'Dataengineer::updateimei', ['filter' => 'role:data engineer']);
$routes->get('/dataengineer/updatepayload', 'Dataengineer::updatepayload', ['filter' => 'role:data engineer']);

// Update IMEI and Payload threshold
$routes->get('/dataengineer/imeithreshold/(:num)', 'Dataengineer::imeithreshold/$1', ['filter' => 'role:data engineer']);
$routes->get('/dataengineer/payloadthreshold/(:num)', 'Dataengineer::payloadthreshold/$1', ['filter' => 'role:data engineer']);

// Summary IMEI and Payload
$routes->get('/dataengineer/summaryimei', 'Dataengineer::summaryimei', ['filter' => 'role:data engineer']);
$routes->get('/dataengineer/summarypayload', 'Dataengineer::summarypayload', ['filter' => 'role:data engineer']);

/*
 * --------------------------------------------------------------------
 * BUSINESS USER
 * --------------------------------------------------------------------
 */
$routes->get('/profile/role_update', 'Profile::role_update', ['filter' => 'role:business user']);

/*
 * --------------------------------------------------------------------
 * ADMIN, DATA ENGINEER, BUSINESS USER
 * --------------------------------------------------------------------
 */
// Coverage Map
$routes->get('/coveragemap/cimei', 'Coveragemap::cimei', ['filter' => 'role:admin,data engineer,business user']);
$routes->get('/coveragemap/cpayload', 'Coveragemap::cpayload', ['filter' => 'role:admin,data engineer,business user']);
$routes->get('/coveragemap/cimeipayload', 'Coveragemap::cimeipayload', ['filter' => 'role:admin,data engineer,business user']);

// Recommendation
$routes->get('/recommendation/rimei', 'Recommendation::rimei', ['filter' => 'role:admin,data engineer,business user']);
$routes->get('/recommendation/rpayload', 'Recommendation::rpayload', ['filter' => 'role:admin,data engineer,business user']);
$routes->get('/recommendation/rimeipayload', 'Recommendation::rimeipayload', ['filter' => 'role:admin,data engineer,business user']);


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
