<?php

namespace Laraboot\Providers;

use Laraboot\Forms\Form;
use Illuminate\Support\ServiceProvider;
use Laraboot\Forms\Directives\FormDirectives;

class LarabootFormsProvider extends ServiceProvider
{
    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom($this->srcPath('resources/views'), 'laraboot');

        $this->publishes([
            $this->srcPath('config/laraboot.php') => config_path('laraboot.php'),
        ], 'laraboot-config');

        $this->publishes([
            $this->srcPath('resources/views/forms') => resource_path('views/vendor/laraboot/forms'),
        ], 'laraboot-forms');

        FormDirectives::register();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            $this->srcPath('config/laraboot.php'),
            'laraboot'
        );

        $this->app->bind('laraboot.form', function () {
            return Form::getInstance();
        });

        $this->app->bind('laraboot.locales', function() {
            return config('laraboot.locales');
        });
    }

    /**
     * @param $path
     * @return string
     */
    private function srcPath($path)
    {
        return __DIR__.'/../'.$path;
    }
}
