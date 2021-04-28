
  @if($post->count()>0)
 		 @foreach($post as $post)

 <?php
 if($post->image != ''){ 
 $ex = explode(",", $post->image);
    $p_c = $post->count - 1;
foreach( explode(",", $post->image)as $images ){ 
 ?>
 	 <img src="/uploads/image/{{$images}}" class="img-thumbnail" width="40%" height="40%"> 
 	 <?php }
}
else{
	?>
   <h2><b>No Image</b></h2>
	<?php
}
?>
 
 @endforeach
 @else

    <h3>No Post</h3>
 	 
@endif