<?php

namespace App\Services;

use App\Contracts\NotificationContract;
use App\Contracts\OrderContract;
use App\Contracts\OrderRepositoryContract;
use App\Models\User;

class OrderService implements OrderContract
{

    public function __construct(private OrderRepositoryContract $orderRepository, private NotificationContract $notificationService)
    {
        
    }

    public function placeOrder(array $request)
    {
        $request['status'] = config('constants.PENDING');
        try {
            $user = User::find($request['user']);
            if ($this->orderRepository->create($request)) {
                $this->notificationService->send($request['notification'], $user);

                return response()->json("Successfully placed order.", 200);
            }

            return response()->json("Failed to create order!", 401);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}