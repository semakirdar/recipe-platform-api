<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'location',
        'website',
        'bio'
    ];

    protected $appends = ['avatar'];

    protected function getAvatarAttribute()
    {
        return $this->getFirstMediaUrl();
    }


}
