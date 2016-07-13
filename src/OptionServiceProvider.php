<?php
namespace Juhedao\PackageName;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class OptionServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this->handleMigrations();
        $this->handleLibraries();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        // Bind any implementations.
        $this->app->bind('Option', function() {
            return new Option();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [];
    }

    private function handleLibraries() {
        $helpPath = __DIR__ .'/libraries/*.php';
        foreach(glob($helpPath) as $fileName){
            require_once($fileName);
        }
    }

    private function handleMigrations() {
        $this->publishes([__DIR__ . '/migrations' => base_path('database/migrations')]);
    }

}
