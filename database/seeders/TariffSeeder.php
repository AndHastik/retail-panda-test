<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tariff;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tariff::truncate();

        Tariff::create([
            'name' => 'Product A',
            'type' => 1,
            'baseCost' => 5,
            'additionalKwhCost' => 22,
        ]);

        Tariff::create([
            'name' => 'Product B',
            'type' => 2,
            'baseCost' => 800,
            'additionalKwhCost' => 30,
            'includedKwh' => 4000,
        ]);
    }
}
