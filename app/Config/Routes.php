<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BarangController::index');

$routes->get('/kategori', 'KategoriController::index');
$routes->get('/kategori/create', 'KategoriController::create');
$routes->post('/kategori/store', 'KategoriController::store');
$routes->get('/kategori/edit/(:num)', 'KategoriController::edit/$1');
$routes->post('/kategori/update/(:num)', 'KategoriController::update/$1');
$routes->delete('/kategori/delete/(:num)', 'KategoriController::delete/$1');


$routes->get('/lokasi', 'LokasiController::index'); // Menampilkan daftar lokasi
$routes->get('/lokasi/create', 'LokasiController::create'); // Menampilkan form tambah lokasi
$routes->post('/lokasi/store', 'LokasiController::store'); // Menyimpan data lokasi
$routes->get('/lokasi/edit/(:num)', 'LokasiController::edit/$1'); // Menampilkan form edit
$routes->post('/lokasi/update/(:num)', 'LokasiController::update/$1'); // Menyimpan perubahan
$routes->delete('/lokasi/delete/(:num)', 'LokasiController::delete/$1'); // Menghapus lokasi


$routes->get('/barang', 'BarangController::index'); // Menampilkan daftar barang
$routes->get('/barang/create', 'BarangController::create'); // Menampilkan form tambah barang
$routes->post('/barang/store', 'BarangController::store'); // Menyimpan data barang
$routes->get('/barang/edit/(:segment)', 'BarangController::edit/$1'); // Menampilkan form edit barang
$routes->post('/barang/update/(:segment)', 'BarangController::update/$1'); // Menyimpan perubahan barang
$routes->get('/barang/delete/(:segment)', 'BarangController::delete/$1'); // Menghapus barang
