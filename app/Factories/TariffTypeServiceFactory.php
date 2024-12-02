<?php

namespace App\Factories;

use App\Exceptions\UnsupportedTariffTypeException;
use App\Interfaces\Services\TariffTypeServiceInterface;
use App\Models\Tariff;
use App\Services\BasicElectricityTariffService;
use App\Services\PackagedTariffService;

final class TariffTypeServiceFactory {
    public static function create(Tariff $tariff): TariffTypeServiceInterface
    {
        $typeId = $tariff->type;

        if (!isset(self::relations()[$typeId]) && !class_exists(self::relations()[$typeId])) {
            throw new UnsupportedTariffTypeException("Unsupported tariff type: {$typeId}");
        }

        $class = self::relations()[$tariff->type];

        return new $class();
    }

    private static function relations(): array
    {
        return [
            BasicElectricityTariffService::typeId() => BasicElectricityTariffService::class,
            PackagedTariffService::typeId() => PackagedTariffService::class
        ];
    }
}
