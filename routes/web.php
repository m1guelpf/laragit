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
// Redirect to Github for authorization
Route::get('login', 'LoginController@authorizeUser');

// Facebook redirects here after authorization
Route::get('callback', 'LoginController@loginUser');
Route::get('logout', 'LoginController@logoutUser');
