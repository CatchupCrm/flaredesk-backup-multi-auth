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
Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');
Route::group(['middleware' => ['auth']], function () {
  /**
   * MAIN
   */
  Route::get('/', 'PagesController@dashboard');
  Route::get('dashboard', 'PagesController@dashboard')->name('dashboard');
  /**
   * USERS
   */
  Route::get('users/data', 'UsersController@anyData')->name('users.data');
  Route::get('users/ticketdata/{id}', 'UsersController@ticketData')->name('users.ticketdata');
  Route::get('users/closedticketdata/{id}', 'UsersController@closedTicketData')->name('users.closedticketdata');
  Route::get('users/relationdata/{id}', 'UsersController@relationData')->name('users.relationdata');
  Route::resource('users', 'UsersController');
  /* ROLES */
  Route::resource('roles', 'RolesController');
  /**
   * CLIENTS
   */
  Route::get('relations/data', 'RelationsController@anyData')->name('relations.data');
  Route::post('relations/create/cvrapi', 'RelationsController@cvrapiStart');
  Route::post('relations/upload/{id}', 'DocumentsController@upload');
  Route::resource('relations', 'RelationsController');
  /**
   * TASKS
   */
  Route::get('tickets/data', 'TicketsController@anyData')->name('tickets.data');
  Route::patch('tickets/updatestatus/{id}', 'TicketsController@updateStatus');
  Route::patch('tickets/updateassign/{id}', 'TicketsController@updateAssign');
  Route::post('tickets/updatetime/{id}', 'TicketsController@updateTime');
  Route::post('tickets/invoice/{id}', 'TicketsController@invoice');
  Route::resource('tickets', 'TicketsController');
  Route::post('tickets/comments/{id}', 'CommentController@store');
  /**
   * LEADS
   */
  Route::get('leads/data', 'LeadsController@anyData')->name('leads.data');
  Route::patch('leads/updateassign/{id}', 'LeadsController@updateAssign');
  Route::resource('leads', 'LeadsController');
  Route::post('leads/notes/{id}', 'NotesController@store');
  Route::patch('leads/updatestatus/{id}', 'LeadsController@updateStatus');
  Route::patch('leads/updatefollowup/{id}', 'LeadsController@updateFollowup')->name('leads.followup');
  /**
   * SETTINGS
   */
  Route::get('settings', 'SettingsController@index')->name('settings.index');
  Route::patch('settings/permissionsUpdate', 'SettingsController@permissionsUpdate');
  Route::patch('settings/overall', 'SettingsController@updateOverall');
  /**
   * DEPARTMENTS
   */
  Route::resource('departments', 'DepartmentsController');
  /**
   * INTEGRATIONS
   */
  Route::resource('integrations', 'IntegrationsController');
  /* SLACK */
  Route::get('Integration/slack', 'IntegrationsController@slack');
  /**
   * NOTIFICATIONS
   */
  Route::get('notifications/getall', 'NotificationsController@getAll')->name('notifications.get');
  Route::post('notifications/markread', 'NotificationsController@markRead');
  Route::get('notifications/markall', 'NotificationsController@markAll');
  /**
   * INVOICES
   */
  Route::resource('invoices', 'InvoicesController');
  Route::post('invoice/updatepayment/{id}', 'InvoicesController@updatePayment')->name('invoice.payment.date');
  Route::post('invoice/reopenpayment/{id}', 'InvoicesController@reopenPayment')->name('invoice.payment.reopen');
  Route::post('invoice/sentinvoice/{id}', 'InvoicesController@updateSentStatus')->name('invoice.sent');
  Route::post('invoice/reopensentinvoice/{id}', 'InvoicesController@updateSentReopen')->name('invoice.sent.reopen');
  Route::post('invoice/newitem/{id}', 'InvoicesController@newItem')->name('invoice.new.item');
  /**
   * IMPORT AND EXPORT
   */
  Route::get('documents/import', 'DocumentsController@import');

});