<?php
namespace Modules\Calendar\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the module services.
   *
   * @return void
   */
  public function boot()
  {
    $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'calendar');
    $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'calendar');
  }

  /**
   * Register the module services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->register(RouteServiceProvider::class);
    //$this->registerBindings();
  }

  private function registerBindings()
  {
    $this->app->bind('Modules\Calendar\Services\Calendar\CalendarServiceContract', 'Modules\Calendar\Services\Calendar\CalendarService');
    // add bindings
  }
}
