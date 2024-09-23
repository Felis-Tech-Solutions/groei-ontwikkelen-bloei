<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Daan',
        ], [
            'email' => 'info@dkdesigns.nl',
            'password' => config('auth.passwords.password'),
            'super' => true,
        ]);
    }
}
