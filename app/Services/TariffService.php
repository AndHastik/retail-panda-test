<?php

namespace App\Services;

use App\Factories\TariffTypeServiceFactory;
use App\Interfaces\Repositories\TariffRepositoryInterface;
use App\Interfaces\Repositories\TariffTypeRepositoryInterface;
use App\Interfaces\Services\TariffServiceInterface;

class TariffService  implements TariffServiceInterface {
    private int $consumption = 0;

    private TariffRepositoryInterface $tariffRepository;
    private TariffTypeRepositoryInterface $tariffTypeRepository;

    public function __construct(
        TariffRepositoryInterface $tariffRepository,
        TariffTypeRepositoryInterface $tariffTypeRepository
    ) {
        $this->tariffRepository = $tariffRepository;
        $this->tariffTypeRepository = $tariffTypeRepository;
    }

    public function setConsumption(int $value): void
    {
        $this->consumption = $value;
    }

    public function compareProducts(): array
    {
        $result = [];

        foreach ($this->tariffRepository->getAll() as $tariff) {
            if (!$this->tariffTypeRepository->isExists($tariff->type)) continue;

            $tariffTypeService = TariffTypeServiceFactory::create($tariff);

            $result[] = [
                'name' => $tariff->name,
                'annualCosts' => $tariffTypeService->calculateAnnualCosts($tariff, $this->consumption)
            ];
        }

        usort($result, function ($a, $b) {
            return $a['annualCosts'] - $b['annualCosts'];
        });

        return $result;
    }
}
