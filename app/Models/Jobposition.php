<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobposition extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'work_nature',
        'working_hours',
        'salary',
        'required_qualifications',
        'number_of_people_allowed',
        'date_of_publication',
        'company_specialization_id'
    ];

    public function user_jobpositions()
    {
        return $this->hasMany(UserJobposition::class);
    }

    public function companyspecialization()
    {
        return $this->belongsTo(CompanySpecialization::class,'company_specialization_id')
            ;
    }

    public function scopeMinSalary(Builder $query,  $min_salary): Builder
    {

        return $query->where('salary' ,'>',$min_salary);
    }

    public function scopeMaxSalary(Builder $query,  $max_salary): Builder
    {
        return $query->where('salary' ,'<',$max_salary);
    }



}
