<?php

namespace App\Services;

use App\Contracts\OrderContract;
use App\Contracts\OrderRepositoryContract;

class OrderService implements OrderContract
{

    public function __construct(private OrderRepositoryContract $orderRepository)
    {
        
    }

    public function placeOrder(array $request)
    {
        $request['status'] = config('constants.PENDING');
        try {
            return response($this->orderRepository->create($request), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}