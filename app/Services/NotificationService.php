<?php

namespace App\Services;

use App\Contracts\NotificationContract;
use App\Models\User;
use App\Notifications\OrderEmailNotification;
use App\Notifications\OrderSmsNotification;
use InvalidArgumentException;
use Illuminate\Support\Facades\Notification;

class NotificationService implements NotificationContract
{
    public function send(string $type, User $user=null, array $content=[]): void
    {
        if ($type == config('constants.EMAIL')) {
            Notification::send($user, new OrderEmailNotification);
        } elseif ($type == config('constants.SMS')) {
            Notification::send($user, new OrderSmsNotification);
        }
    }
}