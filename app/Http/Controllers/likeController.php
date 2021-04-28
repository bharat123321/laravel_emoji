<?php

namespace App\Http\Controllers;
use App\notify;
use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Dislike;
use App\full_like;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class likeController extends Controller
{
  public function index(Request $request){ 
          $post = Post::findorFail($request->receiver_id);
          $loggedin_user = Auth::user()->id;
          $post_id = $request->receiver_id;
          $like_user = Like::where(['user_id'=>$loggedin_user,'post_id'=>$post_id])->where('like',1)->first();
            
             $user_id = Auth::user()->id;
            // $email = Auth::user()->email;
             $post_id =$post_id;
             $like = new Like;
               if($like_user == false){ 
             $like->user_id = $user_id;
             $like->post_id = $post_id;
             $like->like = 1;
                 $like->save();

              } 
               $sc = DB::table('posts')->where('id',$request->receiver_id)->where('user_id','!=',Auth::user()->id)->first();
                if($sc == true){
              $notif = new notify;
              $notif->commented_user_id = Auth::user()->id;
              $notif->replies_user_id = $request->post_user;
              $notif->post_id = $request->receiver_id;
              $notif->like_status = 1;
              $notif->firstname =Auth::user()->firstname;
              $notif->lastname = Auth::user()->lastname;
              $notif->post_body =$request->post_body;
              $notif->save();
   }
            $like_user = Like::where(['post_id'=>$post_id])->where('like',1)->get();
                $s = $like_user->count();
                
               return response()->json(['result'=>$s,'f'=>$post_id,'bool'=>true]);
     
        
    }
    public function remove(Request $request){

          $id = $request->receiver_id;
    
                DB::table('likes')
                ->where('user_id', Auth::user()->id)
                ->where('post_id', $id)
                ->delete();
                $like_user = Like::where(['post_id'=>$id])->where('like',1)->get();
               $s= $like_user->count();
                return response()->json(['result'=>$s,'f'=>$id,'bool'=>true]);
    }


    public function exibitlike($id){
          
         $user_id = Auth::user()->id;
        $post_id =Post::findorFail($id);
         $posts = DB::table('likes')->leftJoin('users','users.id','likes.user_id')->where('post_id',$id)->get();
         // return view('showliked')->with('from_postid',$posts);
         
            return response()->json(['url'=>url('/showliked/'),'re'=>$posts,'id'=>$id]);
    }
    public function showliked($id){
      $posts = DB::table('likes')->leftJoin('users','users.id','likes.user_id')->where('post_id',$id)->get();
        return view('showliked')->with('from_postid',$posts);
         
         
    }
    public function likefullimage(Request $request){

      $image = $request->image;
      $video = $request->video;
      $post_id = $request->receiver_id;
      $user_id = Auth::user()->id;
    $like_user = full_like::where(['user_id'=>$user_id,'post_id'=>$post_id,'image'=>$image])->where('like',1)->first();
       $image_liked = new full_like;
       if($like_user == false){ 
       $image_liked->image = $image;
       $image_liked->post_id = $post_id;
       $image_liked->user_id = $user_id;
       $image_liked->like = 1;
       $image_liked->save();
$like_user = full_like::where(['post_id'=>$post_id,'image'=>$image])->where('like',1)->get();
                $s = $like_user->count();
}
 $like_user = full_like::where(['user_id'=>$user_id,'post_id'=>$post_id,'video'=>$video])->where('like',1)->first();
       $image_liked = new full_like;
       if($like_user == false){ 
       $image_liked->video = $video;
       $image_liked->post_id = $post_id;
       $image_liked->user_id = $user_id;
       $image_liked->like = 1;
       $image_liked->save();

       $like_user = full_like::where(['post_id'=>$post_id,'video'=>$video])->where('like',1)->get();
                $s = $like_user->count();
}


                
               return response()->json(['result'=>$s,'f'=>$post_id,'bool'=>true]);
    }
    public function dislikefullimage(Request $request){

       $image = $request->image;
      $post_id = $request->receiver_id;
      $user_id = Auth::user()->id;
      $video = $request->video;
      if($image == false){ 
             DB::table('full_likes')->where('user_id', Auth::user()->id)->where('post_id', $post_id)->where('image',$image)->delete();
              $like_user = full_like::where(['post_id'=>$post_id,'image'=>$image])->where('like',1)->get();
               $s= $like_user->count();
               }
               if($video ==false){
                // DB::table('full_likes')->where('user_id', Auth::user()->id)->where('post_id', $post_id)->where('video',$video)->delete();
                $like_user = full_like::where(['post_id'=>$post_id,'video'=>$video])->where('like',1)->get();
                 $s = $like_user->count();
                }
               
                  return response()->json(['result'=>$s,'f'=>$post_id,'bool'=>true]);

    }
}