<?php

namespace Levana\Apricot;

use Illuminate\Support\ServiceProvider;

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
            __DIR__ . '../../config/apricot.php' => config_path('apricot.php')
        ]);
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
