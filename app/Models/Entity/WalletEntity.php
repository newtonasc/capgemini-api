<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class WalletEntity extends Model
{
    protected $table = 'wallets';

    protected $fillable = [
        'id_user', 
        'user_destination_id', 
        'id_type',
        'transaction_id',
        'balance',
        'amount',
        'transaction_date'
    ];

    protected $guarded = ['wallet_id', 'created_at', 'updated_at'];
}
