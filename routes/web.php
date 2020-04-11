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

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('permissions', 'PermissionsController');

    Route::resource('roles', 'RolesController');

    Route::resource('users', 'UsersController');

    Route::resource('drinks-types', 'DrinksTypesController');

    Route::resource('drinks', 'DrinksController');
    Route::get('drinks/{drink_id}/complete', 'DrinksController@complete')->name('drinks.complete');
});
