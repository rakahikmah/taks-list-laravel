<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            $this->app->singleton('migrate', function () {
                return new class {
                    public function __invoke(array $arguments)
                    {
                        throw new \RuntimeException('Migrate is disabled in production!');
                    }
                };
            });
        }
    }
}

