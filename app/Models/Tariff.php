<?php

namespace App\Models;

class Tariff extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'baseCost',
        'additionalKwhCost',
        'includedKwh'
    ];
}
