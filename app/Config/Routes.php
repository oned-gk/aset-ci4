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
$routes->get('tiang/edit/(:segment)','Tiang::edit/$1');
$routes->delete('tiang/(:num)','Tiang::delete/$1');
$routes->post('tiang',[Tiang::class,'insert']);
$routes->get('tiang/(:any)',[Tiang::class,'detail']);

