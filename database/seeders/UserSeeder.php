<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Max',
        ], [
            'email' => 'contact@felis-ts.nl',
            'password' => bcrypt('password'),
            'super' => true,
        ]);

        User::updateOrCreate([
            'name' => 'Daan',
        ], [
            'email' => 'info@dkdesigns.nl',
            'password' => bcrypt('password'),
            'super' => true,
        ]);
    }
}
