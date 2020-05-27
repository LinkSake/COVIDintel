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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'dato'], function(){
    Route::get('listado', 'DatosController@list');
    Route::get('nuevo', 'DatosController@new');
    Route::post('nuevo', 'DatosController@create');
    Route::get('editar/{id}', 'DatosController@edit');
    Route::post('editar', 'DatosController@update');
    Route::get('eliminar/{id}', 'DatosController@remove');
    Route::post('eliminar', 'DatosController@delete');
});
