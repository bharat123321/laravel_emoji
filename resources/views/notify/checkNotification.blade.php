@extends('layouts.mynotification')
@section('my_notification')
<br>
<div class="loadingnotification">
<div class="col-md-6">
<div class="panel">
<div class="well">
 <?php  


 
      $notifs= DB::table('notifies')->where('comment_status',1)->first();
  if($notifs == true){ 
?>  
@foreach($notification_comment as $notification)

  <img src="/uploads/avatar/{{$notification->avatar}}" style="width:50px; height:50px; float:left;position:relative;top:-15px; border-radius:50%;">

 <b>{{ucwords($notification->firstname)}}</b> <b>{{ucwords($notification->lastname)}}</b> commented on your post <b style="color:darkblue;">{{ucwords($notification->post_body)}}</b>
  <br>
{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
<hr>
 <br>
 <?php DB::table('notifies')->where('id',$notification->id)->update(['comment_status'=>2]);
?>
@endforeach  
<?php }

 ?> 
<?php  
      $notifs= DB::table('notifies')->where('like_status',1)->first();
  if($notifs == true){ 

?>  

@foreach($notification_like as $notification)

  <img src="/uploads/avatar/{{$notification->avatar}}" style="width:50px; height:50px; float:left;position:relative;top:-15px; border-radius:50%;">

 <b>{{ucwords($notification->firstname)}}</b> <b>{{ucwords($notification->lastname)}}</b> like on your post <b style="color:darkblue;">{{ucwords($notification->post_body)}}</b>
  <br>
{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}
<hr>
 <br>
 <?php DB::table('notifies')->where('id',$notification->id)->update(['like_status'=>2]);
?>
@endforeach  
<?php } 
 
  if((App\notify::where('comment_status',1)->where('replies_user_id',Auth::user()->id)->orWhere('like_status',1)->count())!= 0) {
  	echo "No More";
}
else{?>
    <h4>No Notification Yet</h4>
<?php
}
?> 
  

    

</div>   
</div>
</div> 
</div>
<br>
 @endsection