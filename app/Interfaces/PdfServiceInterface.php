<?php declare(strict_types=1);

namespace App\Interfaces;

interface PdfServiceInterface
{
    public function generateCSVFromAttachedXml(): void;
}
