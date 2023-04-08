<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    const ID = 'id';
    const USER_ID = 'user_id';
    const GATEWAY_ENUM = 'gateway_enum';
    const AMOUNT = 'amount';
    const AUTHORITY_ID = 'authority_id';
    const REFERENCE_ID = 'reference_id';
    const VERIFY_AT = 'verified_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        self::ID,
        self::USER_ID,
        self::GATEWAY_ENUM,
        self::AMOUNT,
        self::AUTHORITY_ID,
        self::REFERENCE_ID,
        self::VERIFY_AT,
        self::DELETED_AT,
    ];

    protected $casts = [
        self::USER_ID      => 'int',
        self::GATEWAY_ENUM => 'string',
        self::AMOUNT       => 'int',
        self::AUTHORITY_ID => 'string',
        self::REFERENCE_ID => 'string',
        self::VERIFY_AT    => 'datetime',
    ];
}
