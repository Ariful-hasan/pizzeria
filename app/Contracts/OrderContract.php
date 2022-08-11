<?php

namespace App\Contracts;

interface OrderContract 
{
    public function placeOrder(array $request);
}