<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class full_replies extends Model
{
     protected $fillable = [
    	'full_comment_id',
    	'firstname',
    	'lastname',
    	'reply',
    	'user_id',
        'post_id',
        'full_reply_id',
        'reply_name',
    ];
}
