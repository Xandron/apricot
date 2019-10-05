<?php

namespace Levana\Apricot;

use Illuminate\Support\ServiceProvider;
use Levana\Apricot\Console\InstallCommand;

/**
 * Class ApricotServiceProvider
 * @package Levana\Apricot
 */
class ApricotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getPublishes();

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->getMergeConfigFrom();
    }

    /**
     *
     */
    protected function getPublishes(): void
    {
        $this->publishes([
            __DIR__ . '../../config/apricot.php' => config_path('apricot.php'),
        ], 'apricot:config');
    }

    /**
     *
     */
    protected function getMergeConfigFrom(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '../../config/apricot.php',
            'apricot'
        );
    }
}
