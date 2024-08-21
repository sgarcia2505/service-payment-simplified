<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use App\Models\Wallet;
use App\Enums\TransactionStatusEnum;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TransactionControllerTest extends TestCase
{
    public function testSendPayment(): void
    {
       $customerPayer = Wallet::factory()->create([
            'balance' => 15000
       ]);
       $customerReceiver = Wallet::factory()->create([
            'balance' => 10000
       ]);
       $amount = 1000;

        $response = $this->postJson(route('transactions.store'),[
            'customer_id_payer' => $customerPayer->getKey(),
            'customer_id_receiver' => $customerReceiver->getKey(),
            'amount' => $amount,
            'status' => 'completed'
        ]);

        $response->assertNoContent();

        $this->assertDatabaseHas('transactions',[
            'customer_id_payer' => $customerPayer->getKey(),
            'customer_id_receiver' => $customerReceiver->getKey(),
            'amount' => $amount,
            'status' => 'completed'
        ]);

        $this->assertDatabaseHas('wallets',[
            'customer_id' => $customerPayer->getKey(),
            'balance' => 14000
        ]);

        $this->assertDatabaseHas('wallets',[
            'customer_id' => $customerReceiver->getKey(),
            'balance' => 11000
        ]);
    }
}