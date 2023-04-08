<?php

namespace App\Services\Wallet;

use App\Enumerations\TransactionsTypeEnum;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class Wallet
{
    /*###################################################
     * This wallet service work with Rial currency type #
     */##################################################

    /**
     * @var int
     */
    protected int $userId;

    /**
     * @var bool
     */
    protected bool $canFilter = false;

    /**
     * @var array
     */
    protected array $typeEnums;

    /**
     * @param int $userId
     * @return $this
     */
    public function user(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param array $typeEnums
     */
    public function typeEnum(array $typeEnums): static
    {
        $this->canFilter = true;

        $this->typeEnums = $typeEnums;

        return $this;
    }

    /**
     * @return int
     */
    public function balance(): int
    {
        return Transaction::where(Transaction::USER_ID, $this->userId ?? Auth::id())
            ->when($this->canFilter, function ($query) {
                return $query->whereIn(Transaction::TYPE_ENUM, $this->typeEnums);
            })
            ->sum('amount');
    }

    /**
     * @param Payment $payment
     * @return mixed
     */
    public function increaseCredit(Payment $payment): Transaction
    {
        return Transaction::create([
            Transaction::USER_ID     => $payment->{Payment::USER_ID},
            Transaction::PAYMENT_ID  => $payment->{Payment::ID},
            Transaction::TYPE_ENUM   => TransactionsTypeEnum::INCREASE_CREDIT,
            Transaction::AMOUNT      => $payment->{Payment::AMOUNT},
            Transaction::DESCRIPTION => $this->getMessage(TransactionsTypeEnum::INCREASE_CREDIT, [
                'id' => $payment->{Payment::REFERENCE_ID}
            ])
        ]);
    }

    /**
     * @param int $typEnum
     * @param array|null $params
     * @return string
     */
    public function getMessage(int $typEnum, array $params = null): string
    {
        return trans('enums.' . $typEnum, $params);
    }
}
