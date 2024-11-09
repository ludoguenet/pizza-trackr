<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('App.Orders.{orderId}', function (User $user, int $orderId) {
    return (int) $user->id === (int) Order::findOrNew($orderId)->user_id;
});
