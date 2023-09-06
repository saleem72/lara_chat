<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_active' => true,
            'role_id' => UserRoleEnum::ADMIN->value,
        ]);

        $chats = Chat::factory(['created_by' => $user->id])
        ->count(10)
        ->create();
        // $user->rooms()->attach($chats);


        User::factory()
            ->count(15)
            ->create();
    }
}
