<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySpecialization extends Pivot
{
    use HasFactory;

    protected $fillable=
    [
        'company_id',
        'specialization_id'
    ];


    public function jobpositions()
    {
        return $this->hasMany(Jobposition::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }


}
