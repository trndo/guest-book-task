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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['check.is_admin'])->namespace('Admin')->prefix('admin')
    ->group(function () {
        Route::delete('messages/{message}', 'MessageController@destroy')
            ->name('admin.message.destroy');

        Route::patch('users/{user}', 'UserController@toggleBan')
            ->name('admin.user.toggleBan');
});

Route::get('/users/{user}', 'UserController@show')->name('user.show');

Route::middleware(['auth','check.is_banned'])->post('/messages', 'MessageController@store')
    ->name('message.store');