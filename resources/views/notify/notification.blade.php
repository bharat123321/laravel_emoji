<div class="col-md-6">
<div class="panel">
	<div class="well" id="marksasread"data-id="{{count(auth()->user()->unreadNotifications)}}">

	 @foreach(auth()->user()->unreadNotifications as $notifications)
	 <?php echo $chec = DB::table('posts')->where('id',$notifications->data['thread']['post_id'])->where('user_id',Auth::user()->id)->get(); ?>
	 
	 <img src="/uploads/avatar/{{$notifications->data['user']['avatar']}}" style="width:50px; height:50px; float:left;position:relative;top:-20px; border-radius:50%;  ">
    <b> {{ucwords($notifications->data['user']['firstname'])}}</b>  commented on your post <b style="color:darkblue;">{{ucwords($notifications->data['thread']['post_body'])}}</b>
 <hr>
 <br>
 <br>
 <br>
 <?php  echo $chec = DB::table('comments')->where('post_id',$notifications->data['thread']['post_id'])->where('user_id',$notifications->data['thread']['user_id'])->get(); 
 if($chec == true){
 	echo "true";
 }
 else{
 	echo "false";
 }
 ?>
  @endforeach
             
         
           	</div>   
</div>
</div> 