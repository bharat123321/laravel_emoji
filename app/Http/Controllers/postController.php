<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\comment;
use App\Like;
use App\friendship;
use App\tag_caption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
 use Carbon\Carbon;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::all();
         $posts = Post::orderBy('created_at', 'desc')->get();
        
         $friend1 = DB::table('friendships')->where('status','!=',Null)->leftjoin('users','users.id','friendships.user_requested')->where('acceptor',Auth::user()->id)->get();

          $friend2 = DB::table('friendships')->where('status','!=',Null)->leftjoin('users','users.id','friendships.acceptor')->where('user_requested',Auth::user()->id)->get();

           $friend = array_merge($friend1->toArray(),$friend2->toArray());
           $friendcheck = DB::table('friendships')->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->get();
         // $countlike = Like::where(['like' => '1']);
         // $countdislike = Like::where(['like' => '0']);
        //  DB::table('users')->where('id')->update(['avatar'=>$filename]);
     return view('post',array('user'=>Auth::user(),'post'=> $posts,'friend'=>$friend,'friendcheck'=>$friendcheck));
    }
    public function showpost(Request $request){
           $uid = Auth::user()->id;
        $posts = Post::get();
        $friended = friendship::get();
         $comments = comment::get();

         return view('posts/index')->with('post',$posts)->with('users',$uid);

    }

    public function post_caption ($id)
    { 
          
           $ch = explode(",",$id);
           if($id !=0){ 
         for ($i=0; $i <count($ch); $i++) { 
            
              $chek = DB::table('users')->where(['id'=>$ch[$i]])->get();
              foreach ($chek as $key => $value) {
                echo "<h5 style='position:relative;left:20px;word-wrap: break-word;'><b>". ucwords($value->firstname) . " " . ucwords($value->lastname) . "</b></h5>";
                echo "<input type='hidden' name='tag_names[]' value=".$value->id.">";
              }
         }

          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $like = DB::table('likes')->insert(['user_id'=>Auth::user()->id ,'post_id'=>$post->id,' like'=>$like ]);
         return view('post')->with(['like'=>$like]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
      //     $data = Validator::make($request->all(),[
      //       'image'=>'required',
      //       'image.*'=>'image|mimes:jpeg,png,jpg|max:20048'],
      //       [
      //           'image.*.max'=>'Sorry!Maximum allowed size for an image is 20MB',
      //            'image.*.required'=>'Please uploads',

      //     // 'video'=>'mimes:mp4,mp3|max:20000',
      // ])->validate();

    $video=$request->video; 
        if (isset($_POST['submit']) && empty($_POST['body']) 
               && empty($request->image) && empty($request->video)) {

               return back()->with('msg','You have not choose any thing');
       }
       
        $body= $request->body;
         
        $post = new Post;
         $img=$request->file('image');
          $post->body = $body;
          $video=$request->file('video'); 
           $post->created_at =\Carbon\Carbon::now()->toDateTimeString();
           $post->updated_at = \Carbon\Carbon::now()->toDateTimeString() ;
           $post->user_id = Auth::user()->id;
           $post->post_option = $request->post_option;  
           if($request->tag_names  == ''){ 
              $post->tag_name = 0;
         }
           
           
         if ($request->hasFile('image')) {
            $data = Validator::make($request->all(),[
            'image'=>'required',
            'image.*'=>'image|mimes:jpeg,png,jpg|max:20048'],
            [
                'image.*'=>'Please upload correct Image File',
                'image.*.max'=>'Sorry!Maximum allowed size for an image is 20MB',
                  
       ])->validate();
               $count_image = count($img);
              foreach($img as $image){ 
            
            $filename = $image->getClientOriginalName();
            $fileextension = $image->getClientOriginalExtension();
         
            
            
              $image->move("uploads/image",$filename);
              
             $files[]= $filename;
        // $file_ext[] = $fileextension;
       
      }

       $post->count = $count_image;
         $images = implode(",", $files); 
       //  $img_ext = implode(",", $file_ext);
          
        $post->image = $images;
         
             }
           
            else if ($request->hasFile('video')) {
                 $datas = Validator::make($request->all(),[
            'video'=>'required',
            'video.*'=>'mimes:mp4,mp3,webm'
           ], [
                'video.*'=>'Sorry!Please upload File in mp4,mp3 and webm',
                
       ])->validate();
                $count_video = count($video);
             foreach($video as $video){ 

            $filenames =  $video->getClientOriginalName();
                
                       
                    $video->move("uploads/video",$filenames);
                    $fil[] = $filenames;
                 
                }
               
                $videos = implode(",", $fil);
                  $post->video =  $videos;
              
                 $post->count_video = $count_video;
            
            }
         //  elseif($request->tag_names  != false){ 
         //    $tag_names = implode(",", $request->tag_names);
         //      echo  $post->tag_name = $tag_names;

         // } 
         
             else{
                echo 'skdj';
             }
             
               if($request->tag_names != false){
                $tag = implode(",", $request->tag_names);
                  $post->tag_name = $tag;

               }
              
                $post->save();

        // if ($request->tag_names != '') {
        //      $check = implode(",", $request->tag_names);
        //     // $tag_caption = new tag_caption;
        //     //  $tag_caption->Tag_To = $check; 
        //     //  $tag_caption->Tag_By = Auth::user()->id;
        //      foreach ($request->tag_names as  $value) {
            
        //         tag_caption::create([
        //            'Tag_To' => $value,
        //            'Tag_By' =>Auth::user()->id
              
        //         ]);
 
        //      }

            

        //    }
                return back();
                 
                 
                    

       
                 }
         
               
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showimage($id)
    {
         $posts =  Post::where('id',$id)->get();
    return view('posts.showfull_image')->with('post',$posts);
       
    }
 
    public function showvideo($id){
      $posts =  Post::where('id',$id)->get();
    return view('posts.showfull_video')->with('post',$posts);
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
    /*public function destroy($id)
    {
        $post_id = $requst['postId'];
         $is_like = $request['isLike']=='true';
         $update =false;
         $post = Post::find($post_id);
         if(!$post){
            return null;
         }
          $user = Auth::user();
          $like = $user->likes()->where('post_id',$post_id)->first();
          if($like){
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like){
                $like->delete();
                return null;
            }
          }else{
            $like = new Like();
          }
           $like->like = $is_like;
           $like->user_id = $user->id;
           $like->post_id = $post->id;
           if($update){
            $like->update();
           }           
           else{
            $like->save();
           }
           return null;
    }*/
}
