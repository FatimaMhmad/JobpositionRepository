<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanySpecialization;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySpecializationSeeder extends Seeder
{

    public function run(): void
    {

        CompanySpecialization::create([
            'company_id'         => Company::inRandomOrder()->first()->id,
            'specialization_id'  => Specialization::inRandomOrder()->first()->id,

                    ]);
        CompanySpecialization::create([
                        'company_id'         => Company::inRandomOrder()->first()->id,
                        'specialization_id'  => Specialization::inRandomOrder()->first()->id,

                                ]);
        CompanySpecialization::create([
                                    'company_id'         => Company::inRandomOrder()->first()->id,
                                    'specialization_id'  => Specialization::inRandomOrder()->first()->id,

                                            ]);
        CompanySpecialization::create([
                                                'company_id'         => Company::inRandomOrder()->first()->id,
                                                'specialization_id'  => Specialization::inRandomOrder()->first()->id,

                                                        ]);
        CompanySpecialization::create([
                                                            'company_id'         => Company::inRandomOrder()->first()->id,
                                                            'specialization_id'  => Specialization::inRandomOrder()->first()->id,

                                                                    ]);
        CompanySpecialization::create([
                                                                        'company_id'         => Company::inRandomOrder()->first()->id,
                                                                        'specialization_id'  => Specialization::inRandomOrder()->first()->id,

                                                                                ]);

    }
}
