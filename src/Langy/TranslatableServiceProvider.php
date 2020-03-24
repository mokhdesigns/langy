<?php

namespace Mokhdesigns\Langy;

use Illuminate\Support\ServiceProvider;

class TranslatableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/langy.php' => config_path('langy.php'),
        ], 'langy');

        $this->loadMigrationsFrom(__DIR__.'/../tests/migrations/');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/langy.php', 'langy'
        );

        $this->registerTranslatableHelper();
    }

    public function registerTranslatableHelper()
    {
        $this->app->singleton('langy.locales', Locales::class);
        $this->app->singleton(Locales::class);
    }

    public function provides()
    {
        return [
            'translatable.helper',
            Locales::class,
        ];
    }
}
