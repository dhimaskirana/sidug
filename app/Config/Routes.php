<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->add('/data-saya', 'DataUmat::data_saya');
$routes->get('/statistik', 'Statistik::index');

// Kelola Pengguna Routes
$routes->group(
    '',
    ['filter' => 'group:admin'],
    static function ($routes) {
        $routes->get('/pengguna', 'Pengguna::index');
        $routes->add('/pengguna/tambah', 'Pengguna::tambah');
        $routes->add('/pengguna/edit/(:any)', 'Pengguna::edit/$1');
        $routes->add('/pengguna/update-password/(:any)', 'Pengguna::update_password/$1');
        $routes->get('/pengguna/delete/(:any)', 'Pengguna::delete/$1');

        $routes->get('/data-umat', 'DataUmat::index');
        $routes->add('/data-umat/tambah', 'DataUmat::tambah');
        $routes->add('/data-umat/edit/(:any)', 'DataUmat::edit/$1');
        $routes->get('/data-umat/delete/(:any)', 'DataUmat::delete/$1');
    }
);

service('auth')->routes($routes);
