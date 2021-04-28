 @extends('layouts.app')
@section('content')
@foreach($post as $post)
  
@if($post->body != '')
<div class="container">
  <div class="col-md-8">
<div class="panel panel-default"> 
 <div class="panel-body">
        <div class="well">
          <?php $user = Auth::user();?>
           <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;  ">
                     
                  <h2 style="color:black;"><b>{{strtoupper($user->firstname)}}</b></h2>
                   {{ $post->formattedCreatedDate() }} 
                   <br>
             
                       <hr>
                    <h2>{{$post->body}}</h2>
                       <div class="user_like_comment">
                    <?php  
                     $checks = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
                           if($checks== ''){ 

                     ?>
                    
           <span class="badge liked" id="{{$post->id}}" style="position: relative;top:0px; cursor: pointer;">Liked {{$post->getlikes($post->id)}}</span> 
<hr>       
       
         
          <span id="{{$post->id}}" class="btn btn-primary showliked" >Like</span>   

  <?php } else{ ?>

                    <span class="badge liked" id="{{$post->id}}">Liked {{$post->likes->count()}} </span>  
                    <hr>
                     
                  <span id="{{$post->id}}" class="btn btn-primary showliked"  >You like this post</span>                                                                                    <?php } ?>
                  <span class="btn btn-danger dislike" id="{{$post->id}}" data-type="dislike">Dislike</span> 
                 
                 
            <?php 
             $showreplies = DB::table('replies')->where('post_id',$post->id)->count();    
          $count_comment = DB::table("comments")->where('post_id',$post->id)->count();
          $add = $showreplies + $count_comment;
                 ?>  
                   <a href="{{url('/comment/'.$post->id)}}"><span class="btn btn-lg comments">Comment {{$add}} </span></a>    
            
                        
                    
                  

<!-- comment -->
<form   method="post" action="{{ route('comments.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                         <input type="hidden" name="firstname" value="{{$post->user->firstname}}">
                         <input type="hidden" name="lastname" value="{{$post->user->lastname}}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}" > 
                         
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                              <span style="position:relative;top:0px">   <textarea class="form-control" name="comment" placeholder="Write something from your heart..!"></textarea></span>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" style="position:relative;top:0px"  value="Comment">
                                
                            </div>
                        </div>
                    </form>
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  @endif

<?php
  $ex = explode(",", $post->video);
      $p_c = $post->count_video ;

    for ($i=0; $i <= $post->count_video - 1; $i++) { 
?>
<div class="container">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="well">
          <?php $user = Auth::user();?>
           <img src="/uploads/avatar/{{$user->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;  ">
                     
                  <h2 style="color:black;"><b>{{strtoupper($user->firstname)}}</b></h2>
                   {{ $post->formattedCreatedDate() }} 
                   <br>
                 
        <?php 
                      $p_c = $post->count_video;
                      // $ex = explode(",", $post->image);
                      //    for ($i=0; $i <= 2; $i++) { 
                       // foreach( explode(",", $post->image)as $images ){
                      
                       ?>
                      
                     <video width="100%" height="100%" controls>  
  <source src="/uploads/video/{{$ex[$i]}}" type="video/mp4">  
    
</video> 
                  <div class="user_like_comment">
                    <?php    $checks = DB::table('full_likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->where('video',$ex[$i])->first();
                           if($checks== ''){ 

                     ?>
                    
           <span class="badge liked" id="{{$post->id}}" style="position: relative;top:0px; cursor: pointer;">Liked {{$post->getfull_likes_video($post->id,$ex[$i])}}</span> 
<hr>       
       
         
          <span id="{{$post->id}}" post-video="{{$ex[$i]}}" class="btn btn-primary showliked">Like</span>   

  <?php } else{ ?>

                    <span class="badge liked" id="{{$post->id}}">Liked {{$post->getfull_likes_video($post->id,$ex[$i])}} </span>  
                    <hr>
                     
                  <span id="{{$post->id}}" post-video="{{$ex[$i]}}" class="btn btn-primary showliked" >You like this post</span>                                                                                    <?php } ?>
                   <span class="btn btn-danger dislike" id="{{$post->id}}" post-video="{{$ex[$i]}}" data-type="dislike">Dislike</span>  
                 
              
                      
             <a href="{{url('/showfull_video/'.$post->id.'/'.$ex[$i])}}"><span class="btn btn-lg comments">Comment {{$post->getfull_video_comment($post->id,$ex[$i])}} </span></a>
                      
                        
                    
                  

<!-- comment -->
<form   method="post" action="/fullimage_comment" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                      <input type="hidden" name="firstname" value="{{$post->user->firstname}}">
                        <input type="hidden" name="lastname" value="{{$post->user->lastname}}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}" > 
                        <input type="hidden" name="post_video" value="{{$ex[$i]}}">
                         
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                              <span style="position:relative;top:0px">   <textarea class="form-control" name="comment" placeholder="Write something from your heart..!"></textarea></span>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" style="position:relative;top:0px"  value="Comment">
                                
                            </div>
                        </div>
                    </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php }?>
@endforeach
@endsection