<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $user = [
                    [
                        'name' => 'Kaushal',
                        'email' => 'BNP@gmail.com',
                        'password' => bcrypt('123456'),
                        'email_verified_at' => now(),
                        'remember_token' => Str::random(10),
                    ]
                ];
                foreach ($user as $user) {
                    User::create($user);
                }
    }
}
