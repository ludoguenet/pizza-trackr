<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderProgress(Order $order)
    {
        return response(['stepIndex' => $order->status->value]);
    }
}
