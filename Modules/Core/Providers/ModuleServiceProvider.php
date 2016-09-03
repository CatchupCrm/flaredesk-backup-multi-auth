<?php

namespace Modules\Core\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'core');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'core');
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
    $this->app->bind(
      'Modules\Core\Services\CoreRepository',
      function () {
        $service = new \Modules\Core\Services\CoreService(new \Modules\Core\Models\Core());
        return $service;

      }
    );
    // add bindings
  }
}
