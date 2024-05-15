<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/absen', 'Absen::index');
$routes->post('/clock_in', 'Absen::clock_in');
$routes->post('/clock_out', 'Absen::clock_out');
$routes->get('/aktivitas', 'Aktivitas::index');
$routes->post('/tambah_aktivitas', 'Aktivitas::tambah_aktivitas');
$routes->post('/clock_out/(:num)', 'Absen::clock_out/$1');
$routes->get('/users', 'Users::index');
$routes->post('/edit/(:num)', 'Users::edit/$1');
$routes->post('/hapus/(:num)', 'Users::hapus/$1');
$routes->post('/laporan', 'Laporan::index');
$routes->get('/laporan_user/(:num)', 'LaporanUser::index/$1');
$routes->post('/edit_aktivitas/(:num)', 'Aktivitas::edit_aktivitas/$1');
$routes->get('/cetak', 'Cetak::index');
$routes->post('/filter_absen', 'Cetak::filter');
$routes->get('/login_pembimbing', 'Login::index_pembimbing');
$routes->get('/gantipass', 'GantiPass::index');
$routes->post('/ganti_password', 'GantiPass::ganti_password');
$routes->get('/gantipassuser', 'GantiPassUser::index');
$routes->post('/ganti_password_user', 'GantiPassUser::ganti_password');
$routes->post('/ganti_password_edit', 'GantiPassUser::ganti_password_edit');


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
