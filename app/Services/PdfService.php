<?php declare(strict_types=1);

namespace App\Services;

use App\Interfaces\PdfServiceInterface;
use Illuminate\Support\Facades\Storage;
use mikehaertl\pdftk\Pdf;
use SimpleXMLElement;

final readonly class PdfService implements PdfServiceInterface
{
    private const string PATH_INVOICE = 'public/pdf/invoice.pdf';
    private const string PATH_ATTACHMENTS = 'public/attachments';
    private const string PATH_CSV = 'public/attachments/invoice.csv';

    public function generateCSVFromAttachedXml(): void
    {
        $pdf = new Pdf(Storage::path(self::PATH_INVOICE));
        $result = $pdf->unpackFiles(Storage::path(self::PATH_ATTACHMENTS));

        if (false === $result) {
            dd($pdf->getError());
        }

        $files = Storage::files(self::PATH_ATTACHMENTS);
        $xmlFilePath = $files[0];
        
        /** @var SimpleXMLElement $xml */
        $xml = simplexml_load_string(Storage::get($xmlFilePath));

        $namespaces = $xml->getNamespaces(true);

        foreach ($namespaces as $key => $namespace) {
            if (true === empty($key)) {
                continue;
            }

            $xml->registerXPathNamespace($key, $namespace);
        }

        $invoiceLines = $xml->xpath('//cac:InvoiceLine');
        $csvData = [];

        $csvData[] = [
            'Description',
            'Quantity',
            'Unit Price (SAR)',
            'Amount (SAR)',
            'Vat Rate %',
            'Vat Amount (SAR)',
            'Gross Amt (Vat Incl) (SAR)'
        ];

        foreach ($invoiceLines as $line) {
            $csvData[] = [
                (string) $line->xpath('cac:Item/cbc:Name')[0],
                (float) $line->xpath('cbc:InvoicedQuantity')[0],
                (float) $line->xpath('cac:Price/cbc:PriceAmount')[0],
                (float) $line->xpath('cbc:LineExtensionAmount')[0],
                (float) $line->xpath('cac:Item/cac:ClassifiedTaxCategory/cbc:Percent')[0],
                (float) $line->xpath('cac:TaxTotal/cbc:TaxAmount')[0],
                (float) $line->xpath('cac:TaxTotal/cbc:RoundingAmount')[0],
            ];
        }

        $file = fopen(Storage::path(self::PATH_CSV), 'w');

        foreach ($csvData as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
    }
}
