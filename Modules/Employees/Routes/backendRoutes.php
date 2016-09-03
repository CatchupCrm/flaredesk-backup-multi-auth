<?php
use Illuminate\Routing\Router;

/** @var Router $router */
Route::group(['prefix' => '/employees'], function () {

  Route::resource('employees', 'EmployeesController');
  /**
   * EMPLOYEES
   */
  Route::get('/data', 'EmployeesController@anyData')->name('employees.data');
  Route::get('/ticketdata/{id}', 'EmployeesController@ticketData')->name('employees.ticketdata');
  Route::get('/closedticketdata/{id}', 'EmployeesController@closedTicketData')->name('employees.closedticketdata');
  Route::get('/relationdata/{id}', 'EmployeesController@relationData')->name('employees.relationdata');

  // append
});
