<?php

namespace Dfytech\Weather;

use Illuminate\Support\ServiceProvider;
use DfyTech\Weather\Console\InstallationCommand;

class WeatherServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerCommand();
        $this->registerTranslations();
        $this->registerConfig();
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations/');
        $this->loadRoutesFrom(__DIR__. '/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'weather');
    }

    public function register()
    {

    }
    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig() 
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('weather.php'),
        ], 'weather');        
    }
    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'weather');
    }

    /**
     * Register Command.
     *
     * @return void
     */
    public function registerCommand () {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallationCommand::class,
            ]);
        }
    }
}