 @extends('layouts.my_way')
 @section('my_way')
<div class="container">
  <div class="col-md-6">
     @foreach($users as $user)
		<div class="panel panel-default">
			<div class="panel-heading"><b>Friend Profile</b></div>
			 <div class="panel-body">
              <div class="well">
					
         <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%; ">
          
 <h2 id="text_of_user" style="color:black;position: relative; top: 10px;"><b>{{strtoupper($user->firstname)}}</b><b>{{ ucwords($user->lastname )}}</b></h2>
          <h2 class="total_post"><?php echo ":";?> {{ $post_count}} </h2>

                  <h2 class="total_post"><b>Posts</b></h2> 
                  
                  <h2 class="total_friend"><?php echo ":";?>{{ $total_friend_count}} </h2>
                   
                  <h2 class="total_friend"><b class="take_up">Total Friends</b></h2>
               
                 </div>
			</div>
          </div>
          
		 
   <div class="panel">
     <ul class="well">  
      <li><a href="#" class="fetch_all_photo" id="{{$user->id}}">Photo</a></li> <li><a href="#" class="fetch_all_video" id="{{$user->id}}">Video</a></li>  
      <li><a href="#" class="fetch_all_friend" id="{{$user->id}}">Friends</a></li>  
  
                         
  @if($count_mutual !=0)
     <li><a href="#" class="fetch_all_mutual_friend" id="{{$user->id}}">
   
     Mutual Friends({{count($count_mutual)}})
 </a></li>          
        @else
        <li><a href="#" class="fetch_all_null_mutual_friend">
   
Mutual Friends
</a></li>
  @endif                      
    
    </ul> 
    </div> 
   
@endforeach 
    
     
 </div>
</div>
<div id="fetching_img_vid">
<div class="container">
  <div class="col-md-6">
    <div class="panel">
   <div class="well">
     <span onclick="document.getElementById('fetching_img_vid').style.display='none'" class="close">&times;</span>
      <div id="fetch_all_photo">
         
      </div>
      
    </div>
    </div>
  </div>
</div>
</div>
<div class="container">
  <div class="col-md-6">
@foreach($posted as $post)
@if($post->user_id == $id)
  @if($post->post_option == 'public')
  <div class="panel panel-default">
        <div class="panel-body">
         <div class="well">
               
      <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;cursor: pointer;" class="friend_profile"value="{{$user->id}}"> 
                      
      @if($post->tag_name == 0)
             <?php 
                   $tag = explode(",",$post->tag_name);
                    
                    $tag_count = count($tag);
                  if($tag_count > 3){ 
                      for ($i=0; $i <= 1; $i++) { 

          $tag_na = DB::table('users')->where('id',$tag[$i])->get();

       }
     }
                  ?>
                  <h2 id="text_of_user" style="color:black;position: relative; top: -10px;"><b>{{strtoupper($user->firstname)}}</b></h2>
                @endif
              @if($post->tag_name != 0)
        
                  <h2 id="text_of_user" style="color:black;position: relative; top: -10px;"><b  class="friend_profile"value="{{$user->id}}"> @if(strlen($user->firstname) <=12) {{ucwords($user->firstname )}} {{ucwords($user->lastname )}}@else {{substr(ucwords($user->firstname),0,12)}}..{{substr(ucwords($user->lastname),0,12)}}   @endif </b> <b style="color:blue"> is with  </b>     <?php    
              $tag = explode(",",$post->tag_name);
               $tag_count = count($tag);
                  if($tag_count > 3){ 
                      for ($i=0; $i <= 1; $i++) { 

    $tag_na = DB::table('users')->where('id',$tag[$i])->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown; cursor: pointer;" class="friend_profile"value="{{$tag[$i]}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   
              <?php 
  }
  if($i == 0)
{
  echo "<b style='color:red'>And</b>";
}
}
 }
if($tag_count > 2){
      echo "<b style='color:red'>And +</b>";
       // echo $tag_count-2;
  ?>
   <b style='color:green;cursor:pointer;'onclick="document.getElementById('id01').style.display='block'" class='tag_value' value="{{$post->id}}">{{$tag_count-2}}</b> 

   <?php 
 }
    if($tag_count <= 2 and $tag_count== 2){ 
  
    for ($i=0; $i <= 1; $i++) { 

    $tag_na = DB::table('users')->where('id',$tag[$i])->get();
  foreach($tag_na as $name){
 

   ?>
    
   <b style="color:brown;cursor: pointer;"  class="friend_profile"value="{{$tag[$i]}}">
  
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
    
   <b style="color:brown;cursor: pointer;" class="friend_profile"value="{{$name->id}}">
  
    @if(strlen($name->firstname) <=12) {{ucwords($name->firstname )}} {{ucwords($name->lastname )}}@else {{substr(ucwords($name->firstname),0,12)}}..{{substr(ucwords($name->lastname),0,12)}}   @endif  </b>
   
              <?php 
  }

  }
  ?> 
     </h2>   @endif

                   {{ $post->formattedCreatedDate() }} 
                    <img src="/upload/image/world_image.png" style="position: relative; top: 5px;" width="25px;">
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
                    <span class="btn-btn-secondary comments" id="{{$post->id}}">Comment {{$add}} </span> 
                  <!-- </a> -->
                      
                         <!--  Get the total number of views   -->
                    <!--  <a href="{{url('postview/'.$post->id.'/')}}">{{$post->postview->count()}}</a> ; -->
                    
                  

<!-- comment -->
     <div class="form-group">
                              <span style="position:relative;top:0px"> 
  <textarea class="form-control" id="comments" name="comment" user-id="{{Auth::user()->id}}" post_id ="{{$post->id}}" pst_firstname="{{Auth::user()->firstname}}" pst_lastname="{{auth::user()->lastname}}" pst_body="{{$post->body}}"
      placeholder="Write something from your heart..!"></textarea></span>
                            </div>
                        </div>
                        
        
        </div>
        </div>
         </div> 
@endif
@endif
<!-- from tag to user  -->

@if($post->user_id  != $id)
@if($post->tag_name != 0)  
  @if($post->post_option == 'public')
 <?php
           $tag = explode(",",$post->tag_name);
           $check_id = auth::user()->id;
                $tag_count = count($tag);
            for ($i=0; $i < $tag_count; $i++) { ?>
 
         <?php
            if($tag[$i] == $id){  
              ?>

  <div class="panel panel-default">
        <div class="panel-body">
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
                    <img src="/upload/image/world_image.png" style="position: relative; top: 5px;" width="25px;">
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
  <textarea class="form-control" id="comments" name="comment" user-id="{{Auth::user()->id}}" post_id ="{{$post->id}}" pst_firstname="{{$post->user->firstname}}" pst_lastname="{{$post->user->lastname}}" pst_body="{{$post->body}}"
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
@endif
@endif
<!-- ended -->

@endforeach

  </div>
  </div>
 
<div class="container">
	<div class="col-md-9" id="showphoto">
		
	</div>
</div>
@endsection