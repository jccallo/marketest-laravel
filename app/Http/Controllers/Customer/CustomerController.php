<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\ApiController;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends ApiController
{
    public function index()
    {
        $customers = Customer::all();
        $data = CustomerResource::collection($customers);
        return $data;
    }
}
