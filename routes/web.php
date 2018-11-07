<?php

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


Auth::routes();

Route::get('/', [ 'as' => 'usuarios','uses' => 'employeesController@index', 'middleware' => 'auth']);

Route::get('addemployees', [ 'as' => 'usuarios','uses' => 'employeesController@add', 'middleware' => 'auth']);

Route::get('employees/{id}', [ 'as' => 'usuarios','uses' => 'employeesController@edit', 'middleware' => 'auth']);

Route::delete('employees/{id}', ['uses' => 'employeesController@destroy', 'middleware' => 'auth']);

Route::post('employees', ['uses' => 'employeesController@store', 'middleware' => 'auth']);

Route::post('employees/{id}', ['uses' => 'employeesController@update', 'middleware' => 'auth']);
