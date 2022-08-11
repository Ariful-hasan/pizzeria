<?php

namespace App\Services;

use App\Contracts\OrderContract;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderItem;

class OrderService implements OrderContract
{
    public function placeOrder(array $request)
    {
        $orderData = $this->makeOrderDataSet($request);
        $orderItemsData = $this->makeOrderItemsDataSet($request);
        $orderDetailsData = $this->makeOrderDetailsDataSet($request);

        $order = new Order($orderData);
        $order->save();

        $orderItem = new OrderItem($orderItemsData);
        $order->items()->save( $orderItem);

        $orderDetails = new OrderDetail($orderDetailsData);
        $order->details()->saveMany($orderDetails);

        return response()->json($order, 200);
    }

    public function makeOrderDataSet(array $request): array
    {
        return [
            'user_id' => $request['user'],
            'status' => "P",
            'notification_type' => $request['notification']
        ];
    }

    public function makeOrderItemsDataSet(array $request): array
    {
        return [
            'product_id' => $request['pizza'],
        ];
    }

    public function makeOrderDetailsDataSet(array $request): array
    {
        return [
            ['product_category_id' => $request['bottom']],
            ['product_category_id' => $request['topping']]
        ];
    }
}