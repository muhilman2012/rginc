<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@rginc.online'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('C3Nd00Ld!L4UT'),
                'is_admin' => true,
            ]
        );
    }
}