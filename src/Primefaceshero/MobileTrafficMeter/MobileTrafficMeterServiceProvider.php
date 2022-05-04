<?php 

namespace Primefaceshero\MobileTrafficMeter;

use Illuminate\Support\ServiceProvider;

class MobileTrafficMeterServiceProvider extends ServiceProvider {

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
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'MobileTrafficMeter');
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function bootForConsole()
    {
        // Publishing the views.
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/primefaceshero'),
        ], 'MobileTrafficMeter.views');
    }


}
