<?php
use App\User;
use App\Post;
use App\story;
use App\comment;
use App\Like;
use App\postview;
use App\Dislike;
use App\friendship;
use App\Reply;
use App\Notifications\notifications;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 Route::get('/notifiy', function () {
   $user =Auth::user();
   $details = [
      'body'=>'This is my first notifications',
      'title'=>'hi its me'
   ];
   Notification::send($user, new notifications($details));
   dd('done');
});

Route::get('/marksasread', function () {
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
});

Route::get('/', function () {
 
    return view('welcome');
});
Route::get('/test', function () {
 
    return view('text')->with('users',Auth::user());
});
Route::get('/story/{id}', function ($id) {
   $posted = story::find($id);
    return view('story/story')->with('posted',$posted);
});
Route::get('show_exibit_in_search/{id}', function ($id) {
  $post = User::find($id);

    return view('search',['From_user'=>$post]);
});


   
 
 

//   Route::get('/message/{id}', function ($id) {
//      $check_id = User::find($id);
//       return view('message_chat')->with('check_id',$check_id);
// });

 
 
 Route::get('/message','messengerController@index');
Route::get('/messaged/{id}', 'messengerController@getMessage')->name('messaged');
Route::post('/messaged','messengerController@sendMessage');
Route::post('/chat','messengerController@get_chat');

Route::get('/post', 'postController@index');
Route::get('/post_caption/{id}','postController@post_caption');
Route::post('/posts', 'postController@store') ;
Route::get('/showfullimage/{id}', 'postController@showimage');
Route::get('/showfullvideo/{id}', 'postController@showvideo');
Route::post('/story_uploads', 'storyController@store') ;

  Route::get('/index', function (Request $request) {
       $uid = Auth::user()->id;
        $posts = Post::get();
        $friended = friendship::get();
        $comments = comment::get();
        $friends1 = DB::table('friendships')
                ->leftJoin('posts', 'posts.user_id', 'friendships.user_requested') 
                // who is not loggedin but send request to
                ->leftJoin('users','users.id','friendships.user_requested')
                ->where('status', 1)
                ->where('acceptor', $uid) // who is loggedin
                ->get();

        $friends2 = DB::table('friendships')
                ->leftJoin('posts', 'posts.user_id', 'friendships.acceptor')
                 ->leftJoin('users', 'users.id', 'friendships.acceptor')
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();
               $countlike = Like::where(['like' => '1']);
     $countdislike = Like::where(['like' => '0']);
     
     

        $friends = array_merge($friends1->toArray(), $friends2->toArray());

          return view('index',array('user'=>Auth::user(), 'comments' => $comments,'post'=> $posts,'friends'=>$friends,'friended' =>$friended , 'countlike'=>$countlike, 'countdislike'=>$countdislike));
       
});

Route::get('/postview/{id}','postviewController@show');
Route::get('/profile','ProfileController@profile');
Route::get('/showAll_image/','ProfileController@add_info');
Route::get('/showAll_image_ofFriend/{id}','ProfileController@friend_info');
Route::get('/tag_count/{id}','ProfileController@Tag_Count');
Route::get('/edit_tag_show/{id}','ProfileController@Edit_Tag');
Route::post('/post_edit','ProfileController@post_edit');
Route::get('/fetch_all_photo/{id}','ProfileController@fetch_all_photo');
Route::get('/fetch_all_video/{id}','ProfileController@fetch_all_video');
Route::get('/fetch_all_friend/{id}','ProfileController@fetch_all_friend');
Route::get('/fetch_all_user_friend/{id}','ProfileController@fetch_all_user_friend');
Route::get('/fetch_all_mutual_friend/{id}','ProfileController@fetch_all_mutual_friend');
Route::post('/profile','ProfileController@update_profile');

//Route::post('/profile','ProfileController@add_info');



Route::get('/showposts/','ProfileController@index')->middleware('auth');

Route::get('/search','SearchController@searched');
Route::get('search_friend','SearchController@searchFriend') ;
Route::get('/view/{id}','viewController@index');
 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@indexabout');

 Route::get('/showliked/{id}','likeController@showliked');
Route::get('/showlike/{id}','likeController@exibitlike');
// Route::get('/liked/{id}','likeController@index');
Route::post('/liked/','likeController@index');
Route::post('/dislike/','likeController@remove');
Route::post('/likefullimage/','likeController@likefullimage');
 // Route::get('/dislike/{id}','likeController@remove');
Route::post('/dislikefullimage/','likeController@dislikefullimage');

 
Route::group(['middleware' => 'auth'], function () {
 Route::get('/addFriend/{id}', 'addfriendController@addFriend');
Route::get('/show_mutual_friend/{id}','addfriendController@show_mutual_friend');
Route::get('/friend_request/', 'addfriendController@request');
Route::get('friends', 'addfriendController@friends');
Route::get('/accept/{name}/{id}', 'addfriendController@accept');

 Route::get('/requestRemove/{id}', 'addfriendController@requestRemove');
Route::get('/block/{id}','addfriendController@block_friend');
Route::get('/unblock/{id}','addfriendController@unblock_friend');
 Route::get('/notification/{id}','addfriendController@notification');
Route::post('/notification/get', 'NotificationController@get');
Route::post('/notification/read', 'NotificationController@read');
Route::get('/unfriend/{id}', function($id){
             $loggedUser = Auth::user()->id;
              DB::table('friendships')
              ->where('user_requested', $loggedUser)
              ->where('acceptor', $id)
              ->delete();
              DB::table('friendships')
              ->where('acceptor', $loggedUser)
              ->where('user_requested', $id)
              ->delete();
               return back()->with('msg', 'You are not friend with this person');
        });
    // Route::get('/accept/{name}/{id}', 'addfriendController@accept');
    // Route::get('friends', 'addfriendController@friends');
    // Route::get('requestRemove/{id}', 'addfriendController@requestRemove');
});
  Route::resource('/comments','CommentController');
Route::post('/comment_sub','CommentController@store_comment');
Route::get('/comment/{id}','CommentController@index');
Route::get('/comment_delete/{id}','CommentController@comment_delete');
Route::get('/commentdesign/{id}','CommentController@show');
Route::get('/commentfulldesign/{id}','CommentController@showfull_imagecomment');
Route::get('/comment_del_fulldesign/{id}','CommentController@comment_del_fulldesign');
Route::get('/showfull_image/{id}/{image}','CommentController@showfull_image');
Route::get('/showfull_video/{id}/{video}','CommentController@showfull_video');
Route::get('/comment_thread/{thread}','commentThreadController@getThread');
Route::post('/fullimage_comment','CommentController@fullimage_comment');

Route::post('/replies_full_store','RepliesController@replies_full_store');
Route::resource('/replies','RepliesController');
Route::get('/repldesign/{id}/{name}','RepliesController@show');
Route::get('/reply_delete/{id}','RepliesController@reply_delete');
Route::get('/full_repldesign/{id}/{name}','RepliesController@show_full_reply');
Route::resource('/change','changeController');
Route::get('/notification','NotificationController@index');
 