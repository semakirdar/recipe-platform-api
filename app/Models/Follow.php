<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'followed_id'
    ];

    public function followerUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function followedUser()
    {
        return $this->hasOne(User::class, 'id', 'followed_id');
    }

}
