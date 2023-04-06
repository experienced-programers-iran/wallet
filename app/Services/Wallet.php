<?php

namespace App\Services;

use App\Models\Transaction;

class Wallet
{
    /*###################################################
     * This wallet service work with Rial currency type #
     */##################################################

    /**
     * @return int
     */
    public static function getCredit(): int
    {
        return Transaction::where(Transaction::USER_ID, 1)->sum('amount');
    }
}
