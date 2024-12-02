<?php

namespace Database\Seeders;

use App\Models\TariffType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TariffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TariffType::truncate();

        TariffType::create([
            'id'   => 1,
            'name' => 'Basic electricity tariff'
        ]);

        TariffType::create([
            'id' => 2,
            'name' => 'Packaged tariff'
        ]);
    }
}
