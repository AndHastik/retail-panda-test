<?php

namespace App\Interfaces\Services;

interface TariffServiceInterface {
    public function setConsumption(int $value): void;
    public function compareProducts(): array;
}
