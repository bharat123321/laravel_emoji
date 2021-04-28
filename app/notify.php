<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notify extends Model
{
    protected $fillable = [
    	'comment_id',
    	 'user_id',
        'post_id',
        'replies_id',
         
    ];
}
