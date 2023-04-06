<?php

namespace App\Console\Commands;

use App\Services\Wallet;
use Illuminate\Console\Command;

class WalletCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test wallet';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo Wallet::getCredit();

        return Command::SUCCESS;
    }
}
