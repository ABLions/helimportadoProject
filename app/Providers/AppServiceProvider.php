<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PreAlertaRepositoryInterface;
use App\Repositories\PreAlertaRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PreAlertaRepositoryInterface::class, PreAlertaRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
