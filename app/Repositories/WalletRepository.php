<?php

namespace App\Repositories;

use App\Models\Wallet;

class WalletRepository 
{
    public function getWallet($customer_id) 
    {
        return Wallet::where('customer_id', $customer_id)->first();
    }
}