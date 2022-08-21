<?php

namespace App\Contracts;

use App\Models\User;

interface NotificationContract 
{
    public function send(string $type,  User $user, array $content=[]): void;
}