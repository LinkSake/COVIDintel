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

Route::group(['prefix'=>'login'], function() {
    Route::get('/', function () {
        return view('login');
    });
    Route::post('/', 'LoginController@login');
});

Route::group(['prefix'=>'org'], function() {
    Route::get('panel/{id_org}/{id_user}', 'OrganizationController@overview')->name('panel');
    Route::get('new', 'OrganizationController@new');
    Route::post('new', 'OrganizationController@create');
    Route::get('edit/{id}', 'OrganizationController@edit');
    Route::post('edit', 'OrganizationController@update');
    Route::get('delete/{id}', 'OrganizationController@remove');
    Route::post('delete', 'OrganizationController@delete');
});

Route::group(['prefix'=>'user'], function() {
    Route::get('panel/{id}', 'OrganizationController@overview')->name('board');
    Route::get('new', 'UserController@new');
    Route::post('new', 'UserController@create');
    Route::get('edit/{id}', 'UserController@edit');
    Route::post('edit', 'UserController@update');
    Route::get('delete/{id}', 'UserController@remove');
    Route::post('delete', 'UserController@delete');
});
