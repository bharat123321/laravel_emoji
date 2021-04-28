@extends('layouts.app')
@section('content')
  
  <div class="container-fluid">  
    <div class="panel panel-default"> 
    	<div class="panel-heading">
    <a  href="/showAll_image_ofFriend/{{$id}}" style="color:red;text-decoration: none;"><b style="font-size:20px">&#8592;</b>Back</a>   
     </div> 
     <div class="panel-body">
     	<div class="well">
     		<table class="table table-hover">  
     		 @if(count($mutual_friend) != 0)
          @foreach($mutual_friend as $mutual_friend)

          <?php

         $check = DB::table('users')->where('id',$mutual_friend)->get();
          ?>

  <?php      $de =  DB::table('posts')->where('user_id',$mutual_friend)->first();  
  ?>
          @foreach($check as $users)
  <tr><td> <img src="/uploads/avatar/{{$users->avatar}}" width="100px" height="100px" style="border-radius: 50px">
                 <br/>
             <h3 style="word-break: break-all;">{{ucwords($users->firstname)}} {{ucwords($users->lastname)}}</h3><div class="col-md-3 pull-right">
 
                @if($de == true)
             <div id="UnBlock" class="unblock_sent" value="{{$users->id}}">
             UnBlock Friend
           </div>
          <div style="display: none;width:100px;" id="block_friend" class="block_sent" value="{{$users->id}}">
             Block Friend
           </div>
           <div id="delete_friend_sent" class="delete_sent" value="{{$users->id}}">
             Delete Friend
           </div>
           @else
             <div id="block_friend" class="block_sent" value="{{$users->id}}">
             Block Friend
           </div>
           <div style="display: none;width: 100px;" id="UnBlock" class="unblock_sent" value="{{$users->id}}">
             UnBlock Friend
           </div>
              <div id="delete_friend_sent" class="delete_sent" value="{{$users->id}}">
             Delete Friend
           </div>     

     
              @endif                  
                  
     
                             
 </div></td></tr>  

  @endforeach
   @endforeach
  @else
  <h2>No Mutual friend</h2>
  @endif
</table>  

     	</div>
     </div>

</div>
 





@endsection