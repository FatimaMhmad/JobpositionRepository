<?php

namespace Database\Seeders;

use App\Models\CompanySpecialization;
use App\Models\Jobposition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobpositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jobposition::create([
            'work_nature'         => 'frontend',
            'working_hours'=>'7',
            'salary'=>'400',
            'required_qualifications'=>'graduated and has information about job',
            'number_of_people_allowed'=>'10',
            'date_of_publication'=>'2023-06-05 11:30:11',
            'company_specialization_id'  => CompanySpecialization::inRandomOrder()->first()->id,

                    ]);
        Jobposition::create([
                        'work_nature'         => 'design',
                        'working_hours'=>'7',
                        'salary'=>'300',
                        'required_qualifications'=>'graduated and has information about job',
                        'number_of_people_allowed'=>'10',
                        'date_of_publication'=>'2023-07-05 11:30:11',
                        'company_specialization_id'  => CompanySpecialization::inRandomOrder()->first()->id,

                                ]);
        Jobposition::create([
                                    'work_nature'         => 'flutter',
                                    'working_hours'=>'7',
                                    'salary'=>'600',
                                    'required_qualifications'=>'graduated and has information about job',
                                    'number_of_people_allowed'=>'10',
                                    'date_of_publication'=>'2023-06-05 11:30:11',
                                    'company_specialization_id'  => CompanySpecialization::inRandomOrder()->first()->id,

                                            ]);
        Jobposition::create([
                                                'work_nature'         => 'programming',
                                                'working_hours'=>'7',
                                                'salary'=>'300',
                                                'required_qualifications'=>'graduated and has information about job',
                                                'number_of_people_allowed'=>'10',
                                                'date_of_publication'=>'2023-06-05 11:30:11',
                                                'company_specialization_id'  => CompanySpecialization::inRandomOrder()->first()->id,

                                                        ]);
        Jobposition::create([
                                                            'work_nature'         => 'programming_php',
                                                            'working_hours'=>'7',
                                                            'salary'=>'300',
                                                            'required_qualifications'=>'graduated and has information about job',
                                                            'number_of_people_allowed'=>'10',
                                                            'date_of_publication'=>'2023-06-05 11:30:11',
                                                            'company_specialization_id'  => CompanySpecialization::inRandomOrder()->first()->id,

                                                                    ]);
        Jobposition::create([
                                                                        'work_nature'         => 'uiuxdesign',
                                                                        'working_hours'=>'7',
                                                                        'salary'=>'200',
                                                                        'required_qualifications'=>'graduated and has information about job',
                                                                        'number_of_people_allowed'=>'10',
                                                                        'date_of_publication'=>'2023-06-05 11:30:11',
                                                                        'company_specialization_id'  => CompanySpecialization::inRandomOrder()->first()->id,

                                                                                ]);
        Jobposition::create([
                                                                                    'work_nature'         => 'programming_laravel',
                                                                                    'working_hours'=>'7',
                                                                                    'salary'=>'700',
                                                                                    'required_qualifications'=>'graduated and has information about job',
                                                                                    'number_of_people_allowed'=>'10',
                                                                                    'date_of_publication'=>'2023-06-05 11:30:11',
                                                                                    'company_specialization_id'  => CompanySpecialization::inRandomOrder()->first()->id,

                                                                                            ]);
    }
}
