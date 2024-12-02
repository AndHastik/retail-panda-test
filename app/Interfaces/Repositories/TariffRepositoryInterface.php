<?php

namespace App\Interfaces\Repositories;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Collection;

interface TariffRepositoryInterface {
    public function getAll(): Collection;
    public function create(array $tariffData): Tariff;
}
