<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'name'=>'aleppo',
            ]);
        City::create([
                'name'=>'damascus',
                    ]);
        City::create([
                    'name'=>'lattakia',
                    ]);
        City::create([
                        'name'=>'tartus',
                    ]);
        City::create([
                        'name'=>'Homs',
                    ]);
        City::create([
                        'name'=>'Hama',
                    ]);
    }
}
