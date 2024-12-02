<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TariffRepositoryInterface;
use App\Models\Tariff;
use Illuminate\Database\Eloquent\Collection;

class TariffRepository implements TariffRepositoryInterface {
    public function getAll(): Collection
    {
        return Tariff::all();
    }

    public function create(array $tariffData): Tariff
    {
        $tariff = new Tariff();

        $tariff->name = $tariffData['name'];
        $tariff->type = $tariffData['type'];
        $tariff->baseCost = $tariffData['baseCost'] ?? 0;
        $tariff->additionalKwhCost = $tariffData['additionalKwhCost'] ?? 0;
        $tariff->includedKwh = $tariffData['includedKwh'] ?? 0;
        $tariff->save();

        return $tariff;
    }
}
