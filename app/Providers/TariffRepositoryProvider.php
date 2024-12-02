<?php

namespace App\Providers;

use App\Interfaces\Repositories\TariffRepositoryInterface;
use App\Interfaces\Repositories\TariffTypeRepositoryInterface;
use App\Repositories\TariffRepository;
use App\Repositories\TariffTypeRepository;
use Illuminate\Support\ServiceProvider;

class TariffRepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TariffRepositoryInterface::class, TariffRepository::class);
        $this->app->bind(TariffTypeRepositoryInterface::class, TariffTypeRepository::class);
    }
}
