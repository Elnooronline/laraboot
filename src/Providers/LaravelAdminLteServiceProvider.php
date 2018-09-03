<?php

namespace Elnooronline\LaravelAdminLte\Providers;

use Illuminate\Support\ServiceProvider;
use Elnooronline\LaravelAdminLte\LaravelAdminLteManager;

class LaravelAdminLteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('adminlte.manager', function() {
            return new LaravelAdminLteManager(config('adminlte'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();

        $this->publishBreadcrumbs();

        $this->publishViews();

        $this->publishAuthScaffolding();

        $this->loadViews();

        $this->loadTranslations();

        $this->publishTranslations();

        $this->publishAssets();
    }

    /**
     * Publish the configuration files.
     *
     * @return void
     */
    private function publishConfig()
    {
        $adminltePath = $this->packagePath('config/adminlte.php');
        $breadcrumbsPath = $this->packagePath('config/breadcrumbs.php');

        $this->publishes([
            $adminltePath => config_path('adminlte.php'),
            $breadcrumbsPath => config_path('breadcrumbs.php'),
        ], 'adminlte-config');

        $this->mergeConfigFrom($adminltePath, 'adminlte');
        $this->mergeConfigFrom($breadcrumbsPath, 'breadcrumbs');
    }

    /**
     * Publish breadcrumbs definition files.
     *
     * @return void
     */
    private function publishBreadcrumbs()
    {
        $this->publishes([
            $this->packagePath('routes/breadcrumbs.php') => base_path('routes/breadcrumbs.php'),
        ], 'adminlte-breadcrumbs');
    }

    /**
     * Define the views aliases.
     */
    private function loadViews()
    {
        $this->loadViewsFrom($this->packagePath('resources/views'), 'adminlte');
    }

    /**
     * Publish the views.
     *
     * @return void
     */
    private function publishViews()
    {
        $this->publishes([
            $this->packagePath('resources/views') => base_path('resources/views/vendor/adminlte'),
        ], 'adminlte-views');
    }

    /**
     * Publish the auth scaffolding.
     *
     * @return void
     */
    private function publishAuthScaffolding()
    {
        $this->publishes([
            $this->packagePath('resources/stubs/auth/login.blade.php.stub') => base_path('resources/views/auth/login.blade.php'),
            $this->packagePath('resources/stubs/auth/register.blade.php.stub') => base_path('resources/views/auth/register.blade.php'),
            $this->packagePath('resources/stubs/auth/passwords/email.blade.php.stub') => base_path('resources/views/auth/passwords/email.blade.php'),
            $this->packagePath('resources/stubs/auth/passwords/reset.blade.php.stub') => base_path('resources/views/auth/passwords/reset.blade.php'),
            $this->packagePath('resources/stubs/home.blade.php.stub') => base_path('resources/views/home.blade.php'),
        ], 'adminlte-auth');
    }

    /**
     * Load the translation files.
     *
     * @return void
     */
    private function loadTranslations()
    {
        $this->loadTranslationsFrom($this->packagePath('resources/lang'), 'adminlte');
    }

    /**
     * Publish translation files.
     *
     * @return void
     */
    private function publishTranslations()
    {
        $this->publishes([
            $this->packagePath('resources/lang') => base_path('resources/lang/vendor/adminlte'),
        ], 'adminlte-translations');
    }

    /**
     * Publish adminlte assets.
     */
    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('public') => public_path('/vendor/adminlte'),
        ], 'adminlte-assets');
    }

    /**
     * Generate a path relative to the package root directory.
     *
     * @param $path
     * @return string
     */
    private function packagePath($path)
    {
        return __DIR__."/../../$path";
    }
}

