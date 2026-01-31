<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class community extends Model
{
    protected $fillable = [
        'name',
        'description',
        'color',
    ];

    public function messages(){
        return $this->hasMany(message::class);
    }
}
