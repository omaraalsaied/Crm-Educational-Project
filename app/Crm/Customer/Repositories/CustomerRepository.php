<?php

namespace App\Crm\Customer\Repositories;

use App\crm\Customer\Models\Customer;

class CustomerRepository
{
    Private Customer $customer;
    public function __construct(Customer $customer){
        $this->customer = $customer;
    }

    public function all(){
        return $this->customer->paginate(1);
    }
}
