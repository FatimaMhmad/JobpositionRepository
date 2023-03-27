<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'name',
        'address',
        'description',
        'city_id'
    ];



    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
}
