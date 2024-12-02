<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as JenssegersModel;

abstract class Model extends JenssegersModel
{
    protected $connection = 'mongodb';

    public static function getTableName(): string
    {
        return (new static)->getTable();
    }
}
