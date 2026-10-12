<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'alyahnuralifah05@gmail.com'],
            [
                'name'     => 'Alyah Nur Alifah',
                'password' => Hash::make('PasswordRahasia123'),
            ]
        );
    }
}