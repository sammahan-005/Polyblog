<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(comment::class);
    }

    public function likes(){
        return $this->hasMany(like::class);
    }

    public function reports(){
        return $this->hasMany(report::class);
    }


}
