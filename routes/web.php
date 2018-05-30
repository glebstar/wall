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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/register-success', 'RegisterController@success');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('index');
    });

    Route::post('/addpost', 'HomeController@addPost')->name('addpost');
});
