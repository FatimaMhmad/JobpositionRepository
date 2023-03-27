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
            'name'=>'samirgamal',
            'email'=>'samir@gmail.com',
            'password'=>Hash::make('12345678')
            ]);
        User::create([
            'name'=>'ahmad',
            'email'=>'ahmad@gmail.com',
            'password'=>Hash::make('12345678')
            ]);   User::create([
            'name'=>'samirgamal',
            'email'=>'samir2@gmail.com',
            'password'=>Hash::make('12345678')
            ]);
        User::create([
            'name'=>'ahmad',
            'email'=>'ahmad2@gmail.com',
            'password'=>Hash::make('12345678')
            ]);   User::create([
            'name'=>'samirgamal',
            'email'=>'samir3@gmail.com',
            'password'=>Hash::make('12345678')
            ]);
        User::create([
            'name'=>'ahmad',
            'email'=>'ahmad3@gmail.com',
            'password'=>Hash::make('12345678')
            ]);
    }
}
