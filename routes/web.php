<?php

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Home Route
Route::get('/', 'HomeController@showHome');
// Auth Routes
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@authorizeUser');
Route::get('callback', 'LoginController@loginUser');
Route::post('logout', 'LoginController@logoutUser');
// Dashboard
Route::get('dashboard', 'DashboardController@showDashboard');
// Mail
Route::get('mail/welcome', 'MailController@sendWelcome');
Route::get('mail/unsubscribe', 'MailController@showUnsubscribe');
Route::post('mail/unsubscribe', 'MailController@unsubscribe');
Route::get('mail/unsubscribed', 'MailController@showUnsubscribed');
// Other
Route::get('wip', function () {
    echo 'This part of the site is not working yet, check back soon!';
});
