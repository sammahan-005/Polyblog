<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class demande extends Model
{

        protected $fillable = [
            'user_id',
            'community_id',
            'status',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(community::class);
    }
}
