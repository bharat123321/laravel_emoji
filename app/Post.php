<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use App\full_like;
use App\full_comment;
class Post extends Model 
{
     protected $fillable = ['body','user_id','image','video','tag_name','post_option'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function likes() {
        return $this->hasMany('App\Like','post_id');
    }
    public function dislikes() {
        return $this->hasMany('App\Dislike');
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }
     public function replies(){
        return $this->hasMany('App\Reply');
    }
     public function friendship(){
        return $this->belongsTo('App\friendship');
    }
    public function view(){
        return $this->belongsTo('App\view');
    }
    public function postview(){
        return $this->hasMany('App\postview');
    }
    public function tag(){
        return $this->belongsTo('App\tag');
    }
    public function formattedCreatedDate() {
       if ($this->created_at->diffInDays() > 30) {
            return  $this->created_at->toFormattedDateString();
        } else {
            return  $this->created_at->diffForHumans();
        }
    }
    public function getlikes($id){
       $like_user =  Like::where(['post_id'=>$id])->where('like',1)->get();
                $s = $like_user->count();
                return $s;
    }
    public function getfull_likes($id,$image){
        $like_user = full_like::where(['post_id'=>$id,'image'=>$image])->where('like',1)->get();
                $s = $like_user->count();
                return $s;
         
    }
    public function getfull_likes_video($id,$video){
        $like_user = full_like::where(['post_id'=>$id,'video'=>$video])->where('like',1)->get();
                $s = $like_user->count();
                return $s;
         
    }
    public function getfull_comment($id,$image){
    $like_user = full_comment::where(['post_id'=>$id,'image'=>$image])->get();
                $s = $like_user->count();
                return $s;
         
    }
    public function getfull_video_comment($id,$video){
    $like_user = full_comment::where(['post_id'=>$id,'video'=>$video])->get();
                $s = $like_user->count();
                return $s;
         
    }
}
