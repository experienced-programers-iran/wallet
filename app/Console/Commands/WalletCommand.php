<?php

namespace App\Console\Commands;

use App\Enumerations\TransactionsTypeEnum;
use App\Services\Wallet\Wallet;
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
        $wallet = new Wallet();

        // Get the current user balance
        $wallet->balance();

        // Get balance for a special user
        $wallet->user(1)
            ->balance();

        // Get incoming amount balance for a special user
        $wallet->user(1)
            ->typeEnum([
                TransactionsTypeEnum::INCREASE_CREDIT
            ])
            ->balance();

        return Command::SUCCESS;
    }
}
