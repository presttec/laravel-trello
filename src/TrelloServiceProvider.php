<?php

declare(strict_types=1);

namespace PrestTEC\Trello;

use PrestTEC\Trello\Adapter\GuzzleHttpAdapter;
use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class TrelloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath($raw = __DIR__ . '/../config/trello.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('trello.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('trello');
        }

        $this->mergeConfigFrom($source, 'trello');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerClient();

        $this->registerManager();
    }

    /**
     * Register HttpClient.
     */
    public function registerClient()
    {
        $this->app->singleton('trello.client', function () {
            return new GuzzleHttpAdapter();
        });

        $this->app->alias('trello.client', GuzzleHttpAdapter::class);
    }

    /**
     * Register Manager.
     */
    public function registerManager()
    {
        $this->app->singleton('trello', function (Container $app) {
            $config = $app['config'];
            $client = $app['trello.client'];

            return new TrelloManager($config, $client);
        });

        $this->app->alias('trello', TrelloManager::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            'trello.client',
            'trello',
        ];
    }
}
