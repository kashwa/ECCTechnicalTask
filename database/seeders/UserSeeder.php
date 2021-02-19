<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 100 users
        for ($i=1 ; $i <=100 ; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(12).'@mail.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
