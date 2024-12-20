<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\PizzaOrderStatusUpdated;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function update(Order $order)
    {
        $order->update([
            'status' => request()->status,
        ]);

        PizzaOrderStatusUpdated::dispatch($order);

        return back();
    }

    public function orderProgress(Order $order)
    {
        return response(['status' => $order->status->value]);
    }
}
