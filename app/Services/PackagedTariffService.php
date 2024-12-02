<?php

namespace App\Services;

use App\Interfaces\Services\TariffTypeServiceInterface;
use App\Models\Tariff;
use App\Traits\CurrencyTrait;

class PackagedTariffService implements TariffTypeServiceInterface {
    use CurrencyTrait;

    private const TYPE_ID = 2;
    private const MONTHS_COUNT = 12;

    public static function typeId(): int
    {
        return self::TYPE_ID;
    }

    public function calculateAnnualCosts(Tariff $tariff, int $consumption): int|float
    {
        if ($consumption <= $tariff->includedKwh) {
            return $tariff->baseCost;
        }

        $akc = $this->convertEurosToCents($tariff->additionalKwhCost);

        $additionalConsumption = $consumption - $tariff->includedKwh;

        return $tariff->baseCost + ($akc * $additionalConsumption);
    }
}
