<?php

namespace App\Contracts;

interface OrderRepositoryContract
{    
    /**
     * insert new order with 
     * order items and items details
     *
     * @param  mixed $orderRequest
     * @return bool
     */
    public function create(array $orderRequest): bool;
}