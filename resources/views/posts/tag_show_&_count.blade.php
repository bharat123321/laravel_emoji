@foreach($tag as $tag)
<?php
  $tag_id = explode(',',$tag->tag_name);
   for ($i=0; $i <count($tag_id) ; $i++) { 
 
   $user_check = DB::table('users')->where('id',$tag_id[$i])->get();   

   foreach ($user_check as $user_check){ 
?>
  <img src="/uploads/avatar/{{$user_check->avatar}}" style="width:50px; height:50px; float:left; margin-top:5px; border-radius:50%; ">
 <h2 id="text_of_user" style="color:black;position: relative; top: 10px;cursor: pointer;"><b  class="friend_profile"value="{{$user_check->id}}"> @if(strlen($user_check->firstname) <=12) {{ucwords($user_check->firstname )}}{{ucwords($user_check->lastname )}}@else {{substr(ucwords($user_check->firstname),0,12)}}..{{substr(ucwords($user_check->lastname),0,12)}}   @endif </b> </h2>  
 <br>
  @if($user_check->id != Auth::user()->id)
 <?php
  $de =  DB::table('friendships')->where('status',null)->where('acceptor',$user_check->id)->where('user_requested',Auth::user()->id)->first();   
                               ?>
                              
  
  
               @if($de == false)
             <div class="btn-btn-primary" id="add_sent" style="position: relative;top: 10px;" value="{{$user_check->id}}">
              Add Friend
           </div>
           <div style="position: relative;top: 10px;"  id="delete_sent" class="btn-danger" value="{{$user_check->id}}">
             Delete Friend
           </div>
           @else
             <div style="position: relative;top: 10px;" id="add_sent" class="btn-danger" value="{{$user_check->id}}">
             Sending Req
           </div>
              <div style="position: relative;top: 10px;" id="delete_sent" class="btn-danger" value="{{$user_check->id}}">
             Delete Friend
           </div>     

     
              @endif
 @endif
<?php 
echo "<br>";
}

 
} ?>


@endforeach