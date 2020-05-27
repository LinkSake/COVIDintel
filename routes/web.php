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
    Route::get('new/{id}', 'OrganizationController@new')->name('create_org');
    Route::post('new', 'OrganizationController@create');
    Route::get('edit/{id}', 'OrganizationController@edit');
    Route::post('edit', 'OrganizationController@update');
    Route::get('delete/{id}', 'OrganizationController@remove');
    Route::post('delete', 'OrganizationController@delete');
});

Route::group(['prefix'=>'user'], function() {
    Route::get('panel/{id}', 'UserController@overview')->name('board');
    Route::get('new', 'UserController@new');
    Route::get('admin/{admin}', 'UserController@new');
    Route::post('new', 'UserController@create');
    Route::get('edit/{id}/{admin?}', 'UserController@edit');
    Route::post('edit', 'UserController@update');
    Route::get('delete/{id}', 'UserController@remove');
    Route::post('delete', 'UserController@delete');
});

Route::group(['prefix'=>'rel'], function() {
    Route::get('new/{id}', 'UserOrgController@new');
    Route::post('new', 'UserOrgController@create');
    Route::get('delete/{id}/{user}/{rel}', 'UserOrgController@remove');
    Route::post('delete', 'UserOrgController@delete');
});
