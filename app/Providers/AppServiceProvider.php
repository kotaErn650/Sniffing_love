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
        // Evitar que Faker se cargue en producción si no está instalado
        if ($this->app->environment('production') && !class_exists(\Faker\Factory::class)) {
            $this->app->bind(\Faker\Generator::class, function () {
                return new \App\Helpers\DummyDataGenerator; // Crea una clase alternativa si es necesario
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
