<?php

namespace App\Traits;

trait CurrencyTrait {
    public function convertEurosToCents(int $value): float
    {
        return round(fdiv($value, 100), 2);
    }
}
