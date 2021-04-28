<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
     protected $fillable = [
    	'comment_id',
    	'firstname',
    	'lastname',
    	'reply',
    	'user_id',
        'post_id',
        'reply_id',
        'reply_name',
    ];
    public function comment(){
    	return $this->hasMany('App\comment');
    }
    public function post(){
       return $this->belongsTo('App\Post');
    }
}
