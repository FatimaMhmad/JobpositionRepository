<?php

namespace Database\Seeders;

use App\Models\Cvrequest;
use App\Models\Jobposition;
use App\Models\User;
use App\Models\UserJobposition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserJobpositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserJobposition::create([
            'user_id'         => User::inRandomOrder()->first()->id,
            'jobposition_id'  => Jobposition::inRandomOrder()->first()->id,
            'cvrequest_id'  => Cvrequest::inRandomOrder()->first()->id,


                    ]);
                    UserJobposition::create([
                        'user_id'         => User::inRandomOrder()->first()->id,
                        'jobposition_id'  => Jobposition::inRandomOrder()->first()->id,
                        'cvrequest_id'  => Cvrequest::inRandomOrder()->first()->id,


                                ]);
                                UserJobposition::create([
                                    'user_id'         => User::inRandomOrder()->first()->id,
                                    'jobposition_id'  => Jobposition::inRandomOrder()->first()->id,
                                    'cvrequest_id'  => Cvrequest::inRandomOrder()->first()->id,


                                            ]);
                                            UserJobposition::create([
                                                'user_id'         => User::inRandomOrder()->first()->id,
                                                'jobposition_id'  => Jobposition::inRandomOrder()->first()->id,
                                                'cvrequest_id'  => Cvrequest::inRandomOrder()->first()->id,


                                                        ]); UserJobposition::create([
                                                            'user_id'         => User::inRandomOrder()->first()->id,
                                                            'jobposition_id'  => Jobposition::inRandomOrder()->first()->id,
                                                            'cvrequest_id'  => Cvrequest::inRandomOrder()->first()->id,


                                                                    ]); UserJobposition::create([
                                                                        'user_id'         => User::inRandomOrder()->first()->id,
                                                                        'jobposition_id'  => Jobposition::inRandomOrder()->first()->id,
                                                                        'cvrequest_id'  => Cvrequest::inRandomOrder()->first()->id,


                                                                                ]);
    }
}
