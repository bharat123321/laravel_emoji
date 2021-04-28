@extends('layouts.app')
@section('content')
 <div class="container">
  <div class="row justify-content-center">
     <div class="col-md-8">
        <div class="panel">  
 
  				@if($showcomment->count()  > 0)
       
          
  				@foreach($showcomment as $showcomment)
  				    <div class="Delete_comment_from_ajax"> 
  			   <img src="/uploads/avatar/{{Auth::user()->avatar}}"  style="height:50px; width: 50px; float:left;position: relative;top:-20px;left:10px; border-radius:50%;">
  			    
  			  
  			    <h2 style="position: relative;top: -10px;left:20px;  font-size:calc(0.9rem + 0.9vw);cursor: pointer;"><b>
  			    	{{ ucwords($showcomment->firstname) }}<?php echo ''; ?>{{ ucwords($showcomment->lastname) }}</b></h2>
  			    
  		 <h2 style="background:#99CC99;  padding:3px; border-radius: 20px;text-align: center;color:black; display:inline-block;position: relative;left:10px; top:-20px">{{$showcomment->comment}} 
        <br>
          <b style="position: relative;top:-10px;font-size:10px; ">
        {{\Carbon\Carbon::parse($showcomment->created_at)->diffForHumans()}}
      </b>
       </h2>
     
  		 <div class="replyincomment">
  		 
  		<div class="Fromcomment"  id="{{$showcomment->id}}"  style="position: relative;top:-18px;color: gray;cursor: pointer;"><b>Reply</b></div>
      <div class="Fromcomment_delete"  id="{{$showcomment->id}}" onclick="deleteComment({{$showcomment->post_id}}) " style="position: relative;top:-40px;left:50px;color:darkred;cursor: pointer;"><b>Delete</b></div>
  		 </div>
         </div>
  		 @include('posts.commentsDisplay')
 
  		@endforeach
       
      </div>
  	 <div id="get_reply_form" class="modal_content">
          
      </div>
       
  	</div>
  </div>

   
                    @else
      <h1 style="color:skyblue">No Comment Yet</h1>
      @endif
               
</div>
</div>
@endsection