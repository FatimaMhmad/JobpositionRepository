<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;




class UserJobposition extends Pivot
{
    use HasFactory;

    protected $fillable=
    [
        'user_id',
        'jobposition_id',
        'userrequest_id',
        'cvrequest_id'
    ];

    public function userrequest()
    {
        return $this->hasOne(Userrequest::class);
    }
    public function jobposition()
    {
        return $this->belongsTo(Jobposition::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cvrequest()
    {
        return $this->hasOne(Cvrequest::class);
    }


}
