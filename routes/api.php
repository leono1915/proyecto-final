<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/*Route::get('cliente', 'ClientesController@ver');*/
//Route::post('productos', 'ProductosController@store');
Route::resource('productos', 'ProductosController');
Route::resource('clientes','ClientesController');
//Route::resource('cotizaciones','CotizaciontemporalController');
Route::resource('empleados','EmpleadosController');
Route::resource('orden','OrdencomprasController');
Route::resource('compras','HistorialcomprasController');
Route::resource('ventas','HistorialventasController');
Route::post('clientes/coincidencia', 'ClientesController@coincidencia');
Route::post('cotizaciones','CotizaciontemporalController@cotizacionPdf');

/*
Route::get('productos/{id}', 'ProductosController@showProduct');
