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
            $this->srcPath('config/laraboot-forms.php') => config_path('laraboot-forms.php'),
        ]);

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
        $this->app->bind('laraboot.form', function () {
            return Form::getInstance();
        });

        $this->mergeConfigFrom(
            $this->srcPath('config/laraboot-forms.php'), 'laraboot-forms'
        );
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
