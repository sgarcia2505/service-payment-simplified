<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository 
{
    public function getCustomer($customer_id) 
    {
        return Customer::where('id', $customer_id)->first();
    }
}