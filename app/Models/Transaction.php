<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    const ID = 'id';
    const USER_ID = 'user_id';
    const PAYMENT_ID = 'payment_id';
    const ORDER_ID = 'order_id';
    const TYPE_ENUM = 'type_enum';
    const AMOUNT = 'amount';
    const DESCRIPTION = 'description';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        self::ID,
        self::USER_ID,
        self::PAYMENT_ID,
        self::ORDER_ID,
        self::TYPE_ENUM,
        self::AMOUNT,
        self::DESCRIPTION,
        self::DELETED_AT,
    ];

    protected $casts = [
        self::USER_ID     => 'int',
        self::PAYMENT_ID  => 'int',
        self::ORDER_ID    => 'int',
        self::TYPE_ENUM   => 'string',
        self::AMOUNT      => 'int',
        self::DESCRIPTION => 'string',
    ];
}
