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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/photo/{id}/store', 'PhotoController@store')->name('photo.store');
Route::delete('/photo/{photo}/destroy', 'PhotoController@destroy')->name('photo.destroy');

Route::resource('albums', 'AlbumController')->except([
    'index', 'show',
]);

