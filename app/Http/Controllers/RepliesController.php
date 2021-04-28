<?php

namespace App\Http\Controllers;
 use Session;  
use Illuminate\Support\Facades\DB; 
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\comment;
use App\User;
use App\Post;
use App\full_replies;
class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
            $user = Auth::user();
         $post_id =Post::findorFail($id);   
         $comme = comment::all();
         $posts = DB::table('users')->leftJoin('replies','replies.user_id','users.id')->where('comment_id',$id)->get();
         return view('showcomment')->with('replies',$posts);
    }

          public function reply_delete($id){
            DB::table('replies')->where('id',$id)->where('user_id',Auth::user()->id)->delete();
            return back();
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
            Reply::create([
                'comment_id' => $request->input('comment_id'),
                 'firstname' => Auth::user()->firstname,
                'lastname' => Auth::user()->lastname,
                'reply' => $request->input('reply'),
                'user_id' => Auth::user()->id,
                'reply_id'=>$request->reply_id,
                'post_id' =>  $request->post_id,
                'reply_name'=>$request->reply_name,
            ]);

            return back()->with('success','Reply added');
        }

        return back()->withInput()->with('error','Something wronmg');
        
    }

         public function replies_full_store(Request $request){
             $comment_id = $request->input('comment_id');
             $replyd = $request->input('reply');
             $post_id = $request->post_id;
             $reply_fname = $request->reply_fname;
             $reply_lname = $request->reply_lname;
             $reply_id = $request->reply_id;
        
             $reply = new full_replies;
             $reply->reply = $replyd;
             $reply->post_id = $post_id;
             $reply->user_id = Auth::user()->id;
             $reply->full_reply_id = $reply_id;
             $reply->firstname = Auth::user()->firstname;
             $reply->lastname = Auth::user()->lastname;
             $reply->full_comment_id = $comment_id;
             $reply->reply_fname = $reply_fname;
             $reply->reply_lname = $reply_lname;
             $reply->save();
             return back();
         }
    /**
     * Display the specified resource.
     *s
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$name)
    {
             
               $che = DB::table('replies')->where('id',$id)->get();
          
           return view('reply.show_replies_form')->with('reply',$che);
    }
public function show_full_reply($id,$name){
    $che = DB::table('full_replies')->where('id',$id)->get();
    return view('reply.show_full_replies')->with('reply',$che);
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy(Reply $reply)
    {
        if (Auth::check()) {
            $reply = Reply::where(['id'=>$reply->id,'user_id'=>Auth::user()->id]);
            if ($reply->delete()) {
                return 1;
            }else{
                return 2;
            }
        }else{

        }
        return 3;
    }
}
