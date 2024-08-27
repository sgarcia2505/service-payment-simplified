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
        //validar se customer_id_payer é de um cliente comum
        //validar se o customer_id_payer tem saldo para ser enviado
        //autorizador no servidor externo    
        $this->transactionRepository->create($transactionPayload);
    }

}