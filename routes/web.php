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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware(['auth'])->group(
    function () {
        Route::resource('/projects', 'ProjectController');
        Route::resource('/profile', 'ProfileController', ['only' => ['show']]);
    }
);
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(
    function () {
        Route::resource('/', 'AdminController', ['only' => ['index']]);
        Route::resource('/projects', 'ProjectController', ['only' => ['index', 'create']]);
        Route::resource('/users', 'UserController', ['only' => ['index', 'create', 'edit', 'destroy']]);
        // Route::resource('/teams', 'TeamsController');
        // Route::resource('/servers', 'ServersController');
        // Route::resource('/identities', 'IdentityController');
    }
);
