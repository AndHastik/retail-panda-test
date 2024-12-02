<?php

namespace App\Models;

class TariffType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];
}
