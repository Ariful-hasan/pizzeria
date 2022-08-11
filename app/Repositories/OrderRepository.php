<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository 
{
    public function __construct(protected Order $order)
    {
        # code...
    }

    public function create(array $request)
    {
        
    }
}