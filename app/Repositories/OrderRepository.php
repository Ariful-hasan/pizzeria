<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryContract;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryContract
{
    public function __construct(private Order $order, private OrderItem $orderItem, private OrderDetail $orderDetail)
    {
        # code...
    }
    
    /**
     * create new order
     *
     * @param  mixed $request
     * @return bool
     */
    public function saveOrder(array $request): bool
    {
        $this->order->user_id = $request['user'];
        $this->order->status = $request['status'];
        $this->order->notification_type = $request['notification'];
        return $this->order->save();
    }
    
    /**
     * insert order items 
     * and items details
     *
     * @param  mixed $request
     * @return void
     */
    public function saveItemsAndDetails(array $request): void
    {
        foreach($request['products'] as $key) {
            $item = new OrderItem([
                'order_id' => $this->order->id, 
                'product_id' => $key['product']
            ]);
            $this->order->items()->save($item);

            OrderDetail::insert([
                [
                    'order_item_id' => $this->order->items[0]->id, 
                    'product_category_id' => $key['bottom'],
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'order_item_id' => $this->order->items[0]->id, 
                    'product_category_id' => $key['topping'],
                    'created_at' => date("Y-m-d H:i:s")]
            ]);
        }
    }

    public function create(array $request): bool
    {
        $res = false;
        DB::transaction(function () use($request, &$res) {
            $res = $this->saveOrder($request);
            $this->saveItemsAndDetails($request);
        });

        return $res;
    }

}