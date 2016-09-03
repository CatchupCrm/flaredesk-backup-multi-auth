<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AccessServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(
      \App\Services\User\UserServiceContract::class,
      \App\Services\User\UserService::class
    );
    $this->app->bind(
      \App\Services\Role\RoleServiceContract::class,
      \App\Services\Role\RoleService::class
    );
    $this->app->bind(
      \App\Services\Department\DepartmentServiceContract::class,
      \App\Services\Department\DepartmentService::class
    );
    $this->app->bind(
      \App\Services\Setting\SettingServiceContract::class,
      \App\Services\Setting\SettingService::class
    );
    $this->app->bind(
      \App\Services\Ticket\TicketServiceContract::class,
      \App\Services\Ticket\TicketService::class
    );
    $this->app->bind(
      \App\Services\Relation\RelationServiceContract::class,
      \App\Services\Relation\RelationService::class
    );
    $this->app->bind(
      \App\Services\Lead\LeadServiceContract::class,
      \App\Services\Lead\LeadService::class
    );
    $this->app->bind(
      \App\Services\Invoice\InvoiceServiceContract::class,
      \App\Services\Invoice\InvoiceService::class
    );
  }
}
