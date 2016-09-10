<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/auth/logout', 'Auth\LoginController@logout');
Route::group(['middleware' => 'web'], function () {
  //Route::auth();
});



//Admin Login
Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin/login', 'AdminAuth\LoginController@login');
Route::get('admin/logout', 'AdminAuth\LoginController@logout');

//Admin Register
Route::get('admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin/register', 'AdminAuth\RegisterController@register');

//Admin Passwords
Route::post('admin/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('admin/password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('admin/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');


//Staff Login
Route::get('staff/login', 'StaffAuth\LoginController@showLoginForm');
Route::post('staff/login', 'StaffAuth\LoginController@login');
Route::get('staff/logout', 'StaffAuth\LoginController@getLogmeout');

//Staff Register
Route::get('staff/register', 'StaffAuth\RegisterController@showRegistrationForm');
Route::post('staff/register', 'StaffAuth\RegisterController@register');

//Staff Passwords
Route::post('staff/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('staff/password/reset', 'StaffAuth\ResetPasswordController@reset');
Route::get('staff/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('staff/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm');


//Customer Login
Route::get('customer/login', 'CustomerAuth\LoginController@showLoginForm');
Route::post('customer/login', 'CustomerAuth\LoginController@login');
Route::get('customer/logout', 'CustomerAuth\LoginController@logout');

//Customer Register
Route::get('customer/register', 'CustomerAuth\RegisterController@showRegistrationForm');
Route::post('customer/register', 'CustomerAuth\RegisterController@register');

//Customer Passwords
Route::post('customer/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('customer/password/reset', 'CustomerAuth\ResetPasswordController@reset');
Route::get('customer/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('customer/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');

