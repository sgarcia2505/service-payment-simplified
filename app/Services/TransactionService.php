<?php

namespace App\Services;

use App\Repositories\WalletRepository;
use App\Repositories\TransactionRepository;

class TransactionService 
{
    public function __construct(
        private TransactionRepository $transactionRepository,
        private WalletRepository $walletRepository
        )
    {
    }

    public function postTransaction($transactionPayload)
    {
        
        $this->transactionRepository->create($transactionPayload);
    }

}