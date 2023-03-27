<?php

namespace Database\Seeders;

use App\Models\Cvrequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CvrequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cvrequest::create();
        Cvrequest::create();
        Cvrequest::create();
        Cvrequest::create();
        Cvrequest::create();
        Cvrequest::create();
    }
}
