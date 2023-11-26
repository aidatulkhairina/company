<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\Dashboard::index');

$routes->get('dashboard', 'Admin\Dashboard::index');

$routes->get('produk', 'Admin\Produk::index');

$routes->get('daftar-produk', 'Admin\Produk::index');

$routes->get('daftar-kategori', 'Admin\Produk::kategori');
$routes->post('daftar-kategori/tambah', 'Admin\Produk::store');
$routes->post('daftar-kategori/edit/(:num)', 'Admin\Produk::update/$1');
$routes->post('daftar-kategori/delete/(:num)', 'Admin\Produk::destroy/$1');