<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Tiang;
use App\Controllers\Depan;
use App\Controllers\Wilayah;
use App\Controllers\Kelurahan;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Depan::class,'view']);
$routes->get('tiang',[Tiang::class,'index']);
$routes->get('tiang/peta',[Tiang::class,'peta']);
$routes->get('tiang/new',[Tiang::class,'new']);
$routes->get('tiang/edit/(:segment)','Tiang::edit/$1');
$routes->delete('tiang/(:num)','Tiang::delete/$1');
$routes->post('tiang/insert',[Tiang::class,'insert']);
$routes->post('tiang/update/(:num)','Tiang::update/$1');
$routes->get('tiang/kabkot', [Tiang::class,'kabkot']);
$routes->get('tiang/(:num)',[Tiang::class,'detail']);
$routes->get('wilayah',[Wilayah::class,'index']);
$routes->post('wilayah/kabkot',[Wilayah::class,'kabkot']);
$routes->get('kelurahan',[Kelurahan::class,'index']);
$routes->post('kelurahan/getkelurahan',[Kelurahan::class,'getkelurahan']);
// $routes->get('/', 'WilayahController::index');
// $routes->post('wilayah/getKabKot', 'WilayahController::getKabKot');