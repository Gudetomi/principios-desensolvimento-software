<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\QAService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(QAService::class, function ($app) {
            return new QAService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
