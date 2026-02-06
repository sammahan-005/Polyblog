<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class community extends Model
{
    protected $fillable = [
        'name',
        'description',
        'color',
        'user_id',
        'is_private',
    ];

    public function messages(){
        return $this->hasMany(message::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members(){
        return $this->belongsToMany(User::class, 'community_user');
    }

    public function demandes(){
        return $this->hasMany(demande::class);
    }
}
