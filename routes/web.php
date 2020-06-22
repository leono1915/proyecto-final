<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});
//Route::get('/productos','ProductosController@view');
Auth::routes();
Route::get('/productos', 'ProductosController@vistaProductos');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clientes', 'ClientesController@verClientes');

Route::get('/cotizador',function (){
    return view('cotizador');
});

Route::get('cotizar/{id}','CotizaciontemporalController@vistaCotizacion');

//Route::get('/venta','CotizaciontemporalController@ventaPdf')->name('venta.pdf');