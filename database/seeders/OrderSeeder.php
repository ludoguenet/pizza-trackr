<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Database\Factories\OrderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::factory()->create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Order::factory(10)->for($user)->create();
    }
}
