<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TariffTypeRepositoryInterface;
use App\Models\TariffType;
use Illuminate\Database\Eloquent\Collection;

class TariffTypeRepository implements TariffTypeRepositoryInterface {
    public function isExists(int $id): bool
    {
        return TariffType::where('id', '=', $id)->exists();
    }

    public function getAll(): Collection
    {
        return TariffType::all();
    }

    public function create(array $tariffTypeData): TariffType
    {
        $tariffType = new TariffType();

        $tariffType->name = $tariffTypeData['name'];
        $tariffType->id = $tariffTypeData['id'];
        $tariffType->save();

        return $tariffType;
    }
}
