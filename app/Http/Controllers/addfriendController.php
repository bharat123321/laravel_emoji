<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendship;
use App\User;
use App\notification;
use App\Post;
class addfriendController extends Controller
{ 

    public function addFriend($id){
        if (Auth::check()) {
         friendship::create([
            
            'user_requested' => Auth::user()->id, // who is logged in
            'acceptor' => $id,
             'users_id'=>Auth::user()->id,
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString() 
        ]);
     }
     return back()->with('msg','You have Sent Friend Request');
    }
      
     //   public function addFriend(Request $request){
     // Auth::user()->addFriend($request->acceptor_id,$request->post_id);
     
     //    return back();
     //   }

        public function request() {
        
        $uid = Auth::user()->id;
        if($uid>0){

        
        $FriendRequests = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.user_requested')
                         ->where('status', '=', Null)
                        ->where('friendships.acceptor', '=', $uid)->get();
}
      $user1Id = Auth::user()->id;
       $vsd = friendship::where(function($query) use($user1Id){
            $query->orWhere('user_requested', '=', $user1Id);
            $query->orWhere('acceptor', '=', $user1Id);
           })->where('status',1)->get();

     $gets = friendship::get();
   $emp = DB::table('friendships')->where('status',1)->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->first();
         
          
              // foreach($emp as $e){ 
                 
             if($emp == true and $gets == true) {
                
                     $vs = DB::table('friendships')->where('status',1)->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->get();
                
  foreach($vs as $vs){
//user_requested
     $user1Friends[]= 0;
     if($vs->user_requested != Auth::user()->id){
               
                    $c = DB::table('friendships')->where('status',1)->where('acceptor',$vs->user_requested)->orWhere('user_requested',$vs->user_requested)->get();
                 
          foreach($c as $cs){
               if($cs->user_requested != Auth::user()->id){
                 if($vs->user_requested != $cs->user_requested){
                   $user1Friends[]= $cs->user_requested;
                 }
                  
               }
               if($cs->acceptor != Auth::user()->id){
                if($cs->acceptor != $vs->user_requested){
                     $user1Friends[]= $cs->acceptor;  
                       
                }
               }

          }
               
         
     }
     //acceptor
      
     if($vs->acceptor != Auth::user()->id){
         
                 $cd = DB::table('friendships')->where('status',1)->where('acceptor',$vs->acceptor)->orWhere('user_requested',$vs->acceptor)->get();

          foreach($cd as $csd){
              
               if($csd->user_requested != Auth::user()->id){
                if($csd->user_requested != $vs->acceptor){
                  
                       $user1Friends[]=$csd->user_requested;
                    
                           
                }
               }
               
               if($csd->acceptor != Auth::user()->id){

                 if($csd->acceptor != $vs->acceptor){
                        $user1Friends[]= $csd->acceptor; 
                 }
               }

          }
               
         
     }
  
  }
  
 foreach($gets as $gets){
            // echo $gets->user_requested;
               $vd = DB::table('friendships')->where('status',1)->where('acceptor',$gets->user_requested)->orWhere('user_requested',$gets->user_requested)->get();
          foreach($vd as $v){
           if($v->user_requested !=Auth::user()->id){

             $user2Friends[]= $v->user_requested;
           }
           if($v->acceptor != Auth::user()->id){
             $user2Friends[]= $v->acceptor;
           }
            
   
 }
}   

        
               $val =   array_intersect($user1Friends, $user2Friends);
               
                

                    $user2 = implode(',' ,$user2Friends);
                    
                  $va = array_unique($user2Friends);

             $not_friend = User::where('id','!=',Auth::user()->id);
     if(Auth::user()->friendship()->count()){
       $not_friend->whereNotIn('id',Auth::user()->friendship->modelKeys())->whereNotIn('id',Auth::user()->friendsof->modelKeys());
     } 
             $not_friend= $not_friend->get();
         
        
    return view('friend.friend_request',['user'=>Auth::user(),'FriendRequests'=>$FriendRequests,'vs'=>$vsd,'count_mutual'=>$val,'user2'=>$user2,'not_friend'=>$not_friend]);

    }
     else{


           $not_friend = User::where('id','!=',Auth::user()->id);
     if(Auth::user()->friendship()->count()){
       $not_friend->whereNotIn('id',Auth::user()->friendship->modelKeys())->whereNotIn('id',Auth::user()->friendsof->modelKeys());
     } 
             $not_friend= $not_friend->get();
  return view('friend.friend_request',['user'=>Auth::user(),'FriendRequests'=>$FriendRequests,'vs'=>$vsd,'not_friend'=>$not_friend]);
    }
  }

    public function accept($name, $id) {
        $image = User::findorFail($id);
        $uid = Auth::user()->id;
        
        $checkRequest = friendship::where('user_requested', $id)
                ->where('acceptor', $uid)
                ->first();
        if ($checkRequest) {
            // echo "yes, update here";

            $updateFriendship = DB::table('friendships')
                    ->where('acceptor', $uid)
                    ->where('user_requested', $id)
                    ->update(['status' => 1]);


                          

 

            // $notifications = new notification;
            // $notifications->note = 'accepted your friend request';
            // $notifications->acceptor = $id; // who is accepting my request
            // $notifications->user_requested = Auth::user()->id; // me
            // $notifications->status = '1'; // unread notifications
             
            // $notifications->save();
            // return back()->with('msg', 'You are now Friend with ' . $name);
            }
          return back()->with('msg', 'In your id no one has friend');
    }
    //       public function friends() {
    //     $uid = Auth::user()->id;

    //     $friends1 = DB::table('friendships')
    //             ->leftJoin('users', 'users.id', 'friendships.user_requested') // who is not loggedin but send request to
    //             ->where('status', 1)
    //             ->where('acceptor', $uid) // who is loggedin
    //             ->get();

    //     //dd($friends1);

    //     $friends2 = DB::table('friendships')
    //             ->leftJoin('users', 'users.id', 'friendships.acceptor')
    //             ->where('status', 1)
    //             ->where('user_requested', $uid)
    //             ->get();

    //     $friends = array_merge($friends1->toArray(), $friends2->toArray());

    //     return view('index', compact('friends'));
    // }
    public function requestRemove($id) {

        DB::table('friendships')
                ->where('acceptor', Auth::user()->id)
                ->where('user_requested', $id)
                ->delete();

        return back()->with('msg', 'Request has been deleted');
    }


          public function show_mutual_friend($id){
             

               $check = DB::table('friendships')->where('user_requested',$id)->orWhere('acceptor',$id)->get();
             foreach($check as $check){
               if($check->user_requested != $id){
                $collection1[] = $check->user_requested;
               }
               if($check->acceptor != $id){
                $collection1[] = $check->acceptor;
               }
             }


             
            $lt = DB::table('friendships')->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->get();
           foreach($lt as $lt){
            if($lt->user_requested != Auth::user()->id){
               $collection2[] = $lt->user_requested;
            }
            if($lt->acceptor != Auth::user()->id){
              $collection2[] = $lt->acceptor;
            }
           }
                
                $mutual_friend = array_intersect($collection1, $collection2);
               return view('friend.show_mutual_friend')->with('mutual_friend',$mutual_friend);
          }
    

   public function block_friend($id){
    $check = Post::where('user_id',$id)->update(['block'=>'1']);
    
   }
   public function unblock_friend($id){
    $check = Post::where('user_id',$id)->update(['block'=>Null]);
   }

  
    //  public function notification($id){
    //    $uid = Auth::user()->id;
    //     $notes = DB::table('notifications')
    //             ->leftJoin('users', 'users.id', 'notifications.user_requested')
    //             ->where('notifications.id', $id)
    //             ->where('acceptor', $uid)
    //             ->orderBy('notifications.created_at', 'desc')
    //             ->get();

    //     $updateNoti = DB::table('notifications')
    //                  ->where('notifications.id', $id)
    //                 ->update(['status' => 0]);

    //    return view('friend.notification', compact('notes'));
    // } 
} 

?>