<!DOCTYPE html>
<html>
<head>
  <title style="color:red;font-weight: bold">BO Chatting</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/icon" href="upload/image/title_design.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/designs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/tag_design.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('/css/messagedesign.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/emoji_button.css') }}">
</head>
<body>

  <div class="allMyindex">

    <div class="nav">
       
      <div class="search">
        <form method="get" id="form-data">
          
         <input type="text" name="search"  onkeyup="document.getElementById('showsearch').style.display='block'" style="width:auto"; placeholder="Search" id="search_people" class="search_che">
         
       </form>
 </div>
 
   <!-- <a href="/showAll_image">  <img src="/uploads/avatar/{{Auth::user()->avatar}}" class="profile_design" ></a> -->
    <img src="/uploads/avatar/{{Auth::user()->avatar}}" id="profile_design" class="user_profile" value="{{Auth::user()->id}}">
 
  <a href="#" class="dropbtn" onclick="document.getElementById('mydropdown').style.display = 'block'"> @if(strlen(Auth::user()->firstname) <=10) {{ucwords(Auth::user()->firstname )}}@else {{substr(ucwords(Auth::user()->firstname ),0,10)}}..  @endif<span class="caret"></span> </a>
   <div class="dropdown" id="mydropdown">

<!-- friend request -->
    <a href="{{url('/friend_request')}}">My Requests  <span style="color:green; font-weight:bold;font-size:16px">({{App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count()}})</span></a>
    <!-- ending friend request -->
    <a href="{{ url('/post')}}">Post</a> 
    <a href="{{ url('/profile')}}">Change Profile</a>
    <!-- logout -->
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
   document.getElementById('logout-form').submit();"> Logout  </a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  {{ csrf_field() }}  </form>
<!-- ending logout --> 
   </div>
      <img src="upload/image/ho.jpg"  class="home_design" onclick="homeclick()" onmouseover="homeover()" onmouseout="homeout()" >   
     <img src="upload/image/addfriend.jpg"  class="add_friend_design" onclick="addclick()" onmouseover="addfriendover()" onmouseout="addfriendout()"> 
     <?php   $v = App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count(); ?> 
      <span class="number_of_friend_request"><b> ({{App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count()}})  </b> </span>  
      <img src="upload/image/notification.jpg"  class="notification_design" onclick="notifyclick()" onmouseover="notifover()" onmouseout="notifout()">
       
      <span class="number_of_notifcation"><b>
      <?php   $like_count = App\notify::where('like_status',1)->where('replies_user_id',Auth::user()->id)->count();
        $comment_count = App\notify::where('comment_status',1)->where('replies_user_id',Auth::user()->id)->count();
        $add_like_comment = $like_count + $comment_count;
       ?>
       ({{$add_like_comment}}) </b> </span>
             

        <img src="upload/image/mess.jpg"  class="messenger_design" onclick="messengerclick()" onmouseover="messengerover()" onmouseout="messengerout()">  

     </div>
  
       <?php  $user = Auth::user();   ?>
     
        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <div id="showsearch"> 
       </div>
       <div class="allMyhome">
      <div class="hellow">
 <img src='upload/image/loading.gif' style="position: relative;left: 30%; display: none;" id="loading">
 
        @if($post->count() > 0)
        @foreach ($post as $post)
     
        @if(Auth::user()->id == $post->user_id) 
         
       
        
       @if(Carbon\Carbon::now()->subMinutes(5)->diffForHumans() <= $post->formattedCreatedDate())
        
      <div class="col-md-6">
         <div class="panel">
        <div class="well">
         
               
     <!-- <a href="/showAll_image"> <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;  "></a> -->
            <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;cursor: pointer;" class="user_profile" value="{{Auth::user()->id}}">
                  <h2 id="text_of_user" style="color:black;cursor: pointer;"><b>{{strtoupper($user->firstname)}}</b></h2>
                   {{ $post->formattedCreatedDate() }} 
                   <img src="upload/image/world_image.png" style="position:relative; top:5px;width:20px;">
                   <br>
            <div style="margin-left:10px;">
                       <hr>
                       @if($post->body != '')
                    <h2 id="text_of_user">{{$post->body}}</h2>
                   @endif
                   @if($post->image != '')
        <?php 
                      $p_c = $post->count;
                        $ex = explode(",", $post->image);
                      
                     // if(count($ex) == $post->count){
                       if($post->count > 3){ 
                      for ($i=0; $i <= 2; $i++) { 
                           
                     
                    // foreach( explode(",", $post->image)as $images ){
                       ?>

                  <a href="/showfullimage/{{$post->id}}" style="text-decoration: none;"> <img src="/uploads/image/{{$ex[$i]}}" class="show_multiple_image"> </a>  

                   
<?php
  $ch = $p_c - 3;
}?>
<a href="/showfullimage/{{$post->id}}" style="text-decoration: none;">
       <img src="/uploads/image/{{$ex[$i]}}"style="border:1px solid gray; width:120px; height: 120px;position:relative; top:0px; left:10px;  margin:auto 0px; border-radius:10px;opacity:0.5;">
       @if($ch < 9)
       <span class="count_number_of_image">+{{$ch}}</span>
      @else
<span class="count_number_of_imageses">+{{$ch}}</span>
@endif
     </a><hr>
<?php }
if($post->count <= 3 and $post->count ==3){
foreach( explode(",", $post->image)as $images ){
 ?>
<a href="#" style="text-decoration: none;"><img src="/uploads/image/{{$images}}"  class="show_upto_three_image" ></a>
<?php }
}
if($post->count <=2 and $post->count == 2){
  foreach( explode(",", $post->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;width:300px;height: 300px;">
<?php }
}
if($post->count <=1 and $post->count == 1){
  foreach( explode(",", $post->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;   width:100%;height:100%;">
<?php }
}
?>
 
     @endif
                 @if($post->video != '')
            <?php 
            $p_c = $post->count_video;
            $exs = explode(",", $post->video);
            if($post->count_video > 3){ 
           for ($i=0; $i <= 1; $i++) { 
            // foreach( explode(",", $post->video)as $videos ){
            
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$exs[$i]}}" type="video/mp4">  
    
</video> 
<?php
  $chs = $p_c - 2;
}?><a href="/showfullvideo/{{$post->id}}"><span class="count_number_of_video"><span id="video_click" style="display: block;">click here</span><span id="count_video">+{{$chs}}</span></span></a>
           <hr>
          
<?php }
 if($post->count_video <= 3 and $post->count_video == 3){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
if($post->count_video <= 2 and $post->count_video == 2){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
  if($post->count_video <= 1 and $post->count_video == 1){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="100%" height="100%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
      ?>
@endif   
</div>
  
                 <br>
                 <div class="user_like_comment">
                    <?php  $checks = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
                           if($checks== ''){ 

                     ?>
                    
           <span class="badge liked" id="{{$post->id}}"  style="position: relative;top:0px; cursor: pointer;">Liked {{$post->getlikes($post->id)}}</span> 
<hr>       
       
         
          <span id="{{$post->id}}" class="btn-btn-primary likessy" data-post="{{$post->body}}" style="position: relative;top:0px;left:-30px;text-decoration: none;" >Like</span>   

  <?php } else{ ?>

                    <span class="badge liked" id="{{$post->id}}">Liked {{$post->likes->count()}} </span>  
                    <hr>
                     
     <span id="{{$post->id}}" class="btn-btn-primary likessy" data-post="{{$post->body}}" data-user="{{Auth::user()->id}}" style="position:relative;top:0px;left:-30px;">You like this post</span>                                                                                    <?php } ?>
                  <span class="btn-danger dislike" id="{{$post->id}}" data-type="dislike" style="position:relative;top:0px;left:-40px; ">Dislike</span> 
               <?php 
             $showreplies = DB::table('replies')->where('post_id',$post->id)->count();    
          $count_comment = DB::table("comments")->where('post_id',$post->id)->count();
          $add = $showreplies + $count_comment;
                 ?>  
                    <!-- <a href="{{url('/comment/'.$post->id)}}"> -->
                    <span class="btn-btn-secondary commented" id="{{$post->id}}">Comment {{$add}} </span> 
                  <!-- </a> -->
                      
                         <!--  Get the total number of views   -->
                    <!--  <a href="{{url('postview/'.$post->id.'/')}}">{{$post->postview->count()}}</a> ; -->
                    
                  

<!-- comment -->
     <div class="form-group">
                              <span style="position:relative;top:0px"> 
  <textarea class="form-control" id="comments" name="comment" user-id="{{Auth::user()->id}}" post_id ="{{$post->id}}" pst_firstname="{{$post->user->firstname}}" pst_lastname="{{$post->user->lastname}}" pst_body="{{$post->body}}"data-emojiable="true"data-meteor-emoji="true"
               
      placeholder="Write something from your heart..!"></textarea></span>
                            </div>
                        </div>
                        
        
        </div>
        </div>
         </div> 
         @else

          @endif
      @endif


    <?php  $ch = DB::table('friendships')->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->first();
           ?>
           @if($ch == false)
            
           @if(Auth::user()->id == $post->user_id) 
          
        <div class="col-md-6">
         <div class="panel">
        <div class="well">
         
               
     <!-- <a href="/showAll_image"> <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;  "></a> -->
            <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;cursor: pointer;" class="user_profile" value="{{Auth::user()->id}}">
                  <h2 id="text_of_user" class="user_profile" value="{{Auth::user()->id}}" style="color:black;cursor: pointer;"><b>{{strtoupper($user->firstname)}}</b></h2>
                   {{ $post->formattedCreatedDate() }} 
  @if($post->tag_name == 0)
          @if($post->post_option == 'public')
        <!-- <b style="font-size:14px;color:black;cursor: pointer;" class="edit_tag_show" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">{{$post->post_option}}</b>   -->
        <img src="upload/image/world_image.png" style="position: relative;top:5px;cursor: pointer;" width="20px" class="edit_tag_show" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">
        @endif
   @endif
       @if($post->tag_name != 0)
       @if($post->post_option == 'public')
         <!-- <b style="font-size:14px;color:gray;cursor: pointer;" class="edit_tag_show_friend" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">{{$post->post_option}}</b> -->
         <img src="upload/image/world_image.png" style="position: relative;top:5px;cursor: pointer;" width="20px" class="edit_tag_show_friend" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">
      @endif
       @endif
        @if($post->tag_name == 0)
          @if($post->post_option == 'private')
        <!-- <b style="font-size:14px;color:black;cursor: pointer;" class="edit_tag_show" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">{{$post->post_option}}</b>   -->
        <img src="upload/image/private_image.png" style="position: relative;top:5px;cursor: pointer;" width="20px" class="edit_tag_show" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">
        @endif
   @endif
       @if($post->tag_name != 0)
       @if($post->post_option == 'private')
         <!-- <b style="font-size:14px;color:gray;cursor: pointer;" class="edit_tag_show_friend" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">{{$post->post_option}}</b> -->
         <img src="upload/image/private_image.png" style="position: relative;top:5px;cursor: pointer;" width="20px" class="edit_tag_show_friend" edit_post="{{$post->id}}" onclick="document.getElementById('id02').style.display='block'">
      @endif
       @endif
                    <br>
            <div style="margin-left:10px;">
                       <hr>
                       @if($post->body != '')
                    <h2 id="text_of_user">{{$post->body}}</h2>
                   @endif
                   @if($post->image != '')
        <?php 
                      $p_c = $post->count;
                        $ex = explode(",", $post->image);
                      
                     // if(count($ex) == $post->count){
                       if($post->count > 3){ 
                      for ($i=0; $i <= 2; $i++) { 
                           
                     
                    // foreach( explode(",", $post->image)as $images ){
                       ?>

                  <a href="/showfullimage/{{$post->id}}" style="text-decoration: none;"> <img src="/uploads/image/{{$ex[$i]}}" class="show_multiple_image"> </a>  

                   
<?php
  $ch = $p_c - 3;
}?>
<a href="/showfullimage/{{$post->id}}" style="text-decoration: none;">
       <img src="/uploads/image/{{$ex[$i]}}"style="border:1px solid gray; width:120px; height: 120px;position:relative; top:0px; left:10px;  margin:auto 0px; border-radius:10px;opacity:0.5;">
       @if($ch < 9)
       <span class="count_number_of_image">+{{$ch}}</span>
      @else
<span class="count_number_of_imageses">+{{$ch}}</span>
@endif
     </a><hr>
<?php }
if($post->count <= 3 and $post->count ==3){
foreach( explode(",", $post->image)as $images ){
 ?>
<a href="#" style="text-decoration: none;"><img src="/uploads/image/{{$images}}"  class="show_upto_three_image" ></a>
<?php }
}
if($post->count <=2 and $post->count == 2){
  foreach( explode(",", $post->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;width:300px;height: 300px;">
<?php }
}
if($post->count <=1 and $post->count == 1){
  foreach( explode(",", $post->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;   width:100%;height:100%;">
<?php }
}
?>
 
     @endif
                 @if($post->video != '')
            <?php 
            $p_c = $post->count_video;
            $exs = explode(",", $post->video);
            if($post->count_video > 3){ 
           for ($i=0; $i <= 1; $i++) { 
            // foreach( explode(",", $post->video)as $videos ){
            
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$exs[$i]}}" type="video/mp4">  
    
</video> 
<?php
  $chs = $p_c - 2;
}?><a href="/showfullvideo/{{$post->id}}"><span class="count_number_of_video"><span id="video_click" style="display: block;">click here</span><span id="count_video">+{{$chs}}</span></span></a>
           <hr>
          
<?php }
 if($post->count_video <= 3 and $post->count_video == 3){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
if($post->count_video <= 2 and $post->count_video == 2){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
  if($post->count_video <= 1 and $post->count_video == 1){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="100%" height="100%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
      ?>
@endif   
</div>
  
                 <br>
                 <div class="user_like_comment">
                    <?php  $checks = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
                           if($checks== ''){ 

                     ?>
                    
           <span class="badge liked" id="{{$post->id}}"  style="position: relative;top:0px; cursor: pointer;">Liked {{$post->getlikes($post->id)}}</span> 
<hr>       
       
         
          <span id="{{$post->id}}" class="btn-btn-primary likessy" data-post="{{$post->body}}" style="position: relative;top:0px;left:-30px;text-decoration: none;" >Like</span>   

  <?php } else{ ?>

                    <span class="badge liked" id="{{$post->id}}">Liked {{$post->likes->count()}} </span>  
                    <hr>
                     
     <span id="{{$post->id}}" class="btn-btn-primary likessy" data-post="{{$post->body}}" data-user="{{Auth::user()->id}}" style="position:relative;top:0px;left:-30px;">You like this post</span>                                                                                    <?php } ?>
                  <span class="btn-danger dislike" id="{{$post->id}}" data-type="dislike" style="position:relative;top:0px;left:-40px; ">Dislike</span> 
               <?php 
             $showreplies = DB::table('replies')->where('post_id',$post->id)->count();    
          $count_comment = DB::table("comments")->where('post_id',$post->id)->count();
          $add = $showreplies + $count_comment;
                 ?>  
                    <!-- <a href="{{url('/comment/'.$post->id)}}"> -->
                    <span class="btn-btn-secondary commented" id="{{$post->id}}">Comment {{$add}} </span> 
                  <!-- </a> -->
                      
                         <!--  Get the total number of views   -->
                    <!--  <a href="{{url('postview/'.$post->id.'/')}}">{{$post->postview->count()}}</a> ; -->
                    
                  

<!-- comment -->
     <div class="form-group">
                              <span style="position:relative;top:0px"> 
  <textarea class="form-control" id="comments" name="comment" user-id="{{Auth::user()->id}}" post_id ="{{$post->id}}" pst_firstname="{{$post->user->firstname}}" pst_lastname="{{$post->user->lastname}}" pst_body="{{$post->body}}"data-emojiable="true"data-meteor-emoji="true"
             
      placeholder="Write something from your heart..!"></textarea> </span>
                            </div>
                        </div>
                        
        
        </div>
        </div>
         </div> 
         @else

          @endif
     
           
       
        @endif
        

<!-- Tag -->
  
   @if(Auth::user()->id != $post->user_id) 

   @if(Carbon\Carbon::now()->subMinutes(15)->diffForHumans() >= $post->formattedCreatedDate())
  @if($post->tag_name != 0)  
 <?php
           $tag = explode(",",$post->tag_name);
           $check_id = auth::user()->id;
                $tag_count = count($tag);
            for ($i=0; $i < $tag_count; $i++) { ?>
 
         <?php
            if($tag[$i] == Auth::user()->id){  
              ?>

 <div class="col-md-6">
         <div class="panel">
        <div class="well">
          
        <?php     

               $tag_named = DB::table('users')->where('id',$post->user_id)->get();
         ?>
           @foreach($tag_named as $tag_named )

  <img src="/uploads/avatar/{{$tag_named->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;cursor: pointer;" > 
               
                  <h2 id="text_of_user" style="color:black;position: relative; top: -10px;cursor: pointer;"><b  class="friend_profile"value="{{$tag_named->id}}"> @if(strlen($tag_named->firstname) <=12) {{ucwords($tag_named->firstname )}}{{ucwords($tag_named->lastname )}}@else {{substr(ucwords($tag_named->firstname),0,12)}}..{{substr(ucwords($tag_named->lastname),0,12)}}   @endif </b> <b style="color:blue"> is with  </b>     <?php    
             
              
                     
   
 
      // if($tag_count <= 1 and $tag_count== 1){ 
  

   
   
 
     $tag_na = DB::table('users')->where('id',$tag[$i])->get();
  foreach($tag_na as $name){
    

    
      
    
   ?>
    
   <b style="color:brown;font-size:20px;" class="friend_profile"value="{{$tag[$i]}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   

              <?php 
              if($tag_count > 1){

            
       echo "<b style='color:red;'>And +</b>";
       // echo "<b style='color:green;cursor:pointer' class='tag_value' value=".$post->id.">".($tag_count-1)."</b>";
       ?>
      <b style='color:green;cursor:pointer;'onclick="document.getElementById('id01').style.display='block'" class='tag_value' value="{{$post->id}}">{{$tag_count-1}}</b>
       <?php
      
  }
  }

  
  
  ?> 
 
     
     </h2>  
     
        @endforeach
      
                   {{ $post->formattedCreatedDate() }} 
                   <br>

            <div style="margin-left:10px;">
                       <hr>
                       @if($post->body != '')
                    <h2 id="text_of_user">{{$post->body}}</h2>
                   @endif
                   @if($post->image != '')
        <?php 
                      $p_c = $post->count;
                        $ex = explode(",", $post->image);
                      
                     // if(count($ex) == $post->count){
                       if($post->count > 3){ 
                      for ($i=0; $i <= 2; $i++) { 
                           
                     
                    // foreach( explode(",", $post->image)as $images ){
                       ?>

                  <a href="/showfullimage/{{$post->id}}" style="text-decoration: none;"> <img src="/uploads/image/{{$ex[$i]}}" class="show_multiple_image"> </a>  

                   
<?php
  $ch = $p_c - 3;
}?>
<a href="/showfullimage/{{$post->id}}" style="text-decoration: none;">
       <img src="/uploads/image/{{$ex[$i]}}"style="border:1px solid gray; width:120px; height: 120px;position:relative; top:0px; left:10px;  margin:auto 0px; border-radius:10px;opacity:0.5;">
       @if($ch < 9)
       <span class="count_number_of_image">+{{$ch}}</span>
      @else
<span class="count_number_of_imageses">+{{$ch}}</span>
@endif
     </a><hr>
<?php }
if($post->count <= 3 and $post->count ==3){
foreach( explode(",", $post->image)as $images ){
 ?>
<a href="#" style="text-decoration: none;"><img src="/uploads/image/{{$images}}"  class="show_upto_three_image" ></a>
<?php }
}
if($post->count <=2 and $post->count == 2){
  foreach( explode(",", $post->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;width:300px;height: 300px;">
<?php }
}
if($post->count <=1 and $post->count == 1){
  foreach( explode(",", $post->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;   width:100%;height:100%;">
<?php }
}
?>
 
     @endif
                 @if($post->video != '')
            <?php 
            $p_c = $post->count_video;
            $exs = explode(",", $post->video);
            if($post->count_video > 3){ 
           for ($i=0; $i <= 1; $i++) { 
            // foreach( explode(",", $post->video)as $videos ){
            
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$exs[$i]}}" type="video/mp4">  
    
</video> 
<?php
  $chs = $p_c - 2;
}?><a href="/showfullvideo/{{$post->id}}"><span class="count_number_of_video"><span id="video_click" style="display: block;">click here</span><span id="count_video">+{{$chs}}</span></span></a>
           <hr>
          
<?php }
 if($post->count_video <= 3 and $post->count_video == 3){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
if($post->count_video <= 2 and $post->count_video == 2){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
  if($post->count_video <= 1 and $post->count_video == 1){ 
  foreach( explode(",", $post->video)as $videos ){
              ?>
         <video width="100%" height="100%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
      ?>
@endif   
</div>
  
                 <br>
                 <div class="user_like_comment">
                    <?php  $checks = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
                           if($checks== ''){ 

                     ?>
                    
           <span class="badge liked" id="{{$post->id}}"  style="position: relative;top:0px; cursor: pointer;">Liked {{$post->getlikes($post->id)}}</span> 
<hr>       
       
         
          <span id="{{$post->id}}" class="btn-btn-primary likessy" data-post="{{$post->body}}" style="position: relative;top:0px;left:-30px;text-decoration: none;" >Like</span>   

  <?php } else{ ?>

                    <span class="badge liked" id="{{$post->id}}">Liked {{$post->likes->count()}} </span>  
                    <hr>
                     
     <span id="{{$post->id}}" class="btn-btn-primary likessy" data-post="{{$post->body}}" data-user="{{Auth::user()->id}}" style="position:relative;top:0px;left:-30px;">You like this post</span>                                                                                    <?php } ?>
                  <span class="btn-danger dislike" id="{{$post->id}}" data-type="dislike" style="position:relative;top:0px;left:-40px; ">Dislike</span> 
               <?php 
             $showreplies = DB::table('replies')->where('post_id',$post->id)->count();    
          $count_comment = DB::table("comments")->where('post_id',$post->id)->count();
          $add = $showreplies + $count_comment;
                 ?>  
                    <a href="{{url('/comment/'.$post->id)}}">
                    <span class="btn-btn-secondary comments" id="{{$post->id}}">Comment {{$add}} </span> 
                  </a>
                      
                         <!--  Get the total number of views  
                    <!--  <a href="{{url('postview/'.$post->id.'/')}}">{{$post->postview->count()}}</a> ; -->
                    
                  

<!-- comment -->
     <div class="form-group">
                              <span style="position:relative;top:0px"> 
  <textarea class="form-control" id="comments" name="comment" user-id="{{Auth::user()->id}}" post_id ="{{$post->id}}" pst_firstname="{{$post->user->firstname}}" pst_lastname="{{$post->user->lastname}}" pst_body="{{$post->body}}" data-meteor-emoji="true"
              data-emoji-input="unicode"
      placeholder="Write something from your heart..!"></textarea></span>
                            </div>
                        </div>
                        
        
        </div>
        </div>
         </div> 
         <?php
}
   
}
     ?>
@endif
         @else

          @endif
      @endif
  

            @endforeach 
             <!-- user completed -->
    
       @foreach ($friends as $friends)
     @if($friends->body != '' || $friends->image != '' || $friends->video != '')
        @if($friends->user_requested == Auth::user()->id) 
     @if($friends->post_option == 'public')
      <div class="col-md-6">
         <div class="panel">
        <div class="well">
         
       @if($friends->tag_name == 0)
          
          <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; cursor: pointer;" class="friend_profile"value="{{$friends->acceptor}}">
            <h2 id="text_of_user" style="color:black;cursor: pointer;" class="friend_profile"value="{{$friends->acceptor}}">
                     <b>@if(strlen($friends->firstname) <=12) {{ucwords($friends->firstname )}} {{ucwords($friends->lastname )}}@else {{substr(ucwords($friends->firstname),0,12)}}..{{substr(ucwords($friends->lastname),0,12)}}  @endif</b></h2>
             @endif

             @if($friends->tag_name != 0)
     <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; cursor: pointer;" class="friend_profile"value="{{$friends->acceptor}}">
       <h2 id="text_of_user" style="color:black;cursor: pointer;">
                     <b class="friend_profile"value="{{$friends->acceptor}}">@if(strlen($friends->firstname) <=12) {{ucwords($friends->firstname )}} {{ucwords($friends->lastname )}}@else {{substr(ucwords($friends->firstname),0,12)}}..{{substr(ucwords($friends->lastname),0,12)}}  @endif</b> <b style="color:blue"> is with  </b>    

            <?php    
              $tag = explode(",",$friends->tag_name);
               $tag_count = count($tag);
                  if($tag_count > 3){ 
                      for ($i=0; $i <= 1; $i++) { 

    $tag_na = DB::table('users')->where('id',$tag[$i])->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown; cursor: pointer;" class="friend_profile"value="{{$tag[$i]}}" my_id="{{Auth::user()->id}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   
              <?php 
  }
  if($i == 0)
{
  echo "<b style='color:red'>And</b>";
}
}
 }
if($tag_count > 2){?>
     <b style='color:red'>And +</b>
      
        <b style='color:green;cursor:pointer;'onclick="document.getElementById('id01').style.display='block'" class='tag_value' value="{{$friends->id}}" my_id="{{Auth::user()->id}}">{{$tag_count-2}}</b> 
        <?php
  }

    if($tag_count <= 2 and $tag_count== 2){ 
  
    for ($i=0; $i <= 1; $i++) { 

    $tag_na = DB::table('users')->where('id',$tag[$i])->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown;cursor: pointer;"class="friend_profile"value="{{$name->id}}" my_id="{{Auth::user()->id}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   

              <?php 
  }
   if($i == 0)
{
  echo "<b style='color:red'>And</b>";
}
}
  }
 

   if($tag_count <= 1 and $tag_count== 1){ 
  $tag_na = DB::table('users')->where('id',$tag)->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown;cursor: pointer;"class="friend_profile"value="{{$name->id}}" my_id="{{Auth::user()->id}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   
              <?php 
  }

  }
  ?> 
     </h2>  
  @endif
               

      
      
                <!--   <h2 id="text_of_user" style="color:black;cursor: pointer;" class="friend_profile"value="{{$friends->acceptor}}">
                     <b>@if(strlen($friends->firstname) <=12) {{ucwords($friends->firstname )}} {{ucwords($friends->lastname )}}@else {{substr(ucwords($friends->firstname),0,12)}}..{{substr(ucwords($friends->lastname),0,12)}}  @endif</b></h2> -->
                   {{\Carbon\Carbon::parse($friends->created_at)->diffForHumans()}}
                   <!--  <b style="font-size:14px;color:gray"> {{$friends->post_option}} -->
                   <img src="upload/image/world_image.png" style="position:relative; top:5px;width:25px;">
                   <!-- </b> -->
                   <br>
            <div style="margin-left:10px;">
                       <hr>
                    <h2 id="text_of_user">{{$friends->body}}</h2>
                   
                   @if($friends->image != '')
        <?php 
                      $p_c = $friends->count;
                        $ex = explode(",", $friends->image);
                      
                     // if(count($ex) == $post->count){
                       if($friends->count > 3){ 
                      for ($i=0; $i <= 2; $i++) { 
                           
                     
                    // foreach( explode(",", $post->image)as $images ){
                       ?>

                  <a href="/showfullimage/{{$friends->id}}" style="text-decoration: none;"> <img src="/uploads/image/{{$ex[$i]}}" class="show_multiple_image"> </a>  

                   
<?php
  $ch = $p_c - 3;
}?>
<a href="/showfullimage/{{$friends->id}}" style="text-decoration: none;">
        <img src="/uploads/image/{{$ex[$i]}}"style="border:1px solid gray; width:120px; height: 120px;position:relative; top:0px; left:10px;  margin:auto 0px; border-radius:10px;opacity:0.5;"><!-- <span class="count_number_of_friend_image">+{{$ch}}</span> -->
 @if($ch < 9)
       <span class="count_number_of_image">+{{$ch}}</span>
      @else
<span class="count_number_of_imageses">+{{$ch}}</span>
@endif
      </a><hr>
<?php }
if($friends->count <= 3 and $friends->count ==3){
foreach( explode(",", $friends->image)as $images ){
 ?>
<a href="#" style="text-decoration: none;"><img src="/uploads/image/{{$images}}"  class="show_upto_three_image" ></a>
<?php }
}
if($friends->count <=2 and $friends->count == 2){
  foreach( explode(",", $friends->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;width:300px;height: 300px;">
<?php }
}
if($friends->count <=1 and $friends->count == 1){
  foreach( explode(",", $friends->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;   width:100%;height:100%;">
<?php }
}
?>
 
     @endif
                 @if($friends->video != '')
            <?php 
            $p_c = $friends->count_video;
            $exs = explode(",", $friends->video);
            if($friends->count_video > 3){ 
           for ($i=0; $i <= 1; $i++) { 
            // foreach( explode(",", $post->video)as $videos ){
            
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$exs[$i]}}" type="video/mp4">  
    
</video> 
<?php
  $chs = $p_c - 2;
}?>
<a href="/showfullvideo/{{$friends->id}}"><span class="count_number_of_video" ><span id="video_click" style="display:block;">click here</span><span id="count_video">+{{$chs}}</span></span></a>
           <hr>
          
<?php }
if($friends->count_video <= 3 and $friends->count_video == 3){ 
  foreach( explode(",", $friends->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
 
if($friends->count_video <= 2 and $friends->count_video == 2){ 
  foreach( explode(",", $friends->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
  if($friends->count_video <= 1 and $friends->count_video == 1){ 
  foreach( explode(",", $friends->video)as $videos ){
              ?>
         <video width="100%" height="100%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
      ?>
@endif   
</div>
  
                 <br>
                 <div class="user_like_comment">
                    <?php  $checks = DB::table('likes')->where('post_id',$friends->id)->where('user_id',Auth::user()->id)->first();
                           if($checks== ''){ 

                     ?>
                    
           <span class="badge liked" id="{{$friends->id}}" style="position: relative;top:0px; cursor: pointer;">Liked {{$post->getlikes($friends->id)}}</span> 
<hr>       
       
         
          <span id="{{$friends->id}}" class="btn-btn-primary likessy"data-post="{{$friends->body}}"data-user="{{ $friends->acceptor}}" style="position: relative;top:0px;left:-30px;text-decoration: none;" >Like</span>   

  <?php } else{ ?>

                    <span class="badge liked" id="{{$friends->id}}">Liked {{$countlike->where('post_id',$friends->id)->count()}} </span>  
                    <hr>
                     
                  <span id="{{$friends->id}}" class="btn-btn-primary likessy" data-post="{{$friends->body}}" data-user="{{ $friends->acceptor}}" style="position:relative;top:0px;left:-30px;">You like this post</span>                                                                                    <?php } ?>
                  <span class="btn-danger dislike" id="{{$friends->id}}" data-type="dislike" style="position:relative;top:0px;left:-40px; ">Dislike</span> 
                  <?php 
             $showreplies = DB::table('replies')->where('post_id',$friends->id)->count();    
          $count_comment = DB::table("comments")->where('post_id',$friends->id)->count();
          $add = $showreplies + $count_comment;
                 ?>
                 
                    <a href="{{url('/comment/'.$friends->id)}}"><span class="btn-btn-secondary comments">Comment{{$add}}  </span></a>
                      <!-- $countComment->where('post_id',$friends->id)->count()-->
                         <!--  Get the total number of views   -->
                    <!--  <a href="{{url('postview/'.$post->id.'/')}}">{{$post->postview->count()}}</a> ; -->
                    
                  

<!-- comment -->
         <div class="form-group">
                              <span style="position:relative;top:0px"> 
  <textarea class="form-control" id="comments" name="comment" user_id="{{$friends->acceptor}}" post_id ="{{$friends->id}}" pst_firstname="{{Auth::user()->firstname}}" pst_lastname="{{Auth::user()->lastname}}" pst_body="{{$friends->body}}"data-meteor-emoji="true"
              data-emoji-input="unicode"
      placeholder="Write something from your heart..!"></textarea></span>
                            </div>
          </div>
        </div>
         </div>
          </div> 
          @endif
          @endif
            <!-- This much for user_requessted -->
             <!-- From here acceptor -->
                   @if($friends->acceptor == Auth::user()->id) 
      @if($friends->post_option == 'public')
      <div class="col-md-6">
         <div class="panel">
        <div class="well">
         
                   @if($friends->tag_name == 0)
          
         <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;cursor: pointer" class="friend_profile" value="{{$friends->user_requested}}">
            <h2 id="text_of_user" style="color:black;cursor: pointer;" class="friend_profile"value="{{$friends->user_requested}}">
                     <b>@if(strlen($friends->firstname) <=12) {{ucwords($friends->firstname )}} {{ucwords($friends->lastname )}}@else {{substr(ucwords($friends->firstname),0,12)}}..{{substr(ucwords($friends->lastname),0,12)}}  @endif</b></h2>
             @endif

             @if($friends->tag_name != 0)
     <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; cursor: pointer;" class="friend_profile"value="{{$friends->user_requested}}">
       <h2 id="text_of_user" style="color:black;cursor: pointer;">
                     <b class="friend_profile"value="{{$friends->user_requested}}">@if(strlen($friends->firstname) <=12) {{ucwords($friends->firstname )}} {{ucwords($friends->lastname )}}@else {{substr(ucwords($friends->firstname),0,12)}}..{{substr(ucwords($friends->lastname),0,12)}}  @endif</b> <b style="color:blue"> is with  </b>    

            <?php    
              $tag = explode(",",$friends->tag_name);
               $tag_count = count($tag);
                  if($tag_count > 3){ 
                      for ($i=0; $i <= 1; $i++) { 

    $tag_na = DB::table('users')->where('id',$tag[$i])->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown; cursor: pointer;" class="friend_profile"value="{{$tag[$i]}}" my_id="{{Auth::user()->id}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   
              <?php 
  }
  if($i == 0)
{
  echo "<b style='color:red'>And</b>";
}
}
 }
if($tag_count > 2){?>
     <b style='color:red'>And +</b>
      
        <b style='color:green;cursor:pointer;'onclick="document.getElementById('id01').style.display='block'" class='tag_value' value="{{$friends->id}}" my_id="{{Auth::user()->id}}">{{$tag_count-2}}</b> 
        <?php
  }

    if($tag_count <= 2 and $tag_count== 2){ 
  
    for ($i=0; $i <= 1; $i++) { 

    $tag_na = DB::table('users')->where('id',$tag[$i])->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown;cursor: pointer;"class="friend_profile"value="{{$name->id}}" my_id="{{Auth::user()->id}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   

              <?php 
  }
   if($i == 0)
{
  echo "<b style='color:red'>And</b>";
}
}
  }
 

   if($tag_count <= 1 and $tag_count== 1){ 
  $tag_na = DB::table('users')->where('id',$tag)->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown;cursor: pointer;"class="friend_profile"value="{{$name->id}}" my_id="{{Auth::user()->id}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   
              <?php 
  }

  }
  ?> 
     </h2>  
  @endif


                 
                <!--  <img src="/uploads/avatar/{{$friends->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;cursor: pointer" class="friend_profile" value="{{$friends->user_requested}}"> -->

               <!-- 
                  <h2 id="text_of_user" class="friend_profile" value="{{$friends->user_requested}}" style="color:black;cursor: pointer;"><b>@if(strlen($friends->firstname) <=8) {{ucwords($friends->firstname )}} {{ucwords($friends->lastname )}}@else {{substr(ucwords($friends->firstname),0,8)}}..{{substr(ucwords($friends->lastname),0,8)}}  @endif</b></h2> -->

                   {{\Carbon\Carbon::parse($friends->created_at)->diffForHumans()}}
                  <!-- <b style="font-size:14px;color:gray"> {{$friends->post_option}} -->
                  <img src="upload/image/world_image.png" style="position:relative; top:5px;width:25px;"><!-- </b> -->
                   <br>
            <div style="margin-left:10px;">
                       <hr>
                    <h2 id="text_of_user">{{$friends->body}}</h2>
                   
                   @if($friends->image != '')
        <?php 
                      $p_c = $friends->count;
                        $ex = explode(",", $friends->image);
                      
                     // if(count($ex) == $post->count){
                       if($friends->count > 3){ 
                      for ($i=0; $i <= 2; $i++) { 
                           
                     
                    // foreach( explode(",", $post->image)as $images ){
                       ?>

                  <a href="/showfullimage/{{$friends->id}}" style="text-decoration: none;"> <img src="/uploads/image/{{$ex[$i]}}" class="show_multiple_image"> </a>  

                   
<?php
  $ch = $p_c - 3;
}?>
<a href="/showfullimage/{{$friends->id}}" style="text-decoration: none;">
    <img src="/uploads/image/{{$ex[$i]}}"style="border:1px solid gray; width:120px; height: 120px;position:relative; top:0px; left:10px;  margin:auto 0px; border-radius:10px;opacity:0.5;"><!-- <span class="count_number_of_friend_image">+{{$ch}}</span> -->
 @if($ch < 9)
       <span class="count_number_of_image">+{{$ch}}</span>
      @else
<span class="count_number_of_imageses">+{{$ch}}</span>
@endif
  </a><hr>
<?php }
if($friends->count <= 3 and $friends->count ==3){
foreach( explode(",", $friends->image)as $images ){
 ?>
<a href="#" style="text-decoration: none;"><img src="/uploads/image/{{$images}}"  class="show_upto_three_image" ></a>
<?php }
}
if($friends->count <=2 and $friends->count == 2){
  foreach( explode(",", $friends->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;width:300px;height: 300px;">
<?php }
}
if($friends->count <=1 and $friends->count == 1){
  foreach( explode(",", $friends->image)as $images ){
 ?>
<img src="/uploads/image/{{$images}}"  style="position: relative;   width:100%;height:100%;">
<?php }
}
?>
 
     @endif
                 @if($friends->video != '')
            <?php 
            $p_c = $friends->count_video;
            $exs = explode(",", $friends->video);
            if($friends->count_video > 3){ 
           for ($i=0; $i <= 1; $i++) { 
            // foreach( explode(",", $post->video)as $videos ){
            
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$exs[$i]}}" type="video/mp4">  
    
</video> 
<?php
  $chs = $p_c - 2;
}?><a href="/showfullvideo/{{$friends->id}}"><span class="count_number_of_video"><span id="video_click" style="display: block;">click here</span><span id="count_video">+{{$chs}}</span></span></a>
           <hr>
          
<?php }
 if($friends->count_video <= 3 and $friends->count_video == 3){ 
  foreach( explode(",", $friends->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video>  
<?php }
  }
if($friends->count_video <= 2 and $friends->count_video == 2){ 
  foreach( explode(",", $friends->video)as $videos ){
              ?>
         <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
  if($friends->count_video <= 1 and $friends->count_video == 1){ 
  foreach( explode(",", $friends->video)as $videos ){
              ?>
         <video width="100%" height="100%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
  }
      ?>
@endif   
</div>
  
                 <br>
                 <div class="user_like_comment">
                    <?php  $checks = DB::table('likes')->where('post_id',$friends->id)->where('user_id',Auth::user()->id)->first();
                           if($checks== ''){ 

                     ?>
                    
           <span class="badge liked" id="{{$friends->id}}" style="position: relative;top:0px; cursor: pointer;">Liked {{$post->getlikes($friends->id)}}</span> 
<hr>       
       
         
          <span id="{{$friends->id}}" class="btn-btn-primary likessy" data-post="{{$friends->body }}"
          data-user="{{$friends->id}}" style="position: relative;top:0px;left:-30px;text-decoration: none;" >Like</span>   

  <?php } else{ ?>

                    <span class="badge liked" id="{{$friends->id}}">Liked {{$countlike->where('post_id',$friends->id)->count()}} </span>  
                    <hr>
                     
                  <span id="{{$friends->id}}" class="btn-btn-primary likessy" data-post="{{$friends->body}}"  data-user="{{$friends->user_requested }}"style="position:relative;top:0px;left:-30px;">You like this post</span>                                                                                    <?php } ?>
                  <span class="btn-danger dislike" id="{{$friends->id}}" data-type="dislike" style="position:relative;top:0px;left:-40px; ">Dislike</span> 
                 <?php 
             $showreplies = DB::table('replies')->where('post_id',$friends->id)->count();    
          $count_comment = DB::table("comments")->where('post_id',$friends->id)->count();
          $add = $showreplies + $count_comment;
                 ?>
                    <a href="{{url('/comment/'.$friends->id)}}"><span class="btn-btn-secondary comments">Comment {{$add}}  </span></a>
                      
                         <!--  Get the total number of views   -->
                    <!--  <a href="{{url('postview/'.$post->id.'/')}}">{{$post->postview->count()}}</a> ; -->
                    
                  

<!-- comment -->
       
        <div class="form-group">
                              <span style="position:relative;top:0px"> 
  <textarea class="form-control" id="comments" name="comment" user_id="{{$friends->user_requested}}" post_id ="{{$friends->id}}" pst_firstname="{{Auth::user()->firstname}}" pst_lastname="{{Auth::user()->lastname}}" pst_body="{{$friends->body}}" 
              data-emoji-input="unicode"data-meteor-emoji="true"
      placeholder="Write something from your heart..!"></textarea> </span>
                            </div>

        </div>
        </div>
         </div>
          </div> 
  @endif
         @endif       
      @endif
      <!-- Tag started -->
        <!-- user_requested -->
      @if($friends->user_requested != Auth::user()->id)
 

       <?php $check = DB::table('posts')->where('user_id','!=',$friends->user_requested)->orWhere('user_id','!=',$friends->acceptor)->get();?>
      @foreach($check as $check_tag)
      @if($check_tag->tag_name != 0)
      @if($check_tag->post_option == 'public')
 <?php
           $tag = explode(",",$check_tag->tag_name);
              var_dump($tag);
                $tag_count = count($tag);
            for ($i=0; $i < $tag_count; $i++) { 
     
            if($tag[$i] == $friends->user_requested){  
              ?>
  <div class="col-md-6">
  <div class="panel">
     <div class="well">
 <?php     


               $tag_named = DB::table('users')->where('id',$check_tag->user_id)->get();
         ?>

      </div>
    </div>
  </div>
<?php
 } 
}
?>
  @endif
@endif
    @endforeach
      @endif
      <!-- Ended user_requested Tag -->
      <!--  -->
      <!-- started acceptor Tag -->

@if($friends->acceptor != Auth::user()->id)
 
 
        
   
@endif
      <!-- Ended acceptor Tag -->
   @endforeach


 


  @else
       <br>    
           <div class="col-md-6">
         <div class="panel">
        <div class="well">
     
       <h3>No yet uploading any photo</h3>
 
        </div>
         </div>
          </div> 
         
          @endif
       
       
         <br>
         <br>
       <h1 style="position: relative;top:-20px; text-align: center; color: white;font-size: 25px;font-weight: bold;">No More....</h1>
<br>
</div>
 <!--   
           <div id="no_upload">
          <div class="col-md-6">
         <div class="panel">
        <div class="well">
                <span onclick="document.getElementById('no_upload').style.display='none'" class="close">&times;</span>
        <h3>Please upload as your wise</h3>
 
        </div>
         </div>
          </div> 
        </div>
         -->
        
          
         <?php  $ch = DB::table('friendships')->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->first();
           ?>
           @if($ch == false)
           <div id="no_upload">
          <div class="col-md-6">
         <div class="panel">
        <div class="well">
                <span onclick="document.getElementById('no_upload').style.display='none'" class="close">&times;</span>
        <h3>Please Make Your  Friend </h3>
 
        </div>
         </div>
          </div> 
        </div>
     
        @endif
          @endif
          <?php  $ch = DB::table('friendships')->where('status',null)->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->first();
           ?>
           @if($ch == true)
        <div class="col-md-6">
         <div class="panel">
         <div class="well">
           <h2> Please make your more Friend</h2>
         </div>
         </div>
        </div>
        @endif
        </div>
</div>
  <br>
  <div id="bharat">
    
  </div>
  <div id="showsearched">
    
  </div>
   <div id="id01" class="modal">
 <div class="modal-content animate" enctype="multipart/form-data" id="check_form">
    
 
            <table>
            <div class="fetch_tag">

            </div>
</table>
       
      <input type="button" id="check_submit"  value="Done" style="width:auto;position: relative;bottom:-20px;" class="btn-danger">
      
  
    <div class="container">
   <button type="button" class="btn-btn-primary" style=" float:right;position: relative;right:-20px;bottom:45px;" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
     
    </div>
 </div>
</div>
 <div id="id02" class="modal">
<form class="modal-content animate" method="post" action="/post_edit"  id="check_form">
  {{csrf_field()}}
      <table style=" margin: auto 40%;position: relative;top:20px; font-size: 25px;">
          <tr><td style="font-weight: bold"> Edit Post </td></tr>
           <tr>
            <td>
           <select name="edit_post_show">
             <option>public</option>
             <option>private</option>
            </select>
         </td>
           </tr>
</table>
   
    <div class="fetching_data">
 </div>
     <input type="submit"  value="Done" style="width:auto;position: relative;bottom:-20px;" class="btn-danger">
       
    <div class="container">
   <button type="button" class="btn-btn-primary" style=" float:right;position: relative;right:-20px;bottom:45px;" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
     
    </div>
 </form>
</div>
      
      <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
       <script type="text/javascript" src="js/mydesings.js"></script>
      <script type="text/javascript" src="{{asset('/js/likesd.js')}}"></script>
      <script type="text/javascript" src="js/comment/comment_submits.js"></script>
      <script type="text/javascript" src="{{asset('/js/commented.js')}}"></script>
      <script type="text/javascript" src="{{asset('/js/dislike.js')}}" ></script>
      <script type="text/javascript" src="{{asset('js/message_index.js')}}"></script>   
      <script type="text/javascript" src="{{asset('js/showlikeds.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/searched.js')}}"></script>
      <!-- emoji start-->
     
   
    
   <script src="https://www.cssscript.com/demo/easy-vanilla-javascript-emoji-picker/dist/meteorEmoji.min.js"></script>
  <script>
    (() => {
      new MeteorEmoji()
    })()
  </script>
      <!-- emoji end -->
       <script type="text/javascript">
    
    var token = '{{Session::token()}}';
    var urlLike = "{{url('liked')}}" ;
  var urldislike = "{{url('dislike')}}";                                             
  // var mess ="{{route('comments.store')}}";
  
</script>

 <script type="text/javascript">
     var token = '{{Session::token()}}';
   $(document).ready(function(){
    $('#marksasread').click(function(){
        var s = $(this).attr('data-id');
          alert(s);

       });

    $('.user_profile').click(function(){
      var id = $(this).attr('value');
      datast = 'id'+id;
     
      
       $.ajax({
        type:'get',
        url:'/showAll_image/',
        data:'',
        before:function(){
           $('#loading').css("display","block");
        },
        complete:function(){
             $('#loading').css("display","none");
                 window.location='http://laravel/showAll_image/';  
                // $('.allMyindex').remove();

              },
        success:function(data){
          $('#bharat').html(data);
          
        }
       })
    })
    $('.friend_profile').click(function(){
      var id = $(this).attr('value');
      var my_id = $(this).attr('my_id');
      
      if(my_id != id){
 $.ajax({
        type:'get',
        url:'/showAll_image_ofFriend/'+id,
        data:false,
         before:function(){
           $('#loading').css("display","block");
        },
        complete:function(){
           $('#loading').css("display","none");
          window.location='http://laravel/showAll_image_ofFriend/'+id;
        },
        success:function(data){
          $('#bharat').html(data);
          
        }
      })
}
if(my_id == id){

   $.ajax({
        type:'get',
        url:'/showAll_image/',
        data:false,
         before:function(){
           $('#loading').css("display","block");
        },
        complete:function(){
           $('#loading').css("display","none");
          window.location='http://laravel/showAll_image/';
        },
        success:function(data){
          $('#bharat').html(data);
          
        }
      })

}
    })
    $('.tag_value').click(function(){
        var tag_va = $(this).attr('value');
         $.ajax({
           type:'get',
           url:'/tag_count/'+tag_va,
           data:'',
           cache:false,
           success:function(data){
            $('.fetch_tag').html(data);
           },
         })
      })
     })
   


 </script>
 <script type="text/javascript">
        $(document).ready(function(){
         $('#add_sent').click(function(){
            received = $(this).attr('value');
            alert(received)
           $vm = $(this);
            $.ajax({
                    type: "get",
                    url: "/addFriend/"+received, // need to create this post route
                    data: '' ,
                    cache: false,
                     beforeSend:function(){
                     $vm.text('Please Wait..');
                    
                 },
                     success: function (data) {
                          // $('.add_sent').html(data);
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                       
                $vm.text("Sending Req").css('background','gray');
                         
                    },
                     
                });
         });
          $('#delete_sent').click(function(){
           received = $(this).attr('value');
           alert('he')
           alert(received)
           $vm = $(this);
            $.ajax({
                    type: "get",
                    url: "/unfriend/"+received, // need to create this post route
                    data: '' ,
                    cache: false,
                    beforeSend:function(){
                     
                  // $('.delete_sent').html("please wait......");
                  $vm.text('Please Wait....');
               
                   },
                     success: function (data) {
                          $('.addinfo').html(data);
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                      // $('.add_sent').text("Add Friend").css('background','blue');

                   $vm.siblings('.add_sent').text("Add Friend").css('background','blue');
                    
                         $vm.text('Delete Friend');
                    },
                     
                });
         });
           
           
        });

      </script>
      <script type="text/javascript">
        $(document).ready(function(){
      
        $('.edit_tag_show').click(function(){
       var post_id = $(this).attr('edit_post');
      
      $.ajax({
           type:'get',
           url:'/edit_tag_show/'+post_id,
           data:'',
           cache:false,
           success:function(data){
           $('.fetching_data').html(data);
           },
         })
         
      })
      $('.edit_tag_show_friend').click(function(){
         var post_id = $(this).attr('edit_post');
         
        $.ajax({
           type:'get',
           url:'/edit_tag_show/'+post_id,
           data:'',
           cache:false,
           success:function(data){
            $('.fetching_data').html(data);
           },
         })
      })
      $('.submit_edit_post').click(function(){
        var post_id = $(this).attr('edit_post');
         
      })

        })
      </script>
</body>
</html>