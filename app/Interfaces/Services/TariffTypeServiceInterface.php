<?php

namespace App\Interfaces\Services;

use App\Models\Tariff;

interface TariffTypeServiceInterface {
    public static function typeId(): int;
    public function calculateAnnualCosts(Tariff $tariff, int $consumption): int|float;
}
