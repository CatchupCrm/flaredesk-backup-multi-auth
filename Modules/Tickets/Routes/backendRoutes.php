<?php
use Illuminate\Routing\Router;

/** @var Router $router */
Route::group(['prefix' => '/tickets'], function () {

  Route::resource('tickets', 'TicketsController');
  /**
   * TICKETS
   */
  Route::get('/data', 'TicketsController@anyData')->name('tickets.data');
  Route::patch('/updatestatus/{id}', 'TicketsController@updateStatus');
  Route::patch('/updateassign/{id}', 'TicketsController@updateAssign');
  Route::post('/updatetime/{id}', 'TicketsController@updateTime');
  Route::post('/invoice/{id}', 'TicketsController@invoice');
  Route::post('/comments/{id}', 'CommentController@store');

  // append
});
