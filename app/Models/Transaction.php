<?php

namespace App\Models;

use App\Enums\TransactionStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'amount',
        'customer_id_payer',
        'customer_id_receiver',
        'status'
    ];

    protected $casts = [
        'status' => TransactionStatusEnum::class,
        'amount' => 'integer'
    ];
}
