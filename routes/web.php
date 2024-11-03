<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Events\OrderedPizzaStatusUpdated;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $orders = Order::all();

    return view('dashboard', compact('orders'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/pizza-trackr/{order}', [ProfileController::class, 'trackr'])->name('profile.trackr');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/orders/{order}', function (Order $order) {
        $order->update([
            'status' => request()->status,
        ]);

        OrderedPizzaStatusUpdated::dispatch($order);

        return back();
    })->name('orders.update');
});

require __DIR__.'/auth.php';
