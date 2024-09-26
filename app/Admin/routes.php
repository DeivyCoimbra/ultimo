<?php

use Illuminate\Routing\Router;
use OpenAdmin\Admin\Facades\Admin;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\TipoController;
use App\Admin\Controllers\PersonaController;
use App\Admin\Controllers\ReporteController;
use App\Admin\Controllers\MantenimientoController;
use App\Admin\Controllers\ReservacionSalonSocialController;
use App\Admin\Controllers\ReservacionChurrasqueraController;
use App\Admin\Controllers\ListaSalonSocialController;
use App\Admin\Controllers\ListaChurrasqueraController;

use App\Admin\Controllers\MultaController;
use App\Admin\Controllers\CorteController;
use App\Admin\Controllers\TorreController;
use App\Admin\Controllers\IndividuoController;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->resource('torres', TorreController::class);
    $router->resource('individuos', IndividuoController::class);
    $router->get('/', 'HomeController@index')->name('home');

Route::resource('personas', PersonaController::class);
Route::resource('tipos', TipoController::class);
Route::resource('reportes', ReporteController::class);
Route::resource('mantenimientos', MantenimientoController::class);
Route::resource('reservaciones_salon_social', ReservacionSalonSocialController::class);
Route::resource('reservaciones_churrasquera', ReservacionChurrasqueraController::class);
Route::resource('lista_salon_social', ListaSalonSocialController::class);
Route::resource('lista_churrasquera', ListaChurrasqueraController::class);
$router->resource('cortes', CorteController::class);
$router->resource('multas', MultaController::class);
});