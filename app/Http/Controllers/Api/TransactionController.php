<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateTransactionRequest;
use App\Services\TransactionService;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function __construct(private TransactionService $transactionService)
    {
    }

    public function sendPayment(CreateTransactionRequest $request): Response 
    {
        $this->transactionService->postTransaction($request->validated());
        return response()->noContent();
    }
}
