<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>' hamna',
            "email"=>'hamna1@gmail.com',
            "password"=>'1234567',
            "role"=>'admin',
        ]);
    }
}
