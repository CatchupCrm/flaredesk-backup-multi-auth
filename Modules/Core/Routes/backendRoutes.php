<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => ''], function() {
  /**
   * MAIN
   */
  Route::get('/', 'PagesController@dashboard');
  Route::get('dashboard', 'PagesController@dashboard')->name('dashboard');






  /**
   * DEPARTMENTS
   */
  Route::resource('departments', 'DepartmentsController');
  /**
   * INTEGRATIONS
   */
  Route::resource('integrations', 'IntegrationsController');
  /* SLACK */
  Route::get('integration/slack', 'IntegrationsController@slack');






});
