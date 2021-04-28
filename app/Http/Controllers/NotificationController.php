<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
use App\comment;
use App\Like;
use DB;
use App\Post;
use App\User;
use App\Notifications\notifications;
class NotificationController extends Controller
{
    public function get() {
        $notification = Auth::user()->unreadNotifications;
        return $notification;
    }

    public function read(Request $request) {
        Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
        return 'success';
    }
    public function index(){
       // $check = auth()->user()->notifications()->orderBy('created_at','desc')->get();
         
            $notif = DB::table('notifies')->where('replies_user_id',Auth::user()->id)->orderBy('created_at','Asc')->get();

               $check_notif_comment = DB::table('users')->leftJoin('notifies','notifies.commented_user_id','users.id')->where('replies_user_id',Auth::user()->id)->where('comment_status',1)->orderBy('notifies.created_at','desc')->get();
               $check_notif_like = DB::table('users')->leftJoin('notifies','notifies.commented_user_id','users.id')->where('replies_user_id',Auth::user()->id)->where('like_status',1)->orderBy('notifies.created_at','desc')->get();
          
        return view('notify.checkNotification')->with('notification_comment',$check_notif_comment)->with('notification_like',$check_notif_like);

             

    }
}
