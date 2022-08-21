<?php

namespace App\Contracts;

interface OrderContract 
{    
    /**
     * initial point for creating the order
     * set all the logics
     * notify user using Email|SMS
     *
     * @param  mixed $request
     * @return void
     */
    public function placeOrder(array $request);
}