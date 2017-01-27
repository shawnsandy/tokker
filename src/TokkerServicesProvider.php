<?php

namespace ShawnSandy\Tokker;

use Illuminate\Support\ServiceProvider;

/**
 * Class Provider
 *
 * @package ShawnSandy\PkgStart
 */
class TokkerServicesProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            include __DIR__ . '/routes.php';
        }

        /**
         * Package views
         */
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'tokker');
        $this->publishes(
            [
                __DIR__ . '/resources/views' => resource_path('views/vendor/tokker'),
            ], 'tokker-views'
        );

        /**
         * Package assets
         */
        $this->publishes(
            [
                __DIR__.'/resources/assets/js/' => public_path('assets/tokker/js/'),
                __DIR__.'/public/assets/' => public_path('assets/')
            ], 'tokker-assets'
        );

        /**
         * Package config
         */
        $this->publishes(
            [__DIR__ . '/config/config.php' => config_path('tokker.php')],
            'tokker-config'
        );

        if (!$this->app->runningInConsole()) :
            include_once __DIR__ . '/Helpers/helper.php';
        endif;


    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        /***  remove this line to uncomment and setup ****
       $this->mergeConfigFrom(
            __DIR__ . 'App/config/config.php', '__YOUR_KEY_NAME__'
        );
        $this->app->bind(
            '__YOUR_FACADE_NAME__', function () {
                return new YOUR_CLASS_NAME();
            }
        );
      *** remove this line to uncomment ***/
    }
}
