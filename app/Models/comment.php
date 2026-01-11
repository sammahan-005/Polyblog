<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'content',
        'message_id',
        'user_id',
    ];

    public function messages(){
        return $this->belongsTo(message::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}