<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Tiang;
use App\Controllers\Depan;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Depan::class,'view']);
$routes->get('tiang',[Tiang::class,'index']);
$routes->get('tiang/peta',[Tiang::class,'peta']);
$routes->get('tiang/new',[Tiang::class,'new']);
$routes->post('tiang',[Tiang::class,'create']);
$routes->get('tiang/(:segment)',[Tiang::class,'detail']);

