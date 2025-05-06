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
    if ($this->app->environment('production')) {
        $this->app->bind(\Faker\Generator::class, function () {
            return new class {
                // Mock básico para evitar errores
                public function name() { return 'Mock User'; }
                public function email() { return 'mock@example.com'; }
            };
        });
    }
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
