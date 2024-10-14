<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Tiang;
use App\Controllers\Depan;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Depan::class,'view']);
$routes->get('tiang',[Tiang::class,'index']);
$routes->get('tiang/baru',[Tiang::class,'baru']);
$routes->post('tiang',[Tiang::class,'tambah']);
$routes->get('tiang/(:segment)',[Tiang::class,'index']);

