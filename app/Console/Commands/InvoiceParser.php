<?php declare(strict_types=1);

namespace App\Console\Commands;

use App\Interfaces\ParserServiceInterface;
use Illuminate\Console\Command;

final class InvoiceParser extends Command
{
    public function __construct(
        private ParserServiceInterface $parserService,
    ) {
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse invoice data into csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->parserService->run();
        
        return Command::SUCCESS;
    }
}
