<?php

namespace Dimsav\Translatable;

use Illuminate\Support\ServiceProvider;

class TranslatableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/langy.php' => config_path('langy.php'),
        ], 'translatable');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/langy.php', 'translatable'
        );

        $this->registerTranslatableHelper();
    }

    public function registerTranslatableHelper()
    {
        $this->app->singleton('translatable.locales', Locales::class);
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
