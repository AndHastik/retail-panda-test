<?php

namespace App\Services;

use App\Interfaces\Services\TariffTypeServiceInterface;
use App\Models\Tariff;
use App\Traits\CurrencyTrait;

class BasicElectricityTariffService implements TariffTypeServiceInterface {
    use CurrencyTrait;

    private const TYPE_ID = 1;
    private const MONTHS_COUNT = 12;

    public static function typeId(): int
    {
        return self::TYPE_ID;
    }

    public function calculateAnnualCosts(Tariff $tariff, int $consumption): int|float
    {
        $akc = $this->convertEurosToCents($tariff->additionalKwhCost);

        return ($tariff->baseCost * self::MONTHS_COUNT) + ($akc * $consumption);
    }
}
