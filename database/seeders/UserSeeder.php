<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Edson Martinez',
            'email' => 'edsonmaartinez@hotmail.com',
            'password' => Hash::make('EDsonrules14!'),
            'role_id' => '1'
        ]);
    }
}
