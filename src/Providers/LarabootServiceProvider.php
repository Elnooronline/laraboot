<?php

namespace Laraboot\Providers;

use Laraboot\Forms\Form;
use Illuminate\Support\ServiceProvider;
use Laraboot\Forms\Directives\FormDirectives;

class LarabootServiceProvider extends ServiceProvider
{
    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfig();

        $this->publishViews();

        $this->publishTranslations();

        $this->publishScaffolding();

        $this->loadViews();

        $this->loadTranslations();

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

        $this->app->bind('laraboot.locales', function() {
            return config('laraboot.locales');
        });

        $this->app->singleton('laraboot.manager', function() {
            return new LaravelAdminLteManager(config('laraboot-panel'));
        });
    }

    /**
     * Publish config.
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom($this->packagePath('config/laraboot.php'), 'laraboot');
        $this->mergeConfigFrom($this->packagePath('config/breadcrumbs.php'), 'breadcrumbs');
        $this->mergeConfigFrom($this->packagePath('config/laraboot-panel.php'), 'laraboot-panel');
    }

    /**
     * Publish view files for forms and panel.
     */
    protected function publishViews()
    {
        $this->publishes([
            $this->packagePath('resources/views/forms') => resource_path('views/vendor/laraboot/forms'),
        ], 'laraboot-forms');

        $this->publishes([
            $this->packagePath('resources/views/panel') => resource_path('views/vendor/laraboot/panel'),
        ], 'laraboot-panel');
    }

    /**
     * Publish the scaffolding scaffolding for installing laraboot.
     *
     * @return void
     */
    private function publishScaffolding()
    {
        $larabootPath = $this->packagePath('config/laraboot.php');
        $breadcrumbsPath = $this->packagePath('config/breadcrumbs.php');
        $larabootPanelPath = $this->packagePath('config/laraboot-panel.php');

        $this->publishes([
            // Publish configuration files.
            $larabootPath => config_path('laraboot.php'),
            $breadcrumbsPath => config_path('breadcrumbs.php'),
            $larabootPanelPath => config_path('laraboot-panel.php'),
            // Publish view files.
            $this->packagePath('resources/stubs/auth/login.blade.php.stub') => base_path('resources/views/auth/login.blade.php'),
            $this->packagePath('resources/stubs/auth/register.blade.php.stub') => base_path('resources/views/auth/register.blade.php'),
            $this->packagePath('resources/stubs/auth/passwords/email.blade.php.stub') => base_path('resources/views/auth/passwords/email.blade.php'),
            $this->packagePath('resources/stubs/auth/passwords/reset.blade.php.stub') => base_path('resources/views/auth/passwords/reset.blade.php'),
            $this->packagePath('resources/stubs/home.blade.php.stub') => base_path('resources/views/home.blade.php'),
            // Publish breadcrumbs.
            $this->packagePath('routes/breadcrumbs.php') => base_path('routes/breadcrumbs.php'),
            // Publish public assets.
            $this->packagePath('public') => public_path('/vendor/laraboot')
        ], 'laraboot-scaffolding');
    }

    /**
     * Publish translation files.
     *
     * @return void
     */
    private function publishTranslations()
    {
        $this->publishes([
            $this->packagePath('resources/lang') => base_path('resources/lang/vendor/laraboot'),
        ], 'laraboot-translations');
    }

    /**
     * Load the translation files.
     *
     * @return void
     */
    private function loadTranslations()
    {
        $this->loadTranslationsFrom($this->packagePath('resources/lang'), 'laraboot');
    }

    /**
     * Load the views.
     *
     * @return void
     */
    protected function loadViews()
    {
        $this->loadViewsFrom($this->packagePath('resources/views'), 'laraboot');
    }

    /**
     * Change the default behave to only publish if running in console.
     *
     * @param array $paths
     * @param null $group
     * @return void
     */
    protected function publishes(array $paths, $group = null)
    {
        if ($this->app->runningInConsole()) {
            parent::publishes($paths, $group);
        }
    }


    /**
     * @param $path
     * @return string
     */
    private function packagePath($path)
    {
        return __DIR__.'/../../'.$path;
    }
}
