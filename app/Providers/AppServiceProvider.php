<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\FileManagerService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->singleton(FileManagerService::class, function ($app) {
        return new FileManagerService();
      });    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
