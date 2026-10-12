<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegularUserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'pengunjung@gmail.com'],
            [
                'name'     => 'Pengunjung Biasa',
                'password' => Hash::make('PasswordUser123'),
            ]
        );
    }
}
