<?php declare(strict_types=1);

namespace App\Services;

use App\Interfaces\ParserServiceInterface;

final readonly class ParserService implements ParserServiceInterface
{
    public function run(): void
    {
        dd('test');
    }
}
