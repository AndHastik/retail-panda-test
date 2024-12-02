<?php

namespace App\Interfaces\Repositories;

use App\Models\TariffType;
use Illuminate\Database\Eloquent\Collection;

interface TariffTypeRepositoryInterface {
    public function isExists(int $id): bool;
    public function getAll(): Collection;
    public function create(array $tariffTypeData): TariffType;
}
