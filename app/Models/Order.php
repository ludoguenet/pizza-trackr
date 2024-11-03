<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected function casts()
    {
        return [
            'user_id' => 'int',
            'status' => OrderStatus::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
