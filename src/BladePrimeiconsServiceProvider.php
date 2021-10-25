<?php

declare(strict_types=1);

namespace Codeat3\BladePrimeicons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladePrimeiconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-prime-icons', []);

            $factory->add('prime-icons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-prime-icons.php', 'blade-prime-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-prime-icons'),
            ], 'blade-prime-icons');

            $this->publishes([
                __DIR__.'/../config/blade-prime-icons.php' => $this->app->configPath('blade-prime-icons.php'),
            ], 'blade-prime-icons-config');
        }
    }
}
