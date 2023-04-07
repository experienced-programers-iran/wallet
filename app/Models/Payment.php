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
}
