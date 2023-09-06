<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       foreach (Chat::all() as $chat) {
        $users = \App\Models\User::inRandomOrder()->take(rand(1,3))->pluck('id');
        $chat->members()->attach($users);
       }
    }
}
