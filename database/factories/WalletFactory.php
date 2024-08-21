<?php

namespace Database\Factories;

use App\Models\Wallet;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    protected $model = Wallet::class; 
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer = fake()->randomElement([Customer::factory()])->create();

        return [
            'balance' => fake()->randomNumber(5),
            'customer_id' => $customer->getKey()
        ];
    }
}
