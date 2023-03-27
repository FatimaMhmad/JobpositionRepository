<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Cvrequest extends Model implements HasMedia
{
    
    use HasFactory,InteractsWithMedia ;

    public function registerMediaCollections(): void
    {
        $this
        ->addMediaCollection('user_jobposition')->singleFile();
    }
    public function user_jobposition()
    {
        return $this->hasOne(UserJobposition::class);
    }
}
