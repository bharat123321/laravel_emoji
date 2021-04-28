
         
  @if($post->count()>0)
     @foreach($post as $post)
 <?php
     if($post->video != ''){ 
             $p_c = $post->count_video;
            $exs = explode(",", $post->video);
              
           foreach( explode(",", $post->video)as $videos ){
              ?>
          
    <video width="40%" height="40%" controls>  
  <source src="/uploads/video/{{$videos}}" type="video/mp4">  
    
</video> 
<?php }
}
else{
  ?>
 <h3><b>No Video</b></h3>
  <?php
}
?>
 
 @endforeach
  @else

    <h3>No Post</h3>
 	 
@endif
