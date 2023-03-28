<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name'=>'levant',
            'address'=>'aleppo',
            'description'=>'programming and design company',
            'city_id'          => City::inRandomOrder()->first()->id,
        ]);
        Company::create([
            'name'=>'Alagha',
            'address'=>'aleppo',
            'description'=>'programming and design company',
            'city_id'          => City::inRandomOrder()->first()->id,

                    ]);
        Company::create([
            'name'=>'project',
            'address'=>'aleppo',
            'description'=>'programming and design company',
            'city_id'          => City::inRandomOrder()->first()->id,

        ]);
        Company::create([
            'name'=>'Design',
            'address'=>'aleppo',
            'description'=>'programming and design company',
            'city_id'          => City::inRandomOrder()->first()->id,

        ]);
        Company::create([
            'name'=>'levant_company',
            'address'=>'aleppo',
            'description'=>'programming and design company',
            'city_id'          => City::inRandomOrder()->first()->id,

        ]);
        Company::create([
            'name'=>'projects',
            'address'=>'aleppo',
            'description'=>'programming and design company',
            'city_id'          => City::inRandomOrder()->first()->id,

        ]);
    }
}
