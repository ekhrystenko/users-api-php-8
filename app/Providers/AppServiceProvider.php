<?php

namespace App\Providers;

use App\Http\Interfaces\CrudServiceInterface;
use App\Http\Services\Api\CrudService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrudServiceInterface::class, CrudService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
