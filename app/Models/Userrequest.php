<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userrequest extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'name',
        'age',
        'marital_status',
        'address',
        'phone',
        'email',
        'scientific_experience',
        'practical_experience',
        'mother_langue',
        'level_of_mother_langue',
        'additional_languages',
        'level_of_additional_languages',
        'skills',
        'hobbies',
    ];

    public function jobposition()
    {
        return $this->belongsTo(Jobposition::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_jobposition()
    {
        return $this->hasOne(UserJobposition::class);
    }

}
