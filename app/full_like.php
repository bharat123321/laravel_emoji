<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class full_like extends Model
{
     protected $fillable = [
        'user_id','like','post_id','image','video'
    ];
}
