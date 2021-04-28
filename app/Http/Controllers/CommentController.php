<?php

namespace App\Http\Controllers;
use App\notify;
use App\comment;
use App\full_comment;
use App\Reply;
use Session; 
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\notifications;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
             
        //  $user = Auth::user()->id;
         $post_id =Post::findorFail($id);   
         $comment = comment::all();
            $showcomment = DB::table('users')->leftJoin('comments','comments.user_id','users.id')->where('post_id',$id)->get();
           // $showreplies = DB::table('replies')->leftJoin('comments','comments.id','replies.comment_id')->where('post_id',$id)->count();
          $count_comment = DB::table("comments")->where('post_id',$id)->count();
        // $count_comment_replies = $showreplies + $count_comment;
             $replies = DB::table('users')->leftJoin('replies','replies.user_id','users.id')->where('post_id',$id)->get();
           
          return view('comment_replies.showcomment')->with('showcomment',$showcomment)->with('replies',$replies)->with('comment',$comment);
    }

     public function comment_delete($id){
        DB::table('comments')->where('id',$id)->where('user_id',Auth::user()->id)->delete();
        return Response()->json(['s'=>true,]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {

        // comment::create([
        //         'firstname' => $request->firstname,
        //         'lastname' => $request->lastname,
        //         'comment' => $request->input('comment'),
        //         'user_id' => Auth::user()->id,
        //         'post_id'=>$request->input('post_id'),
                 
        //     ]);
            $comment = new comment;
              
            
            $comment->firstname = $request->firstname;
             $comment->lastname = $request->lastname;
            $comment->comment = $request->comment;
            // $comment->user_id = $request->user_id;
             $comment->user_id = Auth::user()->id;
             $comment->post_id = $request->post_id;
             $comment->post_body = $request->post_body;
             
              // $comment->save();

           $sc = DB::table('posts')->where('id',$request->post_id)->where('user_id','!=',Auth::user()->id)->first();
                if($sc == true){
              $notif = new notify;
              $notif->commented_user_id = Auth::user()->id;
              $notif->replies_user_id = $request->user_id;
              $notif->post_id = $request->post_id;
              $notif->comment_status = 1;
              $notif->firstname = $request->firstname;
              $notif->lastname = $request->lastname;
              $notif->post_body =$request->post_body;
              $notif->save();
   }
      // $sc = DB::table('posts')->where('id',$request->post_id)->where('user_id','!=',Auth::user()->id)->first();
      //           if($sc == true){
      //               auth::user()->notify(new notifications($comment));
      //           }
          

            return back()->with('success','Comment Added successfully..!');
                // return redirect('/index');
        }else{
            return back()->withInput()->with('error','Something wrong'); 
    }
}

         public function store_comment(Request $request){
              $comment = new comment;
              
            
            $comment->firstname = $request->firstname;
             $comment->lastname = $request->lastname;
            $comment->comment = $request->comment;
            // $comment->user_id = $request->user_id;
             $comment->user_id = Auth::user()->id;
             $comment->post_id = $request->post_id;
             $comment->post_body = $request->post_body;
            
            $comment->save();
                $sc = DB::table('posts')->where('id',$request->post_id)->where('user_id','!=',Auth::user()->id)->first();
                if($sc == true){
              $notif = new notify;
              $notif->commented_user_id = Auth::user()->id;
              $notif->replies_user_id = $request->user_id;
              $notif->post_id = $request->post_id;
              $notif->comment_status = 1;
              $notif->firstname = $request->firstname;
              $notif->lastname = $request->lastname;
              $notif->post_body =$request->post_body;

            $notif->save();
   }
   
      return back()->with('success','Comment Added successfully..!');
 
         }
   

      public function fullimage_comment(Request $request){
          if (Auth::check()) {

         
            $comment = new full_comment;
              
            
            $comment->firstname = $request->firstname;
             $comment->lastname = $request->lastname;
            $comment->comment = $request->comment;
             $comment->user_id = Auth::user()->id;
             $comment->post_id = $request->post_id;
             $comment->image = $request->post_image;
             $comment->video = $request->post_video;
              $comment->save();
              return back();
      }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $che = DB::table('comments')->where('id',$id)->get();
            
          return view('reply.show_comment_form')->with('comment',$che);
    }
    public function showfull_imagecomment($id){
         $che = DB::table('full_comments')->where('id',$id)->get();
            
          return view('reply.show_full_comment')->with('comment',$che);
    } 
    public function comment_del_fulldesign($id){
        DB::table('full_comments')->where('id',$id)->where('user_id',Auth::user()->id)->delete();
        return Response()->json(['s'=>true]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showfull_image($id , $image){
   
         $user = Auth::user()->id;
          $comment = full_comment::all();
            $showcomment = DB::table('users')->leftJoin('full_comments','full_comments.user_id','users.id')->where('post_id',$id)->where('image',$image)->get();
           // $showreplies = DB::table('replies')->leftJoin('comments','comments.id','replies.comment_id')->where('post_id',$id)->count();
          $count_comment = DB::table("comments")->where('post_id',$id)->count();
        // $count_comment_replies = $showreplies + $count_comment;
               $replies = DB::table('users')->leftJoin('full_replies','full_replies.user_id','users.id')->where('post_id',$id)->get();
           
            return view('comment_replies.showfull_comment')->with('showcomment',$showcomment)->with('replies',$replies)->with('comment',$comment);
    }
    public function showfull_video($id , $video){
   
         $user = Auth::user()->id;
          $comment = full_comment::all();
            $showcomment = DB::table('users')->leftJoin('full_comments','full_comments.user_id','users.id')->where('post_id',$id)->where('video',$video)->get();
           // $showreplies = DB::table('replies')->leftJoin('comments','comments.id','replies.comment_id')->where('post_id',$id)->count();
          $count_comment = DB::table("comments")->where('post_id',$id)->count();
        // $count_comment_replies = $showreplies + $count_comment;
               $replies = DB::table('users')->leftJoin('full_replies','full_replies.user_id','users.id')->where('post_id',$id)->get();
           
            return view('comment_replies.showfull_comment')->with('showcomment',$showcomment)->with('replies',$replies)->with('comment',$comment);
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        if (Auth::check()) {

            $reply = Reply::where(['comment_id'=>$comment->id]);
            $comment = Comment::where(['user_id'=>Auth::user()->id, 'id'=>$comment->id]);
            if ($reply->count() > 0 && $comment->count() > 0) {
                $reply->delete();
                $comment->delete();
                return 1;
            }else if($comment->count() > 0){
                $comment->delete();
                return 2;
            }else{
                return 3;
            }

        }    }
}
