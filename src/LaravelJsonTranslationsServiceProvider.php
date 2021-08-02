<?php

namespace AwStudio\LaravelJsonTranslations;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelJsonTranslationsServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravel-json-translations', function ($app) {
            return new JsonTranslations;
        });
    }

    /**
     * Boot application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('translations', function ($filename) {
            return '<script src="/' . str_replace(['"', "'"], '', $filename) . '.js"></script>';
        });
    }
}
