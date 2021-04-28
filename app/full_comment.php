<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class full_comment extends Model
{
     protected $fillable = array(
        'firstname',
        'lastname',
        'comment',
        'user_id',
        'image', 
        'video',
        'post_id',
    );
}
