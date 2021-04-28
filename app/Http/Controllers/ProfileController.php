<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\postview;
use App\comment;
use App\Like;
use App\story;
use App\Dislike;
use App\friendship;
use Illuminate\Support\Facades\DB;
 use Carbon\Carbon;
class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){ 
     $dat = Carbon::now()->subHours(3);
     $date = Carbon::parse(request('date'));
         $uid = Auth::user()->id;
       //  $postes =  Post::where('user_id',Auth::user()->id)->where('created_at','>',Carbon::now()->subHour(2))->orderBy('created_at','desc')->get();
    
       $postes =   Post::where('tag_name',0)->orWhere('tag_name','!=',0)->orderBy('created_at','desc')->get();
    
     
        $story = story::all();
        
        $friended = friendship::get();
        

             $friends1 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.user_requested')
                // who is not loggedin but send request to
              ->leftJoin('posts','posts.user_id','friendships.user_requested')
                 ->orderBy('posts.created_at','desc')
                  ->where('status', 1)
                ->where('acceptor', $uid) // who is loggedin
             ->get();

                     $friends2 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.acceptor')
                ->leftJoin('posts','posts.user_id','friendships.acceptor')
                ->orderBy('posts.created_at','desc')
                 ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();
            
      $countlike = DB::table('likes')->leftJoin('posts','posts.id','likes.post_id')->where(['like' => 1])->get();
     $countdislike = Like::where(['like' => '0'])->get();
     // $countComment = DB::table('comments')->leftJoin('posts','posts.id','comments.post_id')->where(['statues'=>1])->get();
       $friends = array_merge($friends1->toArray(), $friends2->toArray());

   /* From here  story*/
        $friendst1 = DB::table('friendships')
         ->leftJoin('users', 'users.id', 'friendships.user_requested') 
                 ->leftJoin('stories','stories.user_id','friendships.user_requested')
                ->where('status', 1)
                ->where('acceptor', $uid) // who is loggedin
                ->get();
        $friendst2 = DB::table('friendships') 
                ->leftJoin('users', 'users.id', 'friendships.acceptor')
                ->leftJoin('stories', 'stories.user_id', 'friendships.acceptor')
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();
        
        $friendstory = array_merge($friendst1->toArray(), $friendst2->toArray());
                
                //count the story of friends and user
        $cldk = DB::table('stories')->where('user_id',Auth::user()->id)->get();
            $store = $cldk->count();
            
      //view from here
            $posted =DB::table('posts')->leftJoin('postviews','postviews.post_id','posts.id')->get();
      return view('posts.mydesign')->with('post',$postes)->with('users',$uid)->with('friends',$friends)->with('countlike',$countlike)->with('countdislike',$countdislike)->with('poststory',$story)->with('friendstory',$friendstory)->with('posted',$posted)->with('count_store',$store);
    }
    public function profile(){
        
    	return view('profile',array('user'=>Auth::user()));
    }
public function update_profile(Request $request){
 
  echo	$avatar = $request->file('my_profile'); 
    if($request->hasFile('my_profile')){
     $filename = time() . '.' . $avatar->getClientOriginalExtension();	
       $avatar->move("uploads/avatar",$filename);
       $obj = Auth::user()->id;
         DB::table('users')->where('id',$obj)->update(['avatar'=>$filename]);
             }
              
 
}

          // Add information function
public function add_info(Request $request){
        
     $id = Auth::user()->id;
        $users = DB::table("users")->where('id',$id)->get();
       $post_count = DB::table("posts")->where('user_id',$id)->count();
      // $posted =  Post::where('user_id',Auth::user()->id)->where('tag_name',0)->orWhere('tag_name','!=',0)->orderBy('created_at','desc')->get();

    $posted=  Post::where('tag_name',0)->orWhere('tag_name','!=',0)->orderBy('created_at','desc')->get();
    $pst = Post::get();
//      foreach($posted as $va){
//       if($va->user_id == auth::user()->id){

//       }
//       if($va->user_id != auth::user()->id){ 
//        $check = explode(",", $va->tag_name);
//        for ($i=0; $i <count($check); $i++) { 
//            $tag_na = DB::table('users')->where('id',$check[$i])->get();
//            foreach($tag_na as $tag_na){ 
//            if($tag_na->id == auth::user()->id){
//             echo $va->user_id;
//            }
//          }
//        }
//      }
// }
//    die;

         $tag_posted=  Post::where('tag_name',0)->orWhere('tag_name','!=',0)->orderBy('created_at','desc')->get();
         $total_friend_count =  DB::table('friendships')->where('user_requested',$id)->orWhere('acceptor',$id)->where('status','!=',null)->count();  

     $gets = friendship::get();
    $emp = DB::table('friendships')->where('status',1)->where('user_requested',$id)->orWhere('acceptor',$id)->first();
         
          
              // foreach($emp as $e){ 
                 
             if($emp == true and $gets == true) {
                
                    $vs = DB::table('friendships')->where('status',1)->where('user_requested',$id)->orWhere('acceptor',$id)->get();
                
  foreach($vs as $vs){
//user_requested
     $user1Friends[]= 0;
     if($vs->user_requested != $id){
               
                       $cd = DB::table('friendships')->where('status',1)->where('acceptor',Auth::user()->id)->orWhere('user_requested',Auth::user()->id)->get();
               foreach($cd as $cd){
                   if($cd->user_requested != Auth::user()->id){
                    if($cd->user_requested != $id){
                     $user1Friends[] =  $cd->user_requested;
                    }
                  }
                  if($cd->acceptor != Auth::user()->id){
                    if($cd->acceptor != $id){
                     $user1Friends[] = $cd->acceptor;
                    }
                  }
                }

         }
     //acceptor
      
     if($vs->acceptor != $id){
          
                      $cd = DB::table('friendships')->where('status',1)->where('acceptor',Auth::user()->id)->orWhere('user_requested',Auth::user()->id)->get();
                foreach($cd as $cd){
                   if($cd->user_requested != Auth::user()->id){
                    if($cd->user_requested != $id){
                     $user1Friends[] =  $cd->user_requested;
                    }
                  }
                  if($cd->acceptor != Auth::user()->id){
                    if($cd->acceptor != $id){
                     $user1Friends[] = $cd->acceptor;
                    }
                  }
                }
 }
  
  }

  
 
            // echo $gets->user_requested;
             $vd = DB::table('friendships')->where('status',1)->where('acceptor',$id)->orWhere('user_requested',$id)->get();
          
                 foreach($vd as $vd){
                  if($vd->user_requested != Auth::user()->id){ 
                    if($vd->user_requested != $id){
                      $user2Friends[] = $vd->user_requested;
                    }
                 }
 
                if($vd->acceptor != Auth::user()->id){
                  if($vd->acceptor != $id){
                     $user2Friends[] = $vd->acceptor;
                  }
                  }
                }
          $val =   array_intersect($user1Friends, $user2Friends);
             $mutual_friend =  array_unique($val);
             
            // $vn = array_count_values($mutual_friend);
               return view('posts.showdetail')->with('users',$users)->with('posted',$posted)->with('tag_posted',$tag_posted)->with('post_count',$post_count)->with('total_friend_count',$total_friend_count)->with('count_mutual',$mutual_friend)->with('pst',$pst);        
          }
          else{

             return view('posts.showdetail')->with('users',$users)->with('posted',$posted)->with('tag_posted',$tag_posted)->with('post_count',$post_count)->with('total_friend_count',$total_friend_count)->with('pst',$pst);
          }






    

}

 
public function fetch_all_photo($id){

    $post = DB::table("posts")->where('user_id',$id)->get();
    return view('posts.show_all_image')->with('post',$post);
}
public function fetch_all_video($id){
     $post = DB::table("posts")->where('user_id',$id)->get();
    return view('posts.show_all_video')->with('post',$post);
}
public function fetch_all_friend($id){
  $check_friend = DB::table('friendships')->where('user_requested',$id)->orWhere('acceptor',$id)->get();
   $add_friend1 =  DB::table('friendships')->leftJoin('users','users.id','friendships.acceptor')->where('user_requested',$id)->where('status','!=',null)->get(); 
      
     $add_friend2 =  DB::table('friendships')->leftJoin('users','users.id','friendships.user_requested')->where('acceptor',$id)->where('status','!=',null)->get();

     $friend = array_merge($add_friend1->toArray(),$add_friend2->toArray());
      
   $user = DB::table('users')->where('id',$id)->get();
   return view('posts.fetch_all_friend')->with('friend',$friend)->with('users',$user)->with('check_friend',$check_friend);
}
public function fetch_all_user_friend($id){
  $check_friend = DB::table('friendships')->where('user_requested',$id)->orWhere('acceptor',$id)->get();
   $add_friend1 =  DB::table('friendships')->leftJoin('users','users.id','friendships.acceptor')->where('user_requested',$id)->where('status','!=',null)->get(); 
      
     $add_friend2 =  DB::table('friendships')->leftJoin('users','users.id','friendships.user_requested')->where('acceptor',$id)->where('status','!=',null)->get();

     $friend = array_merge($add_friend1->toArray(),$add_friend2->toArray());
      
   $user = DB::table('users')->where('id',$id)->get();
   return view('posts.fetch_all_user_friend')->with('friend',$friend)->with('users',$user)->with('check_friend',$check_friend)->with('id',$id);
}

 public function fetch_all_mutual_friend($id){
     $check = DB::table('friendships')->where('status',1)->where('user_requested',$id)->orWhere('acceptor',$id)->get();
             foreach($check as $check){
               if($check->user_requested != $id){
                $collection1[] = $check->user_requested;
               }
               if($check->acceptor != $id){
                $collection1[] = $check->acceptor;
               }
             }


             
            $lt = DB::table('friendships')->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->get();
             $collection2[]=0;
           foreach($lt as $lt){

            if($lt->user_requested != Auth::user()->id){
               $collection2[] = $lt->user_requested;
            }
            if($lt->acceptor != Auth::user()->id){
              $collection2[] = $lt->acceptor;
            }
           }
                
                $mutual_friend = array_intersect($collection1, $collection2);

           return view('friend.fetch_all_mutual_friend')->with('mutual_friend',$mutual_friend)->with('id',$id);
 }


public function friend_info($id){
       
       $users = DB::table("users")->where('id',$id)->get();
       $post_count = DB::table("posts")->where('user_id',$id)->count();
      // $posted =  Post::where('user_id',$id)->where('tag_name',0)->orWhere('tag_name','!=',0)->orderBy('created_at','desc')->get();
  $posted=  Post::where('tag_name',0)->orWhere('tag_name','!=',0)->orderBy('created_at','desc')->get();

    $total_friend_count =  DB::table('friendships')->where('status','!=',null)->where('user_requested',$id)->orWhere('acceptor',$id)->count(); 
 
      $gets = friendship::get();
    $emp = DB::table('friendships')->where('status',1)->where('user_requested',$id)->orWhere('acceptor',$id)->first();
         
          
              // foreach($emp as $e){ 
                 
             if($emp == true and $gets == true) {
                
                     $vs = DB::table('friendships')->where('status',1)->where('user_requested',$id)->orWhere('acceptor',$id)->get();
                
  foreach($vs as $vs){
//user_requested
     $user1Friends[]= 0;
     if($vs->user_requested != $id){
               
                        $cd = DB::table('friendships')->where('status',1)->where('acceptor',Auth::user()->id)->orWhere('user_requested',Auth::user()->id)->get();
               foreach($cd as $cd){
                   if($cd->user_requested != Auth::user()->id){
                    if($cd->user_requested != $id){
                     $user1Friends[] =  $cd->user_requested;
                    }
                  }
                  if($cd->acceptor != Auth::user()->id){
                    if($cd->acceptor != $id){
                     $user1Friends[] = $cd->acceptor;
                    }
                  }
                }

         }
     //acceptor
      
     if($vs->acceptor != $id){
          
                       $cd = DB::table('friendships')->where('status',1)->where('acceptor',Auth::user()->id)->orWhere('user_requested',Auth::user()->id)->get();
                foreach($cd as $cd){
                   if($cd->user_requested != Auth::user()->id){
                    if($cd->user_requested != $id){
                     $user1Friends[] =  $cd->user_requested;
                    }
                  }
                  if($cd->acceptor != Auth::user()->id){
                    if($cd->acceptor != $id){
                     $user1Friends[] = $cd->acceptor;
                    }
                  }
                }
 }
  
  }

  
               
             
            // echo $gets->user_requested;
               $vd = DB::table('friendships')->where('status',1)->where('user_requested',$id)->orWhere('acceptor',$id)->get();
             $user2Friends[] = 0;
                 foreach($vd as $vd){
                  if($vd->user_requested != Auth::user()->id){ 
                    if($vd->user_requested != $id){
                      $user2Friends[] = $vd->user_requested;
                    }
                 }
 
                if($vd->acceptor != Auth::user()->id){
                  if($vd->acceptor != $id){
                     $user2Friends[] = $vd->acceptor;
                  }
                  }
                }
            
          $val =   array_intersect($user1Friends, $user2Friends);
 
           // $mutual_friend =  array_unique($val);
            
           $count_mutual_friend =  array_filter($user2Friends);

            
            // $vn = array_count_values($mutual_friend);
                      
         return view('posts.showdetail_Of_friend')->with('users',$users)->with('posted',$posted)->with('total_friend_count',$total_friend_count)->with('post_count',$post_count)->with('count_mutual',$count_mutual_friend)->with('id',$id);        
          }
          else{
                $mutual_friend = 0;
             return view('posts.showdetail_Of_friend')->with('users',$users)->with('posted',$posted)->with('post_count',$post_count)->with('total_friend_count',$total_friend_count)->with('count_mutual',$count_mutual_friend)->with('id',$id);
          }


            // return view('posts.showdetail_Of_friend')->with('users',$users)->with('posted',$posted)->with('post_count',$post_count)->with('total_friend_count',$total_friend_count)->with('count_mutual',$mutual_friend)->with('id',$id);
}


    // Tag

  public function Tag_Count($id){
      $check = Post::where('id',$id)->get();
      return view('posts.tag_show_&_count')->with('tag',$check)->with('id',$id);

  }
  public function Edit_Tag($id){

      $check = Post::where('id',$id)->get();

      echo "<input type='hidden' name='post_edit_val' value=".$id.">";
     // echo "<input type='button' id='check_submit' class='submit_edit_post' edit_post=".$id." value='Done' style='width:auto;position: relative;bottom:-20px;'' class='btn-danger'>" ;
     // return view('posts.tag_edit_tag')->with('edit_tag',$check)->with('id',$id);

  }

  public function post_edit(Request $request){
   echo $edit_post = $request->edit_post_show;
    echo $post_id = $request->post_edit_val;
    DB::table('posts')->where('id',$post_id)->update(['post_option'=>$edit_post]);
    return back();
  }


}
