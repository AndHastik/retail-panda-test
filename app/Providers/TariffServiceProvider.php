<?php

namespace App\Providers;

use App\Interfaces\Services\TariffServiceInterface;
use App\Services\TariffService;
use Illuminate\Support\ServiceProvider;

class TariffServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TariffServiceInterface::class, TariffService::class);
    }
}
