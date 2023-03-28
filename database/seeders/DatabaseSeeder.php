<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Specialization;
use App\Models\Userrequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PermissionsDemoSeeder::class,
            CitySeeder::class,
            SpecializationSeeder::class,
            CompanySeeder::class,
            CompanySpecializationSeeder::class,
            JobpositionSeeder::class,
            UserSeeder::class,
            UserrequestSeeder::class,
            CvrequestSeeder::class,
            UserJobpositionSeeder::class
        ]);
    }
}
