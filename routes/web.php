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

Route::delete('/admin/messages/{message}', 'Admin\MessageController@destroy')
    ->name('delete.message');

Route::patch('/admin/users/{user}', 'Admin\UserController@ban')
    ->name('ban.user');

Route::get('/users/{user}', 'UserController@show')->name('show.user');

Route::post('/messages', 'MessageController@store')->name('message.store');